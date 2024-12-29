<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlistProducts = Wishlist::with('product')->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();

        return view('frontend.pages.wishlist', compact('wishlistProducts'));
    }

    public function addToWishlist(Request $request)
    {
        if(!Auth::check()){
            return response(['status' => 'error', 'message' => 'Please sign in to add items to your wishlist!']);
        }

        $wishlistCount = Wishlist::where(['product_id' => $request->id, 'user_id' => Auth::user()->id])->count();
        if($wishlistCount > 0){
            return response(['status' => 'error', 'message' => 'This item is already on your wishlist!']);
        }

        $wishlist = new Wishlist();
        $wishlist->product_id = $request->id;
        $wishlist->user_id = Auth::user()->id;
        $wishlist->save();

        $count = Wishlist::where('user_id', Auth::user()->id)->count();

        return response(['status' => 'success', 'message' => 'This item is now on your wishlist!', 'count' => $count]);
    }

    public function destory(string $id)
    {

        $wishlistProducts = Wishlist::where('id', $id)->firstOrFail();
        if($wishlistProducts->user_id !== Auth::user()->id){
            return redirect()->back();
        }
        $wishlistProducts->delete();

        toastr('Success! The product has been removed from your wishlist.', 'success', 'success');

        return redirect()->back();

    }

    public function destoryAjax(Request $request)
    {
        //echo $request->id; exit;
        $wishlistProducts = Wishlist::where('id',  $request->id)->firstOrFail();
        
        if($wishlistProducts->user_id !== Auth::user()->id){
            return response(['status' => 'error', 'message' => 'Failed to remove the product from your wishlist. Try again!']);
        }
        $wishlistProducts->delete();

        return response(['status' => 'success', 'message' => 'Success! The product has been removed from your wishlist.']);
    }
}
