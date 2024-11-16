@extends('User.layouts.userFront')
@section('content')
    <style>
        strong,p{
            color: black;
        }
    </style>
    <div class="breadcrumb_section" style="position: relative; background-image: url('{{ asset('assets/images/my/pro_bg.avif') }}'); background-size: cover; background-position: center; height: 300px;">
   
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);"></div>

    <div class="container" style="position: relative; z-index: 1;">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1 style="color: white; text-shadow: 2px 2px 5px rgba(0,0,0,0.5);">Profile</h1>
                </div>
            </div>
            <div class="col-md-6">
            <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="{{route('user.index')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active">View Order</li>
                    </ol>
            </div>
        </div>
    </div>
</div>
    <!-- START SECTION BREADCRUMB -->
    <!-- <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>View Order</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="{{route('user.index')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active">View Order</li>
                    </ol>
                </div>
            </div>
        </div>
    </div> -->
    <!-- END SECTION BREADCRUMB -->
    <div class="main_content">
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive order_table">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($order->orderItems as $item)
                                    <tr>
                                       
                                        <td>
                                            <!-- <img src="" alt="Product Image" width="50" height="50"> -->
                                            {{ $item->product->name }}
                                        </td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>${{ $item->total }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <br>
                            <div class="order_summary">
                                <p><strong>Order No:</strong> &nbsp; {{ $order->order_no }}</p>
                                <p><strong>Total:</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${{ $order->grand_total }}</p>
                                <p><strong>Order Date:</strong> {{ $order->created_at->format('d-m-Y') }}</p>
                                <p><strong>Order Notes:</strong> {{ $order->additional }}</p>

                            </div>
                        </div>
                        <a href="{{ route('user.index') }}" class="btn btn-fill-out">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection