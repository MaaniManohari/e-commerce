
<style>
    /* .header_scroll .top-header {
    background-color: rgba(125, 95, 122, 0.9);
}

.header_scroll .bottom_header {
    background-color: rgba(125, 95, 122, 0.9);
}

.header_scroll .navbar {
    background-color: rgba(125, 95, 122, 0.8);
} */

/* .header_scroll .navbar-nav .nav-link,
.header_scroll .navbar-nav .login-btn,
.header_scroll .navbar-nav .cart_dropdown a,
.header_scroll .contact_detail li span,
.header_scroll .contact_detail li i {
    color: white !important;
}
    .bottom_header {
        position: absolute;
        top: 0;
        width: 100%;
        background-color: transparent;
        z-index: 1000;
        transition: background-color 0.3s ease;
    }

    .navbar {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: transparent;
        transition: background-color 0.3s ease;
    }

    .header_scroll .bottom_header {
        background-color: rgba(125, 95, 122, 0.8);
    }

    .header_scroll .navbar {
        background-color: rgba(125, 95, 122, 0.8);
    }

    .bottom_header .container-fluid {
        padding: 0;
    }

    .navbar-nav-center {
        display: flex;
        justify-content: center;
        flex-grow: 1;
    } */

    /* .btn-frameless {
        display: inline-block;
        background: transparent;
        color: white;
        border: none;
        padding: 0;
        text-align: center;
        cursor: pointer;
        font-size: inherit;
    }

    .btn-frameless:hover,
    .btn-frameless:focus {
        text-decoration: underline;
    } */

    /* .navbar-nav .login-btn {
        padding-right: 100px;
    } */

    /* .cart_dropdown {
        margin-left: auto;
        margin-right: 50px; 
    }

    .navbar-brand {
        padding: 0;
        margin: 0;
        display: flex;
        align-items: center;
    } */

    .navbar-brand img {
        width: 80px;
        height: 80px;
    }
