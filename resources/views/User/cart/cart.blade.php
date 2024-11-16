@extends('User.layouts.userFront')
@section('content')
<!-- START SECTION BREADCRUMB -->
<!-- <div class="breadcrumb_section bg_gray page-title-mini">
    @if ($message = Session::get('success'))
        <div class="alert alert-secondary alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Shopping Cart</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Shopping Cart</li>
                </ol>
            </div>
        </div>
    </div>
</div> -->
<!-- END SECTION BREADCRUMB -->
<div class="breadcrumb_section" style="position: relative; background-image: url('{{ asset('assets/images/my/bg_7.jpg') }}'); background-size: cover; background-position: center; height: 300px;">
    <!-- Dark Overlay -->
    
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);"></div>

    <div class="container" style="position: relative; z-index: 1;">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1 style="color: white; text-shadow: 2px 2px 5px rgba(0,0,0,0.5);">Shopping Cart</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end" style="background-color: rgba(0,0,0,0.5); padding: 5px 10px; border-radius: 5px;">
                    <li class="breadcrumb-item"><a href="#" style="color: white;">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" style="color: white;">Pages</a></li>
                    <li class="breadcrumb-item active" style="color: white;">Shopping Cart</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- START MAIN CONTENT -->
<div class="main_content">
@if ($message = Session::get('success'))
        <div class="alert alert-secondary alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive shop_cart_table">
                    <form  method="POST" action="{{ route('cart.update') }}" enctype="multipart/form-data"> 
                                      @csrf
                                      @method('PUT')
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                            </thead>
                            <tbody id="cart-items-body">
                            @foreach($cartItems as $cart)
                                <tr>
                                    @php
                                        $images = json_decode($cart->product->images);
                                        $firstImage = $images[0] ?? 'path/to/default/image.jpg';
                                    @endphp
                                    <td class="product-thumbnail"><a href="#"><img src="{{ asset($firstImage) }}" alt="product1"></a></td>
                                    <td class="product-name" data-title="Product"><a href="#">{{$cart->product->name}}</a></td>
                                    <td class="product-price" data-title="Price">{{$cart->product->amount}}</td>
                                    
                                    <td class="product-quantity" data-title="Quantity">
                                        <div class="quantity">
                                        <input type="button" value="-" class="minus" onclick="decrementQuantity({{ $cart->id }})">
                    
                                        <input type="text" name="quantities[{{ $cart->id }}]" value="{{ $cart->quantity }}" id="quantity-{{ $cart->id }}" class="qty" size="4">
                                       <input type="button" value="+" class="plus" onclick="incrementQuantity({{ $cart->id }})">
                                        </div>
                                    </td>
                                    
                                    <td class="product-subtotal" data-title="Total">${{$cart->total}}</td>
                                    <td class="product-remove" data-title="Remove"><a href="{{route('cart.remove', $cart->id)}}"><i class="ti-close"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="6" class="px-0">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-lg-4 col-md-6 mb-3 mb-md-0"></div>
                                       
                                        <div class="col-lg-8 col-md-6 text-left text-md-right">
                                            <button class="btn btn-line-fill btn-sm" type="submit" onclick="submitAllForms()">Update Cart</button>
                                        </div>
                                        
                                    </div>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                      </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="medium_divider"></div>
                    <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
                    <div class="medium_divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="border p-3 p-md-4">
                        <div class="heading_s1 mb-3">
                            <h6>Cart Totals</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td class="cart_total_label">Total</td>
                                    <td class="cart_total_amount"><strong>${{$grandTotal}}</strong></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="{{route('cart.checkout')}}" id="proceed-button" class="btn btn-fill-out">Proceed To CheckOut</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->



</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var cartItemsBody = document.getElementById('cart-items-body');
        var proceedButton = document.getElementById('proceed-button');
        const myElement = document.getElementById('navhome');
        myElement.classList.remove('active');

        if (cartItemsBody.children.length === 0) {
            proceedButton.disabled = true;
            proceedButton.classList.add('disabled');
        }
    });
</script>
<script>


function incrementQuantity(cartId) {
    var quantityInput = document.getElementById('quantity-' + cartId);
    quantityInput.value = parseInt(quantityInput.value) ; // Increment the value
}

function decrementQuantity(cartId) {
    var quantityInput = document.getElementById('quantity-' + cartId);
    if (quantityInput.value > 1) {
        quantityInput.value = parseInt(quantityInput.value) ; // Decrement the value if greater than 1
    }
}
function submitAllForms() {
    document.querySelectorAll('form[id^="cart-form-"]').forEach(function(form) {
        form.submit(); 
    });
}
</script>
@endsection

