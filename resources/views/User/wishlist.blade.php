@extends('User.layouts.userFront')

@section('content')

<div class="breadcrumb_section" style="position: relative; background-image: url('{{ asset('assets/images/my/bg_8.jpg') }}'); background-size: cover; background-position: center; height: 300px;">
    <!-- Dark Overlay -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);"></div>

    <div class="container" style="position: relative; z-index: 1;">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1 style="color: white; text-shadow: 2px 2px 5px rgba(0,0,0,0.5);">Wishlist</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end" style="background-color: rgba(0,0,0,0.5); padding: 5px 10px; border-radius: 5px;">
                    <li class="breadcrumb-item"><a href="#" style="color: white;">Home</a></li>
                    <li class="breadcrumb-item active" style="color: white;">Wishlist</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive wishlist_table">
                	<table class="table">
                    	<thead>
                        	<tr>
                            	<th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-stock-status">Stock Status</th>
                                <th class="product-add-to-cart"></th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($wishlists as $wishlist)
                        	<tr>
                            @php
                                        $images = json_decode($wishlist->product->images);
                                        $firstImage = $images[0] ?? 'path/to/default/image.jpg';
                                    @endphp
                            	<td class="product-thumbnail">
                                    <a href="#"><img src="{{ asset($firstImage) }}" alt="{{ $wishlist->product->name }}"></a>
                                </td>
                                <td class="product-name" data-title="Product">
                                    <a href="#">{{ $wishlist->product->name }}</a>
                                </td>
                                <td class="product-price" data-title="Price">${{ $wishlist->product->amount }}</td>
                              	<td class="product-stock-status" data-title="Stock Status">
                                    @if($wishlist->product->quantity > 0)
                                        <span class="badge badge-pill badge-success">In Stock</span>
                                    @else
                                        <span class="badge badge-pill badge-danger">Out of Stock</span>
                                    @endif
                                </td>
                                <td class="product-add-to-cart">

                                <form id="cartForm{{ $wishlist->product->id }}" method="POST" action="{{ route('cart.add',  ['product_id' => $wishlist->product->id,'quantity'=>1,'amount'=>$wishlist->product->amount]) }}" enctype="multipart/form-data">
                                          @csrf
                                            <a href="javascript:void(0);" class="btn btn-fill-out" onclick="document.getElementById('cartForm{{ $wishlist->product->id }}').submit();">
                                               <i class="icon-basket-loaded"></i> Add To Cart
                                         </a>
                                         </form>

                              <!-- <a href="{{ url('/cart/add')}}" class="btn btn-fill-out"><i class="icon-basket-loaded"></i> Add to Cart</a> -->
                                </td>
                                <td class="product-remove" data-title="Remove">
                                    <form action="{{ route('wishlist.remove', $wishlist->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="ti-close"></i></button>
                                    </form>
                                </td>
                            </tr>
                        	@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->
<script>
document.addEventListener('DOMContentLoaded', function() {
            const myElement = document.getElementById('navhome');
            myElement.classList.remove('active');
        });
</script>
@endsection