</style>
<header class="header_wrap">
	<!-- <div class="top-header light_skin bg_dark d-none d-md-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                	<div class="header_topbar_info">
                    	<div class="header_offer">
                    		<span>Free Ground Shipping Over $250</span>
                        </div>
                        <div class="download_wrap">
                            <span class="mr-3">Download App</span>
                            <ul class="icon_list text-center text-lg-left">
                                <li><a href="#"><i class="fab fa-apple"></i></a></li>
                                <li><a href="#"><i class="fab fa-android"></i></a></li>
                                <li><a href="#"><i class="fab fa-windows"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                	<div class="d-flex align-items-center justify-content-center justify-content-md-end">
                        <div class="lng_dropdown">
                            <select name="countries" class="custome_select">
                                <option value='en' data-image="assets/images/eng.png" data-title="English">English</option>
                                <option value='fn' data-image="assets/images/fn.png" data-title="France">France</option>
                                <option value='us' data-image="assets/images/us.png" data-title="United States">United States</option>
                            </select>
                        </div>
                        <div class="ml-3">
                            <select name="countries" class="custome_select">
                                <option value='USD' data-title="USD">USD</option>
                                <option value='EUR' data-title="EUR">EUR</option>
                                <option value='GBR' data-title="GBR">GBR</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="middle-header dark_skin">
    	<div class="container">
            <div class="nav_block">
                <a class="navbar-brand" href="#">
                    <img class="logo_light" src="{{ asset('assets/images/my/logo.jfif') }}" alt="logo">
                    <img class="logo_dark" src="{{ asset('assets/images/my/logo.jfif') }}" alt="logo">
                </a>
                <div class="product_search_form radius_input search_form_btn">
                    <form  method="POST" action="{{route('search.products')}}" enctype="multipart/form-data">
                    @csrf
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="custom_select">
                                    <select class="first_null not_chosen" name="cla" id="categorySelect">
                                        <?php
                                        $categories= App\Models\Category::where('parent_id', 0)->get();
                                        ?>
                                        <option value="">All Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id}}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input class="form-control" placeholder="Search Product..." name="value" type="text">
                            
                            <button type="submit" class="search_btn3">Search</button>
                        </div>
                    </form>
                    
                </div>
                <ul class="navbar-nav attr-nav align-items-center">
                @guest
                            @if(Route::has('login'))
                            <li>
                                <a href="{{ route('login') }}" class="login-btn" style="color:#040404 ;">
                                    <i class="linearicons-user" style="color:#040404 ;"></i><span style="color:#040404;">Login</span>
                                </a>
                            </li>
                            @endif
                            @else
                            <li class="mr-3">
                                <a class="nav-link nav_item" href="{{ route('user.profile') }}#account-detail" style="color:#040404 ;">
                                    <span style="color:#040404 ;">{{ Auth::user()->name }}</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link nav_item" href="{{ route('logout') }}" style="color:#040404 ;" 
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span style="color:#040404 ;">{{ __('Logout') }}</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                @endguest
                    <!-- <li><a href="{{ route('user.wishlist') }}" class="nav-link"><i class="linearicons-heart"></i><span class="wishlist_count">0</span></a></li>
                    <li class="dropdown cart_dropdown"><a class="nav-link cart_trigger" href="#" data-toggle="dropdown"><i class="linearicons-bag2"></i><span class="cart_count">2</span><span class="amount"><span class="currency_symbol"></span></span></a>
                        <div class="cart_box cart_right dropdown-menu dropdown-menu-right">
                            <ul class="cart_list">
                                <li>
                                    <a href="#" class="item_remove"><i class="ion-close"></i></a>
                                    <a href="#"><img src="assets/images/cart_thamb1.jpg" alt="cart_thumb1">Variable product 001</a>
                                    <span class="cart_quantity"> 1 x <span class="cart_amount"> <span class="price_symbole">$</span></span>78.00</span>
                                </li>
                                <li>
                                    <a href="#" class="item_remove"><i class="ion-close"></i></a>
                                    <a href="#"><img src="assets/images/cart_thamb2.jpg" alt="cart_thumb2">Ornare sed consequat</a>
                                    <span class="cart_quantity"> 1 x <span class="cart_amount"> <span class="price_symbole">$</span></span>81.00</span>
                                </li>
                            </ul>
                            <div class="cart_footer">
                                <p class="cart_total"><strong>Subtotal:</strong> <span class="cart_price"> <span class="price_symbole">$</span></span>159.00</p>
                                <p class="cart_buttons"><a href="{{ route('cart.view') }}" class="btn btn-fill-line view-cart">View Cart</a><a href="{{ route('user.profile') }}" class="btn btn-fill-out checkout">Checkout</a></p>
                            </div>
                        </div>
                    </li> -->
                </ul>
            </div>
        </div>
    </div>
    <div class="bottom_header dark_skin main_menu_uppercase border-top">
    	<div class="container">
            <div class="row align-items-center"> 
            	<div class="col-lg-3 col-md-4 col-sm-6 col-3">
                <div class="row contact_phone contact_support" style="margin-left:80px;">
                            <i class="linearicons-phone-wave"></i>
                            <span style="font-size: 15px;">+960 3331039</span>
                            <!-- <span> Viber +960 7878128</span> -->
                        </div>
                	<!-- <div class="categories_wrap">
                        <button type="button" data-toggle="collapse" data-target="#navCatContent" aria-expanded="false" class="categories_btn categories_menu">
                            <span>All Categories </span><i class="linearicons-menu"></i>
                        </button>
                        <div id="navCatContent" class="navbar collapse">
                            <ul> 
                                <li class="dropdown dropdown-mega-menu">
                                    <a class="dropdown-item nav-link dropdown-toggler" href="#" data-toggle="dropdown"><i class="flaticon-tv"></i> <span>Computer</span></a>
                                    <div class="dropdown-menu">
                                        <ul class="mega-menu d-lg-flex">
                                            <li class="mega-menu-col col-lg-7">
                                                <ul class="d-lg-flex">
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul> 
                                                            <li class="dropdown-header">Featured Item</li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Vestibulum sed</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec porttitor</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae facilisis</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Curabitur tempus</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Vivamus in tortor</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae ante ante</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Etiam ac rutrum</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Quisque condimentum</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            <li class="dropdown-header">Popular Item</li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Curabitur laoreet</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Vivamus in tortor</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae facilisis</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Quisque condimentum</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Etiam ac rutrum</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae ante ante</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec porttitor</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Curabitur tempus</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-5">
                                                <div class="header-banner2">
                                                    <img src="assets/images/menu_banner7.jpg" alt="menu_banner1">
                                                    <div class="banne_info">
                                                        <h6>10% Off</h6>
                                                        <h4>Computers</h4>
                                                        <a href="#">Shop now</a>
                                                    </div>
                                                </div>
                                                <div class="header-banner2">
                                                    <img src="assets/images/menu_banner8.jpg" alt="menu_banner2">
                                                    <div class="banne_info">
                                                        <h6>15% Off</h6>
                                                        <h4>Top Laptops</h4>
                                                        <a href="#">Shop now</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="dropdown dropdown-mega-menu">
                                    <a class="dropdown-item nav-link dropdown-toggler" href="#" data-toggle="dropdown"><i class="flaticon-responsive"></i> <span>Mobile & Tablet</span></a>
                                    <div class="dropdown-menu">
                                        <ul class="mega-menu d-lg-flex">
                                            <li class="mega-menu-col col-lg-7">
                                                <ul class="d-lg-flex">
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul> 
                                                            <li class="dropdown-header">Featured Item</li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Vestibulum sed</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec porttitor</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae facilisis</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Curabitur tempus</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Vivamus in tortor</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae ante ante</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Etiam ac rutrum</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            <li class="dropdown-header">Popular Item</li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Curabitur laoreet</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Vivamus in tortor</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae facilisis</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Quisque condimentum</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Etiam ac rutrum</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae ante ante</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec porttitor</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-5">
                                                <div class="header-banner2">
                                                    <a href="#"><img src="assets/images/menu_banner6.jpg" alt="menu_banner"></a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="dropdown dropdown-mega-menu">
                                    <a class="dropdown-item nav-link dropdown-toggler" href="#" data-toggle="dropdown"><i class="flaticon-camera"></i> <span>Camera</span></a>
                                    <div class="dropdown-menu">
                                        <ul class="mega-menu d-lg-flex">
                                            <li class="mega-menu-col col-lg-7">
                                                <ul class="d-lg-flex">
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul> 
                                                            <li class="dropdown-header">Featured Item</li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Vestibulum sed</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec porttitor</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae facilisis</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Curabitur tempus</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Vivamus in tortor</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae ante ante</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Etiam ac rutrum</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            <li class="dropdown-header">Popular Item</li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Curabitur laoreet</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Vivamus in tortor</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae facilisis</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Quisque condimentum</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Etiam ac rutrum</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae ante ante</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec porttitor</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-5">
                                                <div class="header-banner2">
                                                    <a href="#"><img src="assets/images/menu_banner9.jpg" alt="menu_banner"></a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="dropdown dropdown-mega-menu">
                                    <a class="dropdown-item nav-link dropdown-toggler" href="#" data-toggle="dropdown"><i class="flaticon-plugins"></i> <span>Accessories</span></a>
                                    <div class="dropdown-menu">
                                        <ul class="mega-menu d-lg-flex">
                                            <li class="mega-menu-col col-lg-4">
                                                <ul> 
                                                    <li class="dropdown-header">Woman's</li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-list-left-sidebar.html">Vestibulum sed</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-left-sidebar.html">Donec porttitor</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-right-sidebar.html">Donec vitae facilisis</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-list.html">Curabitur tempus</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-load-more.html">Vivamus in tortor</a></li>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-4">
                                                <ul>
                                                    <li class="dropdown-header">Men's</li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-cart.html">Donec vitae ante ante</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="checkout.html">Etiam ac rutrum</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="wishlist.html">Quisque condimentum</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="compare.html">Curabitur laoreet</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="order-completed.html">Vivamus in tortor</a></li>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-4">
                                                <ul>
                                                    <li class="dropdown-header">Kid's</li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail.html">Donec vitae facilisis</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-left-sidebar.html">Quisque condimentum</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-right-sidebar.html">Etiam ac rutrum</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-thumbnails-left.html">Donec vitae ante ante</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-thumbnails-left.html">Donec porttitor</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a class="dropdown-item nav-link nav_item" href="coming-soon.html"><i class="flaticon-headphones"></i> <span>Headphones</span></a></li>
                                <li><a class="dropdown-item nav-link nav_item" href="404.html"><i class="flaticon-console"></i> <span>Gaming</span></a></li>
                                <li><a class="dropdown-item nav-link nav_item" href="login.html"><i class="flaticon-watch"></i> <span>Watches</span></a></li>
                                <li><a class="dropdown-item nav-link nav_item" href="register.html"><i class="flaticon-music-system"></i> <span>Home Audio & Theater</span></a></li>
                                <li><a class="dropdown-item nav-link nav_item" href="coming-soon.html"><i class="flaticon-monitor"></i> <span>TV & Smart Box</span></a></li>
                                <li><a class="dropdown-item nav-link nav_item" href="404.html"><i class="flaticon-printer"></i> <span>Printer</span></a></li>
                                <li>
                                	<ul class="more_slide_open">
                                    	<li><a class="dropdown-item nav-link nav_item" href="login.html"><i class="flaticon-fax"></i> <span>Fax Machine</span></a></li>
                                        <li><a class="dropdown-item nav-link nav_item" href="register.html"><i class="flaticon-mouse"></i> <span>Mouse</span></a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="more_categories">More Categories</div>
                        </div>
                    </div> -->
                </div>
                <div class="col-lg-9 col-md-8 col-sm-6 col-9">
                	<nav class="navbar navbar-expand-lg">
                    	<button class="navbar-toggler side_navbar_toggler" type="button" data-toggle="collapse" data-target="#navbarSidetoggle" aria-expanded="false"> 
                            <span class="ion-android-menu"></span>
                        </button>
                        <div class="pr_search_icon">
                            <a href="javascript:void(0);" class="nav-link pr_search_trigger"><i class="linearicons-magnifier"></i></a>
                        </div> 
                        <div class="collapse navbar-collapse mobile_side_menu" id="navbarSidetoggle">
                            <ul class="navbar-nav">
                                <li >
                                    <a  class="nav-link  active" href="{{ route('user.index') }}" id="navhome">Home</a>
                                    
                                </li>
                                <li><a class="nav-link nav_item" href="{{ route('user.aboutUs') }}" id="navabout">About_Us</a></li> 
                                <!-- <li>
                                    <a class=" nav-link" href="{{ route('user.aboutUs') }}" data-toggle="dropdown">About_Us</a>
                                    
                                </li> -->
                                <li class="dropdown dropdown-mega-menu">
                                    <a class="dropdown-toggle nav-link" href="{{ route('user.product') }}" id="navproduct">Products</a>
                                    <div class="dropdown-menu">
                                       <?php
                                        $categories= App\Models\Category::where('parent_id', 0)->get();
                                        ?>
                                        <ul class="mega-menu d-lg-flex">
                                        @foreach($categories as $category)
                                    <li class="mega-menu-col col-lg-3">
                                   
                                        <ul> 
                                        <?php
                                      $products= App\Models\Product::where('category', $category->id )->get();
                                        ?>
                                            <li class="dropdown-header" onclick="event.stopPropagation(); window.location.href='{{ route('products', ['category_id' => $category->id]) }}';">{{ $category->category_name }}</li>
                                            @foreach($products as $product)
                                            <li><a class="dropdown-item nav-link nav_item" href="{{url('/products/'.$product->id)}}">{{ $product->name }}</a></li>
                                            @endforeach 
                                        </ul>
                                    </li>
                                    @endforeach   
                                   
                                </ul>
                                        <!-- <div class="d-lg-flex menu_banners">
                                            <div class="col-lg-6">
                                                <div class="header-banner">
                                                    <div class="sale-banner">
                                                        <a class="hover_effect1" href="#">
                                                            <img src="assets/images/shop_banner_img7.jpg" alt="shop_banner_img7">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="header-banner">
                                                    <div class="sale-banner">
                                                        <a class="hover_effect1" href="#">
                                                            <img src="assets/images/shop_banner_img8.jpg" alt="shop_banner_img8">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </li>
                               
                                
                                <li><a class="nav-link nav_item" href="{{ route('user.contactUs') }}" id="navcontact">Contact_Us</a></li> 
                            </ul>
                        </div>
                        <ul class="navbar-nav attr-nav " >
                            <?php
                            $wishlists = App\Models\Wishlist::where('user_id', Auth::id())->with('product')->count();
                            ?>
                        <li ><a href="{{ route('user.wishlist') }}" class="nav-link"><i class="linearicons-heart"></i><span class="wishlist_count">{{$wishlists}}</span></a></li>
                        <?php
                            $carts  = App\Models\Cart::where('user_id', Auth::id())->count();;
                            ?>
                    <li class="dropdown cart_dropdown"><a class="nav-link cart_trigger" href="#" data-toggle="dropdown"><i class="linearicons-bag2"></i><span class="cart_count">{{$carts}}</span><span class="amount"><span class="currency_symbol"></span></span></a>
                        <div class="cart_box cart_right dropdown-menu dropdown-menu-right">
                            <ul class="cart_list">
                                <!-- <li>
                                    <a href="#" class="item_remove"><i class="ion-close"></i></a>
                                    <a href="#"><img src="assets/images/cart_thamb1.jpg" alt="cart_thumb1">Variable product 001</a>
                                    <span class="cart_quantity"> 1 x <span class="cart_amount"> <span class="price_symbole">$</span></span>78.00</span>
                                </li>
                                <li>
                                    <a href="#" class="item_remove"><i class="ion-close"></i></a>
                                    <a href="#"><img src="assets/images/cart_thamb2.jpg" alt="cart_thumb2">Ornare sed consequat</a>
                                    <span class="cart_quantity"> 1 x <span class="cart_amount"> <span class="price_symbole">$</span></span>81.00</span>
                                </li> -->
                            </ul>
                            <div class="cart_footer">
                                       <?php
                                        $id = auth()->id();
                                        $categories= App\Models\Cart::where('user_id', $id)->get();
                                        $grandTotal = $cartItems->sum(function($cart) {
                                            return $cart->quantity * $cart->product->amount;
                                        });
                                        ?>
                                <p class="cart_total"><strong>Subtotal:</strong> <span class="cart_price"> <span class="price_symbole"></span></span>{{$grandTotal}}</p>
                                <p class="cart_buttons"><a href="{{ route('cart.view') }}" class="btn btn-fill-line view-cart">View Cart</a><a href="{{ route('user.profile') }}" class="btn btn-fill-out checkout">Checkout</a></p>
                            </div>
                        </div>
                        </li>
                        </ul>
                        <!-- <div class="row contact_phone contact_support">
                            <i class="linearicons-phone-wave"></i>
                            <span>123-4567689</span>
                        </div> -->
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- <header class="header_wrap fixed-top header_with_topbar transparent_header header_scroll">
    <div class="top-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                        <ul class="contact_detail text-center text-lg-left">
                            <li><i class="ti-mobile" style="color: white;"></i><span style="color: white;">070 607 3065</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-center text-md-right">
                        <ul class="header_list d-flex justify-content-end align-items-center">
                            <li class="mr-3">
                                <a href="{{ route('user.wishlist') }}">
                                    <i class="ti-heart" style="color: white;"></i><span style="color: white;">Wishlist</span>
                                </a>
                            </li>
                            @guest
                            @if(Route::has('login'))
                            <li>
                                <a href="{{ route('login') }}" class="login-btn" style="color: white;">
                                    <i class="ti-user" style="color: white;"></i><span style="color: white;">Login</span>
                                </a>
                            </li>
                            @endif
                            @else
                            <li class="mr-3">
                                <a class="nav-link nav_item" href="{{ route('user.profile') }}#account-detail" style="color: white;">
                                    <span style="color: white;">{{ Auth::user()->name }}</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link nav_item" href="{{ route('logout') }}" style="color: white;" 
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span style="color: white;">{{ __('Logout') }}</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dark_skin main_menu_uppercase transparent_header ">
        <div class=" transparent_header">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="index.html">
                    <img class="logo_light" src="assets/images/my/logo.jfif" alt="logo" style="width:58px;border-radius:25px;" />
                    <img class="logo_dark" src="assets/images/my/logo.jfif" alt="logo" style="width:58px;border-radius:25px;"/>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false">
                    <span class="ion-android-menu" style="color: white;"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav navbar-nav-center">
                        <li><a class="nav-link nav_item" href="{{ route('user.index') }}" style="color: white;">Home</a></li>
                        <li class="dropdown dropdown-mega-menu">
                            <a class="dropdown-toggle nav-link nav_item" href="{{ route('user.product') }}" data-toggle="dropdown" style="color: white;">Products</a>
                            <div class="dropdown-menu">
                                <ul class="mega-menu d-lg-flex">
                                  
                                </ul>
                            </div>
                        </li>
                        <li><a class="nav-link nav_item" href="{{ route('user.aboutUs') }}" style="color: white;">About Us</a></li>
                        <li><a class="nav-link nav_item" href="{{ route('user.bulk') }}" style="color: white;">Bulk Orders</a></li>
                        <li><a class="nav-link nav_item" href="{{ route('user.contactUs') }}" style="color: white;">Contact Us</a></li>
                        
                </div>
                <ul class="navbar-nav attr-nav align-items-center">
                    <li>
                        <a href="javascript:void(0);" class="nav-link search_trigger">
                            <i class="linearicons-magnifier" style="color: white;"></i>
                        </a>
                        <div class="search_wrap">
                            <span class="close-search" style="color: white;">
                                <i class="ion-ios-close-empty" style="color: white;"></i>
                            </span>
                            <form>
                                <input type="text" placeholder="Search" class="form-control" id="search_input" style="color: white;">
                                <button type="submit" class="search_icon">
                                    <i class="ion-ios-search-strong" style="color: white;"></i>
                                </button>
                            </form>
                        </div>
                        <div class="search_overlay"></div>
                    </li>
                    <li class="dropdown cart_dropdown" style="color: white;">
                        <a class="nav-link cart_trigger" href="#" data-toggle="dropdown">
                            <i class="linearicons-cart" style="color: white;"></i><span class="cart_count" style="color: white;">2</span>
                        </a>
                        <div class="cart_box dropdown-menu dropdown-menu-right">
                            <div class="cart_footer">
                                <p class="cart_buttons">
                                    <a href="{{ route('cart.view') }}" class="btn btn-fill-line view-cart" style="color: white;">View Cart</a>
                                    <a href="{{ route('user.profile') }}#orders" class="btn btn-fill-out checkout" style="color: white;">Orders</a>
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    window.onscroll = function() {
    var header = document.querySelector('header');
    if (window.pageYOffset > 100) {
        header.classList.add('header_scroll');
    } else {
        header.classList.remove('header_scroll');
    }
};
</script>
