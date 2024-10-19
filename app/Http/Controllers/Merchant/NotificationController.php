<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
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
        return view('frontend.merchant.notification.index', compact('title', 'notifications'));
    }

    public function show($id)
    {
        $title = 'Notifications';
        $notification = Auth::user()->notifications()->where('id', $id)->firstOrFail();

        if($notification->read_at == NULL){
            $notification->markAsRead();
        }
        if($notification->data['role'] == 'make_order'){
            return view('frontend.merchant.notification.show', compact('title', 'notification'));
        }
    }
}
