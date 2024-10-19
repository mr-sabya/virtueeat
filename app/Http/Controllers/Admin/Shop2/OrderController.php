<?php

namespace App\Http\Controllers\Admin\Shop2;

use App\Http\Controllers\Controller;
use App\Models\Shop2Order;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Order';
        if ($request->ajax()) {
            $items = Shop2Order::orderBy('id', 'DESC')->get();

            return DataTables::of($items)
                ->addColumn('item_count', function ($item) {
                    return $item->items->count();
                })
                ->addColumn('user', function ($item) {
                    return $item->user['name'];
                })
                ->addColumn('action', function ($item) {
                    $actionBtn = '<div class="d-flex gap-2">';
                    $actionBtn .= '<a href="' . route('admin.order.edit', $item->id) . '" class="edit btn_box"> <i class="fa-solid fa-pen"></i> </a>';
                    $actionBtn .= '<a href="' . route('admin.order.show', $item->id) . '" class="delete btn_box"><i class="fa-solid fa-eye"></i> </a>';
                    $actionBtn .= '</div>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'item_count', 'user'])
                ->addIndexColumn()
                ->make(true);
        }
        // return $items;
        return view('backend.shop2.order.index', compact('title'));
    }

    public function show($id)
    {
        $title = 'Order';
        $order = Shop2Order::findOrFail(intval($id));
        return view('backend.shop2.order.show', compact('title', 'order'));
    }

    public function edit($id)
    {
        $title = 'Edit Order';
        $order = Shop2Order::findOrFail(intval($id));
        return view('backend.shop2.order.edit', compact('title', 'order'));
    }

    public function update(Request $request, $id)
    {
        $order = Shop2Order::findOrFail(intval($id));
        $order->status = $request->status;
        $order->save();

        return redirect()->route('admin.order.show', $id);
    }
}
