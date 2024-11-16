@extends('admin.layouts.admin')
@section('content')

<div class="main_content">
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Order #{{ $order->id }}</h3>
                        </div>
                        <div class="card-body">
                            <!-- Customer Details -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <h4>Customer Details</h4>
                                    <p><strong>Name:</strong> {{ $order->user->name }}</p>
                                    <p><strong>Email:</strong> {{ $order->user->email }}</p>
                                    <p><strong>Contact Number:</strong> {{ $order->user->contact_number }}</p>
                                    <p><strong>Address:</strong> {{ $order->user->address }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h4>Order Details</h4>
                                    <p><strong>Order Amount:</strong> ${{ $order->grand_total }}</p>
                                    <p><strong>Status:</strong> 
                                        @if($order->status === 'pending')
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif($order->status === 'approved')
                                            <span class="badge badge-success">Approved</span>
                                        @elseif($order->status === 'rejected')
                                            <span class="badge badge-danger">Rejected</span>
                                        @endif
                                    </p>
                                    <p><strong>Address:</strong> {{ $order->address }}</p>
                                    <p><strong>Reason for Rejection:</strong> {{ $order->reason ?? 'N/A' }}</p>
                                </div>
                            </div>

                            <!-- Order Items -->
                            <h4>Order Items</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($order->orderItems->isNotEmpty())
                                        @foreach($order->orderItems as $item)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset($item->product_image) }}" alt="Product Image" width="50" height="50">
                                                    {{ $item->product_name }}
                                                </td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>${{ $item->price }}</td>
                                                <td>${{ $item->total }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4">No items found for this order.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>

                            <!-- Order Summary -->
                            <h4>Order Summary</h4>
                            <p><strong>Order No:</strong> {{ $order->order_no }}</p>
                            <p><strong>Total:</strong> ${{ $order->grand_total }}</p>
                            <p><strong>Order Date:</strong> {{ $order->created_at->format('d-m-Y') }}</p>
                            <p><strong>Order Notes:</strong> {{ $order->additional }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


{{-- @endsection
<!-- Order Items -->
<h4>Order Items</h4>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @if($order->orderItems->isNotEmpty())
            @foreach($order->orderItems as $item)
                <tr>
                    <td>
                        <img src="{{ asset($item->product_image) }}" alt="Product Image" width="50" height="50">
                        {{ $item->product_name }}
                    </td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ $item->price }}</td>
                    <td>${{ $item->total }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4">No items found for this order.</td>
            </tr>
        @endif
    </tbody>
</table> --}}
