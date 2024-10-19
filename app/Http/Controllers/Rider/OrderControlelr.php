<?php

namespace App\Http\Controllers\Rider;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class OrderControlelr extends Controller
{
    //
    public function index(Request $request)
    {
        $title = 'Order';
        if ($request->ajax()) {
            $items = Order::where('rider_id', Auth::user()->id)->orderBy('id', 'DESC')->get();

            return DataTables::of($items)
                ->addColumn('item_count', function ($item) {
                    return $item->items->count();
                })
                ->addColumn('total_price', function ($item) {
                    return '$' . $item->total;
                })
                ->addColumn('user', function ($item) {
                    if ($item->user['first_name'] == NULL) {
                        $name = $item->user['email'];
                    } else {
                        $name = $item->user['first_name'] . ' ' . $item->user['last_name'];
                    }
                    return $name . '<br>Location: ' . $item->user['location']['city'] . ', ' . $item->user['location']['region'] . ', ' . $item->user['location']['country'];
                })
                ->addColumn('status', function ($item) {
                    return $item->status['name'];
                })
                ->addColumn('action', function ($item) {
                    $actionBtn = '<div class="d-flex gap-2">';
                    // $actionBtn .= '<a href="' . route('merchant.order.edit', $item->id) . '" class="edit btn_box"> <i class="fa-solid fa-pen"></i> </a>';
                    $actionBtn .= '<a href="' . route('rider.order.show', $item->id) . '" class="delete btn_box"><i class="fa-solid fa-eye"></i> </a>';
                    $actionBtn .= '</div>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'item_count', 'user'])
                ->addIndexColumn()
                ->make(true);
        }
        // return $items;
        return view('rider.order.index', compact('title'));
    }

    public function show($id)
    {
        $title = 'Order';
        $order = Order::findOrFail(intval($id));
        return view('rider.order.show', compact('title', 'order'));
    }

    public function takeOrder($id)
    {
        $order = Order::findOrFail(intval($id));

        if($order->rider_id == NULL){
            $order->rider_id = Auth::user()->id;
            $order->save();
        }

        return redirect()->route('rider.order.show', $order->id);
    }

    public function updateStatus($id, Request $request)
    {
        $order = Order::findOrFail(intval($id));

        $order->status_id = $request->status;
        $order->save();

        return redirect()->route('rider.order.show', $order->id);
    }
}
