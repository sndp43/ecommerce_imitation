<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\ProductReview;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {   $activeTab = 'dashboard';
        $totalOrder = Order::where('user_id', Auth::user()->id)->count();
        $pendingOrder = Order::where('user_id', Auth::user()->id)
            ->where('order_status', 'pending')->count();
        $completeOrder = Order::where('user_id', Auth::user()->id)
        ->where('order_status', 'delivered')->count();
        $reviews = ProductReview::where('user_id', Auth::user()->id)->count();
        $wishlist = Wishlist::where('user_id', Auth::user()->id)->count();

        return view('frontend.dashboard.dashboard', compact(
            'activeTab',
            'totalOrder',
            'pendingOrder',
            'completeOrder',
            'reviews',
            'wishlist'
        ));
    }
}
