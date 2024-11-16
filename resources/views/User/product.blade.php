@extends('User.layouts.userFront')

@section('content')

<!-- Breadcrumb Section -->
<div class="breadcrumb_section" style="position: relative; background-image: url('{{ asset('assets/images/my/bg_9.jpg') }}'); background-size: cover; background-position: center; height: 300px;">
    <!-- Dark Overlay -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);"></div>

    <div class="container" style="position: relative; z-index: 1;">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1 style="color: white; text-shadow: 2px 2px 5px rgba(0,0,0,0.5);">Product</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end" style="background-color: rgba(0,0,0,0.5); padding: 5px 10px; border-radius: 5px;">
                    <li class="breadcrumb-item"><a href="#" style="color: white;">Home</a></li>
                    <li class="breadcrumb-item active" style="color: white;">Product</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="main_content">
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row align-items-center mb-4 pb-1">
                        <div class="col-12">
                            <div class="product_header">
                                <div class="product_header_left">
                                    <!-- Sorting Dropdown -->
                                    <form id="sortForm" action="{{ route('products') }}" method="GET">
                                        <select name="sort" id="sortSelect" class="form-control form-control-sm">
                                            <option value="order" {{ request('sort') == 'order' ? 'selected' : '' }}>Default sorting</option>
                                            <option value="date" {{ request('sort') == 'date' ? 'selected' : '' }}>Sort by newness</option>
                                            <option value="price" {{ request('sort') == 'price' ? 'selected' : '' }}>Sort by price: low to high</option>
                                            <option value="price-desc" {{ request('sort') == 'price-desc' ? 'selected' : '' }}>Sort by price: high to low</option>
                                        </select>
                                    </form>
                                </div>
                                <div class="product_header_right">
                                    <div class="products_view">
                                        <a href="javascript:void(0);" class="shorting_icon grid"><i class="ti-view-grid"></i></a>
                                        <a href="javascript:void(0);" class="shorting_icon list active"><i class="ti-layout-list-thumb"></i></a>
                                    </div>
                                    <div class="custom_select">
                                        <select class="form-control form-control-sm">
                                            <option value="">Showing</option>
                                            <option value="9">9</option>
                                            <option value="12">12</option>
                                            <option value="18">18</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product List -->
                    <div class="row shop_container list">
                        @foreach ($products as $product)
                            <div class="col-lg-4 col-md-6 col-12 mb-4">
                                <div class="product_box text-center">
                                    <div class="product_img">
                                        @php
                                            $images = json_decode($product->images);
                                            $firstImage = $images[0] ?? 'path/to/default/image.jpg';
                                        @endphp
                                        <a href="{{ route('products.show', $product->id) }}">
                                            <img src="{{ asset($firstImage) }}" alt="product_image" class="img-fluid">
                                        </a>
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                <li><a href="#"><i class="icon-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_info">
                                        <h6 class="product_title"><a href="{{ route('user.product.view', $product->id) }}">{{ $product->name }}</a></h6>
                                        <div class="product_price">
                                            <span class="price">{{ $product->amount }}</span>
                                        </div>
                                        <div class="pr_desc">
                                            <p>{{ $product->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="row">
                        <div class="col-12">
                            <ul class="pagination mt-3 justify-content-center pagination_style1">
                            {{ $products->appends(request()->input())->links('vendor.pagination.bootstrap-5') }} <!-- Laravel pagination -->
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
                    <div class="sidebar">
                        <div class="widget">
                            <h5 class="widget_title">Categories</h5>
                            <div class="widget_content">
                                @foreach($categories as $category)
                                    <div class="category_item mb-2">
                                        <a href="{{ route('user.filterproduct', $category->id) }}">
                                            <i class="{{ $category->icon_class }}"></i>
                                            <span>{{ $category->category_name }}</span>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="widget">
                            <h5 class="widget_title" style="font-size: 18px; font-weight: bold; margin-bottom: 15px;">Price</h5>
                            <form method="GET" action="{{ route('products') }}">
                                <div class="filter_price" style="display: flex; flex-direction: column;">
                                    <input type="number" name="price_min" id="price_min" class="form-control" placeholder="Min Price" value="{{ request('price_min') }}" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; margin-bottom: 10px;">
                                    <input type="number" name="price_max" id="price_max" class="form-control mt-2" placeholder="Max Price" value="{{ request('price_max') }}" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; margin-bottom: 10px;">
                                    <button type="submit" class="btn btn-primary mt-2" style="background-color: #442917; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer;">
                                        Search
                                    </button>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Sort Handling Script -->
<script>
    document.getElementById('sortSelect').addEventListener('change', function() {
        document.getElementById('sortForm').submit();
       
    });
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
        const myElement = document.getElementById('navhome');
        const newElement = document.getElementById('navproduct');
        myElement.classList.remove('active');
        newElement.classList.add('active');
        });
</script>

@endsection

