<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\project;
use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function UserHome()
    {
        // Fetch all products and categories
        $products = Product::all();
        $categories = Category:: where('parent_id', 0)->get(); // Fetch categories

        
        // Pass both products and categories to the view
        return view('User.index', compact('products', 'categories'));
    }

    public function aboutUs()
    {
        return view('user.aboutUs');
    }

    public function contactUs()
    {
        return view('user.contactUs');
    }

    public function project()
    {
        $projects = Project::all(); // Correct casing for Project model
        return view('user.project', compact('projects'));
    }

    // public function product()
    // {
    //     // return view('user.product');


    //         $categories = Category::all();
    //         $products = Product::all();
    //         // $product->images = json_decode($product->images, true);  // Decode images
        
    //         $isInCart = false;
    //         if (Auth::check()) {
    //             $userId = Auth::id();
    //             $isInCart = Cart::where('user_id', $userId)->where('product_id', $id)->exists();
    //         }
        
    //         return view('user.product', compact('products', 'isInCart','categories'));
        
        
    // }

    public function product(Request $request)
{
    // Get all categories
    $categories = Category::all();

    // Initialize the query
    $query = Product::query();

    // Handle category filtering
    if ($request->filled('category')) {
        $query->where('category', $request->input('category'));
    }

    // Handle price filtering
    if ($request->filled('price_min') && $request->filled('price_max')) {
        $priceMin = $request->input('price_min');
        $priceMax = $request->input('price_max');
        $query->whereBetween('amount', [$priceMin, $priceMax]);
    }

    // Handle sorting
    if ($request->has('sort')) {
        switch ($request->get('sort')) {
            case 'date':
                $query->orderBy('created_at', 'desc');
                break;
            case 'price':
                $query->orderBy('amount', 'asc');
                break;
            case 'price-desc':
                $query->orderBy('amount', 'desc');
                break;
            default:
                $query->orderBy('name', 'asc');
                break;
        }
    }

    // Paginate results (9 per page)
    $products = $query->paginate(9);

    // Check if the product is in the cart (for authenticated users)
    $isInCart = false;
    if (Auth::check()) {
        $userId = Auth::id();
        $isInCart = Cart::where('user_id', $userId)->exists();
    }

    // Return the view with the filtered and sorted products
    return view('user.product', compact('products', 'isInCart', 'categories'));
}
public function filterproduct(Request $request)
{
    $categories = Category::all();
    $products = Product::where('category', $request->id)->paginate(9);  // Use get() instead of all()

    // Check if the product is in the cart (for authenticated users)
    $isInCart = false;
    if (Auth::check()) {
        $userId = Auth::id();
        $isInCart = Cart::where('user_id', $userId)->exists();
    }

    // Return the view with the filtered products and cart status
    return view('user.product', compact('products', 'isInCart', 'categories'));;
}

    //////////////////////
    public function bulk()
    {
        return view('user.bulk');
    }

    public function wishlist()
    {
        $wishlists = Wishlist::where('user_id', Auth::id())->with('product')->get();

        // var_dump($wishlists);die();

        // Pass the $wishlists to the view
        return view('User.wishlist', compact('wishlists'));
        // return view('user.wishlist');
    }

    public function addwishlist(){

    }

    public function profile()
    {
        if (!auth()->check()) {
            return back()->with(['error' => 'You need to be logged in first.']);
        }

        $userId = Auth::id(); // Assuming you have user authentication in place
        $orders = Order::where('user_id', $userId)->orderBy('created_at', 'desc')->get(); 
    
        // return view('User.profile', compact('orders'));

        $user = Auth::user(); // Get the authenticated user
        return view('user.profile', compact('user','orders')); // Pass the user data to the view
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        // Update the fields with the request data
        $user->name = $request->name;
        $user->contact = $request->contact;
        $user->email = $request->email;
        $user->address = $request->address;
        
        // Save the changes
        $user->save();
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
    


}

