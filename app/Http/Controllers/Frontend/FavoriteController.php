<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FavoriteItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    // show user favourite list
    public function index()
    {
        $user = Auth::user();
        $favorite_items = FavoriteItem::where('user_id', $user->id)->orderBy('id', 'DESC')->get();
        return view('frontend.user.favorite.index', compact('favorite_items'));
    }
}
