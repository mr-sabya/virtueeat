<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Users';
        if ($request->ajax()) {
            $items = User::where('user_type', UserType::USER)->orderBy('id', 'DESC')->get();

            return DataTables::of($items)
                ->addColumn('name', function ($item) {
                    return $item->first_name . ' ' . $item->last_name;
                })
                ->addColumn('total_order', function ($item) {
                    return $item->orders->count();
                })


                ->addColumn('action', function ($item) {
                    $actionBtn = '<div class="d-flex gap-2">';
                    $actionBtn .= '<a href="' . route('admin.customer.show', $item->id) . '" class="edit btn_box"> <i class="fa-solid fa-eye"></i> </a>';
                    $actionBtn .= '</div>';
                    return $actionBtn;
                })

                ->rawColumns(['action', 'total_order', 'name'])
                ->addIndexColumn()
                ->make(true);
        }
        // return $items;
        return view('backend.customer.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = 'User';
        $user = User::findOrFail(intval($id));
        if ($user->location_id != NULL) {
            $country = Country::where('iso2', $user->location['country'])->first();
        } else {
            $country = NULL;
        }
        return view('backend.customer.show', compact('title', 'user', 'country'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function approve($id)
    {
        $user = User::findOrFail(intval($id));
        $user->is_active = 1;
        $user->save();
        return redirect()->route('admin.customer.show', $user->id);
    }
}
