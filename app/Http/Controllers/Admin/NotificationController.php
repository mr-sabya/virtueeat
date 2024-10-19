<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //
    public function index()
    {
        $title = 'Notifications';
        $notifications = Auth::user()->notifications;
        // return $notifications;
        return view('backend.notification.index', compact('title', 'notifications'));    
    }

    public function show($id)
    {
        $title = 'Notifications';
        $notification = Auth::user()->notifications()->where('id', $id)->firstOrFail();

        if($notification->read_at == NULL){
            $notification->markAsRead();
        }

        if($notification->data['role'] == 'make_order'){
            $order = Order::where('id', $notification->data['data']['order_id'])->first();
            return redirect()->route('admin.main.order.show', $order->id);
        }elseif($notification->data['role'] == 'register'){
            $user = User::where('id', $notification->data['data']['user_id'])->first();
            if($notification->data['data']['user_type'] == 'user'){
                return redirect()->route('admin.user.show', $user->id);
            }elseif($notification->data['data']['user_type'] == 'merchant'){
                return redirect()->route('admin.merchant.show', $user->id);
            }elseif($notification->data['data']['user_type'] == 'rider'){
                return redirect()->route('admin.rider.show', $user->id);
            }
        }
    }
}
