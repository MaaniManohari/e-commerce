<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
   

    public function index()
    {
       
        // Fetch the wishlist items for the logged-in user
        $wishlists = Wishlist::where('user_id', Auth::id())->with('product')->get();

        var_dump($wishlists);die();

        // Pass the $wishlists to the view
        return view('User.wishlist', compact('wishlists'));
    }


    public function addToWishlist(Request $request)
    {  
        
        if (!auth()->check()) {
            return redirect()->back()->with([
                'error' => 'You need to be logged in to add items to the wishlist'
            ]); // Use 403 for forbidden access
        }
    
    


         
        $productId = $request->input('product_id');
        $userId = Auth::id();
        
        // Check if the product is already in the wishlist
        $existingWishlistItem = Wishlist::where('product_id', $productId)->where('user_id', $userId)->first();
        
        if ($existingWishlistItem) {
            return back()->with(['success' => 'Product is already in your wishlist']);
        }
    
        // Add product to the wishlist table
        Wishlist::create([
            'user_id' => $userId,
            'product_id' => $productId,
            
        ]);
    
        // Respond with success message
        return back()->with('success', 'Item added to Wishlist successfully!');
         
    }

    public function removeFromWishlist($wishlistId)
    {
        $wishlist = Wishlist::findOrFail($wishlistId);

        // Ensure the logged-in user can only remove their own wishlist item
        if ($wishlist->user_id === Auth::id()) {
            $wishlist->delete();
        }

        return redirect()->back()->with('success', 'Product removed from wishlist.');
    }
}
