<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RiderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Riders';
        if ($request->ajax()) {
            $items = User::where('user_type', UserType::RIDER)->orderBy('id', 'DESC')->get();

            return DataTables::of($items)
                ->addColumn('name', function ($item) {
                    return $item->first_name . ' ' . $item->last_name;
                })

                ->addColumn('restaurant', function ($item) {
                    return 'All';
                })

                ->addColumn('total_order', function ($item) {
                    return $item->riderorders->count();
                })

                ->addColumn('status', function ($item) {
                    return 'active';
                })

                ->addColumn('commission', function ($item) {
                    return '0%';
                })

                ->addColumn('lisence', function ($item) {
                    return 'N/A';
                })

                ->addColumn('occupation', function ($item) {
                    return 'N/A';
                })

                ->addColumn('activer_order', function ($item) {
                    return 'N/A';
                })
                ->addColumn('revenue', function ($item) {
                    return 'N/A';
                })


                ->addColumn('action', function ($item) {
                    $actionBtn = '<div class="d-flex gap-2">';
                    $actionBtn .= '<a href="' . route('admin.rider.show', $item->id) . '" class="edit btn_box"> <i class="fa-solid fa-eye"></i> </a>';
                    $actionBtn .= '</div>';
                    return $actionBtn;
                })

                ->rawColumns(['action', 'total_order', 'name', 'restaurant', 'status', 'commission', 'lisence', 'occupation', 'activer_order', 'revenue'])
                ->addIndexColumn()
                ->make(true);
        }
        // return $items;
        return view('backend.rider.index', compact('title'));
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
        $user = User::with('riderorders')->findOrFail(intval($id));
        
        $title = 'Rider';
        $country = Country::where('iso2', $user->location['country'])->first();
        return view('backend.rider.show', compact('title', 'user', 'country'));
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
        return redirect()->route('admin.rider.show', $user->id);
    }
}
