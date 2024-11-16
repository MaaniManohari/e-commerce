<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BulkOrderController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\WishlistController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');
Route::get('/register',[UserAuthController::class,'showRegistrationForm'])->name('register');
Route::get('/login',[UserAuthController::class,'showLoginForm'])->name('login');
Route::post('/user-register',[UserAuthController::class,'register'])->name('user.register');
Route::post('/user-login',[UserAuthController::class,'login'])->name('user.login');
Route::get('/',[UserController::class,'userHome'])->name('user.index');
Route::get('/product-view/{id}',[ProductController::class,'shopProductView'])->name('user.product.view');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'shopProductView'])->name('products.show');
Route::post('/products-search', [ProductController::class, 'searchProduct'])->name('search.products');

//Route::get('/project-view/{id}',[ProjectController::class,'shopProjectView'])->name('user.project.view');
//Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
//Route::get('/project/{id}', [ProjectController::class, 'show'])->name('project.show');
//contact 
Route::post('/contact-submit', [ContactFormController::class, 'sendContactForm'])->name('contact.form.submit');

Route::post('/bulk-order-submit', [BulkOrderController::class, 'submitBulkOrder'])->name('bulk.order.submit');
//Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
//Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.view');
//Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.view');

Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/count', [CartController::class, 'cartCount'])->name('cart.count');
Route::get('/cart/items', [CartController::class, 'getCartItems'])->name('cart.items');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/cart/view', [CartController::class, 'viewCart'])->name('cart.view');
Route::get('/cart/remove/{id}', [CartController::class, 'removeCart'])->name('cart.remove');
Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::put('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/order/store', [CartController::class, 'order'])->name('order.store');


 Route::post('/addtowishlist', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
 Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
 //Route::post('/wishlist/add/{productId}', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
 Route::delete('/wishlist/remove/{wishlistId}', [WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove');

Route::get('/order/success', function () {
    return view('User.cart.successPage');
})->name('order.success');

Route::get('/user/orders/history', [OrderController::class, 'orderHistory'])->name('orders.history');
Route::get('/user/view/order/{id}', [OrderController::class, 'viewOrder'])->name('orders.view');
Route::get('/user/view/order/pdf/{id}', [OrderController::class, 'orderPdf'])->name('orders.pdf');


Route::middleware(['auth','user'])->group(function () {
    


});

//Route::get('user/home',[UserController::class,'userHome'])->name('user.index');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/home',[AdminController::class,'adminHome'])->name('admin.home');

    Route::get('/admin/product-index',[ProductController::class,'productIndex'])->name('product.index');
    Route::get('/admin/product-create',[ProductController::class,'productCreate'])->name('product.create');
    Route::post('/admin/add-product',[ProductController::class,'addProduct'])->name('add.product');
    Route::get('/admin/product-view/{id}',[ProductController::class,'viewProduct'])->name('product.view');
    Route::get('/admin/product-delete/{id}',[ProductController::class,'deleteProduct'])->name('product.delete');
    Route::get('/admin/product-edit/{id}',[ProductController::class,'editProduct'])->name('product.edit');
    Route::put('/admin/product-update/{id}', [ProductController::class, 'updateProduct'])->name('product.update');
    Route::delete('/product/{id}/removeImage', [ProductController::class, 'removeImage'])->name('product.removeImage');

    Route::get('/admin/category-index',[CategoryController::class,'categoryIndex'])->name('category.index');
    Route::post('/admin/store-category',[CategoryController::class,'storeCategory'])->name('category.store');
    Route::get('/admin/sub-category/{id}',[CategoryController::class,'AddSubCategory'])->name('view.subCategory');
    Route::post('/admin/store-sub-category',[CategoryController::class,'storeSubCategory'])->name('store.subCategory');
    Route::get('/admin/edit-category/{id}',[CategoryController::class,'editCategory'])->name('edit.category');
    Route::post('/admin/update-category/{id}',[CategoryController::class,'updateCategory'])->name('update.category');
    Route::post('/admin/update-subcategory', [CategoryController::class, 'updateSubCategory'])->name('update.subCategory');
    Route::get('/admin/delete-category/{id}', [CategoryController::class, 'deleteCategory'])->name('delete.category');
    Route::get('/admin/view-category/{id}', [CategoryController::class, 'viewCategory'])->name('view.category');

    Route::get('/admin/projects-index', [ProjectController::class, 'projects'])->name('projects.index');
    Route::get('/admin/projects-create', [ProjectController::class, 'projectCreate'])->name('projects.create');
    Route::post('/admin/add-projects', [ProjectController::class, 'addProject'])->name('add.projects');
    Route::get('/admin/projects-view/{id}', [ProjectController::class, 'viewProject'])->name('projects.view');
    Route::get('/admin/projects-delete/{id}', [ProjectController::class, 'deleteProject'])->name('projects.delete');
    Route::get('/admin/projects-edit/{project}', [ProjectController::class, 'editProject'])->name('projects.edit');
    Route::put('/projects/{id}', [ProjectController::class, 'updateProject'])->name('projects.update');
    Route::delete('/admin/projects/{project}/removeImage', [ProjectController::class, 'removeImage'])->name('projects.removeImage');
    Route::get('/admin/projects-edit/{project}', [ProjectController::class, 'editProject'])->name('projects.edit');

 

    Route::get('/admin/bulk-orders', [BulkOrderController::class, 'bulkOrders'])->name('bulkorders.index');
    Route::patch('/admin/bulk-orders/{id}/response', [BulkOrderController::class, 'updateResponse'])->name('bulkorders.updateResponse');
    Route::patch('/admin/bulk-orders/{id}/update', [BulkOrderController::class, 'updateResponseAndNote'])->name('bulkorders.updateResponseAndNote');


    // Admin Order List
    Route::get('/admin/orders', [OrderController::class, 'adminOrderList'])->name('admin.orders.index');
    Route::get('/admin/orders/{id}', [OrderController::class, 'adminViewOrder'])->name('admin.orders.view');
    Route::post('/admin/orders/{order}/update-status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
    Route::get('/admin/orders/view/{id}', [OrderController::class, 'viewOrder'])->name('admin.orders.viewOrder');
    Route::post('/admin/orders/{order}', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
    Route::post('/admin/orders/{order}/update-status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
    
    // Route to list all orders
    Route::get('/admin/orders', [OrderController::class, 'adminOrderList'])->name('admin.orders.index');
    // Route to view a specific order
    Route::get('/admin/orders/view/{id}', [OrderController::class, 'adminViewOrder'])->name('admin.orders.viewOrder');
    // Route to update the order status (using POST method)
    Route::post('/admin/orders/{order}/update-status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');



    Route::get('/admin/admin-index',[AdminController::class,'adminIndex'])->name('admin.index');
    Route::get('/admin/admin-edit/{id}',[AdminController::class,'editAdmin'])->name('admin.edit');
    Route::post('/admin/create-admin',[AdminController::class,'createAdmin'])->name('create.admin');
    Route::put('/admin/update-admin/{id}',[AdminController::class,'updateAdmin'])->name('update.admin');
    Route::get('/admin/delete-admin/{id}',[AdminController::class,'deleteAdmin'])->name('delete.admin');
});


Route::get('/user-home', [UserController::class, 'UserHome'])->name('user.home');
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::post('/category/update/{id}', [CategoryController::class, 'updateCategory'])->name('update.category');
Route::get('/about-us', [UserController::class, 'aboutUs'])->name('user.aboutUs');
Route::get('/contact-us', [UserController::class, 'contactUs'])->name('user.contactUs');
Route::get('/wish-list', [UserController::class, 'wishlist'])->name('user.wishlist');
Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
Route::get('/profile', [OrderController::class, 'orderHistory'])->name('profile');
Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('user.updateProfile');
Route::get('/product', [UserController::class, 'product'])->name('user.product');
Route::get('/product/{id}', [UserController::class, 'filterproduct'])->name('user.filterproduct');
Route::get('/project', [UserController::class, 'project'])->name('user.project');
Route::get('/bulk-Orders', [UserController::class, 'bulk'])->name('user.bulk');



Route::get('/products', [UserController::class, 'product'])->name('products');

// Route::middleware('/auth')->group(function () {
//     Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
//     Route::post('/wishlist/add/{productId}', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
//     Route::delete('/wishlist/remove/{wishlistId}', [WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove');
//     Route::post('/wishlist/add', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
// });




