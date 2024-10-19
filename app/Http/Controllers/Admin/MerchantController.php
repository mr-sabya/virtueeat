<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use function Psy\sh;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Merchants';
        if ($request->ajax()) {
            $items = User::where('user_type', UserType::MERCHANT)->orderBy('id', 'DESC')->get();

            return DataTables::of($items)
                ->addColumn('name', function ($item) {
                    return $item->first_name.' '.$item->last_name;
                })

                ->addColumn('shop_name', function ($item) {
                    return $item->businessAccount['company_name'];
                })

                ->addColumn('total_order', function ($item) {
                    return $item->businessAccount->orders->count();
                })

                ->addColumn('status', function ($item) {
                    return 'active';
                })

                ->addColumn('percentage', function ($item) {
                    return 'N/A';
                })

                ->addColumn('product_limit', function ($item) {
                    return 'N/A';
                })

                ->addColumn('order_limit', function ($item) {
                    return 'N/A';
                })

                
                ->addColumn('action', function ($item) {
                    $actionBtn = '<div class="d-flex gap-2">';
                    $actionBtn .= '<a href="'.route('admin.merchant.show', $item->id).'" class="edit btn_box"> <i class="fa-solid fa-eye"></i> </a>';
                    $actionBtn .= '</div>';
                    return $actionBtn;
                })
                
                ->rawColumns(['action', 'total_order', 'name', 'shop_name', 'status', 'percentage', 'product_limit', 'order_limit'])
                ->addIndexColumn()
                ->make(true);
        }
        // return $items;
        return view('backend.merchant.index', compact('title'));
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
        $user = User::findOrFail(intval($id));
        $shop = Shop::where('id', $user->shop_id)->first();
        $title = $shop->company_name;
        $country = Country::where('iso2', $shop->location['country'])->first();
        return view('backend.merchant.show', compact('title', 'user', 'country', 'shop'));
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
        return redirect()->route('admin.merchant.show', $user->id);
    }
}
