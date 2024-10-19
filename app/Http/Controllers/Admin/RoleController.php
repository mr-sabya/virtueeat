<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:role.index|role.create|role.edit|role.delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:role.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role.edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role.delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $roles = Role::orderBy('id', 'DESC')->paginate(5);
        return view('backend.role.index', compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $all_permissions = Permission::all();
        $permission_groups = Admin::getpermissionGroups();
        return view('backend.role.create', compact('all_permissions', 'permission_groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation Data
        $request->validate([
            'name' => 'required|max:100|unique:roles'
        ]);

        // Process Data
        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'admin',
        ]);

        // $role = DB::table('roles')->where('name', $request->name)->first();
        $permissions = $request->input('permissions');

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }

        return redirect()->route('admin.role.index')->with('success', 'New Role is added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::findById($id);
        $all_permissions = Permission::all();
        $permission_groups = Admin::getpermissionGroups();
        return view('backend.role.edit', compact('role', 'all_permissions', 'permission_groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validation Data
        $request->validate([
            'name' => 'required|max:100|unique:roles,name,' . $id
        ]);

        $role = Role::findById($id);
        $role->name = $request->name;
        $role->save();

        $permissions = $request->input('permissions');

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }

        return redirect()->route('admin.role.index')->with('success', 'Role has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
