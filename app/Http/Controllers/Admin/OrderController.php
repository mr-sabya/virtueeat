<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Order';
        if ($request->ajax()) {
            $items = Order::orderBy('id', 'DESC')->get();

            return DataTables::of($items)
                ->addColumn('item_count', function ($item) {
                    return $item->items->count();
                })
                ->addColumn('total_price', function ($item) {
                    return '$'.$item->total;
                })
                ->addColumn('user', function ($item) {
                    if($item->user['first_name'] == NULL){
                        $name = $item->user['email'];
                    }else{
                        $name = $item->user['first_name'].' '.$item->user['last_name'];
                    }
                    return $name.'<br>Location: '. $item->user['location']['city'].', '.$item->user['location']['region'].', '.$item->user['location']['country'];
                })
                ->addColumn('status', function ($item) {
                    return $item->status['name'];
                })
                ->addColumn('action', function ($item) {
                    $actionBtn = '<div class="d-flex gap-2">';
                    // $actionBtn .= '<a href="' . route('merchant.order.edit', $item->id) . '" class="edit btn_box"> <i class="fa-solid fa-pen"></i> </a>';
                    $actionBtn .= '<a href="' . route('admin.main.order.show', $item->id) . '" class="delete btn_box"><i class="fa-solid fa-eye"></i> </a>';
                    $actionBtn .= '</div>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'item_count', 'user'])
                ->addIndexColumn()
                ->make(true);
        }
        // return $items;
        return view('backend.order.index', compact('title'));
    }


    // 
    public function PendingOrder(Request $request)
    {
        $title = 'Pendign Order';
        if ($request->ajax()) {
            $items = Order::orderBy('id', 'DESC')->where('status_id', 1)->get();

            return DataTables::of($items)
                ->addColumn('item_count', function ($item) {
                    return $item->items->count();
                })
                ->addColumn('total_price', function ($item) {
                    return '$'.$item->total;
                })
                ->addColumn('user', function ($item) {
                    if($item->user['first_name'] == NULL){
                        $name = $item->user['email'];
                    }else{
                        $name = $item->user['first_name'].' '.$item->user['last_name'];
                    }
                    return $name.'<br>Location: '. $item->user['location']['city'].', '.$item->user['location']['region'].', '.$item->user['location']['country'];
                })
                ->addColumn('status', function ($item) {
                    return $item->status['name'];
                })
                ->addColumn('action', function ($item) {
                    $actionBtn = '<div class="d-flex gap-2">';
                    // $actionBtn .= '<a href="' . route('merchant.order.edit', $item->id) . '" class="edit btn_box"> <i class="fa-solid fa-pen"></i> </a>';
                    $actionBtn .= '<a href="' . route('admin.main.order.show', $item->id) . '" class="delete btn_box"><i class="fa-solid fa-eye"></i> </a>';
                    $actionBtn .= '</div>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'item_count', 'user'])
                ->addIndexColumn()
                ->make(true);
        }
        // return $items;
        return view('backend.order.pending', compact('title'));    
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
        $title = 'Order';
        $order = Order::findOrFail(intval($id));
        return view('backend.order.show', compact('title', 'order'));
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
}
