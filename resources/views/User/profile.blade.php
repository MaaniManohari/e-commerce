@extends('User.layouts.userFront')
@section('content')
<div class="breadcrumb_section" style="position: relative; background-image: url('{{ asset('assets/images/my/pro_bg.avif') }}'); background-size: cover; background-position: center; height: 300px;">
    <!-- Dark Overlay -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);"></div>

    <div class="container" style="position: relative; z-index: 1;">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1 style="color: white; text-shadow: 2px 2px 5px rgba(0,0,0,0.5);">Profile</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end" style="background-color: rgba(0,0,0,0.5); padding: 5px 10px; border-radius: 5px;">
                    <li class="breadcrumb-item"><a href="#" style="color: white;">Home</a></li>
                    <li class="breadcrumb-item active" style="color: white;">Profile</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br>
<!-- START SECTION SHOP -->
<div class="section" style="background-image: url('{{ asset('assets/banners/bg2.jpg') }}'); background-size: cover; background-position: center; background-color: #f5f5f5; height: 100vh;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="dashboard_menu">
                    <ul class="nav nav-tabs flex-column" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="account-detail-tab" data-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="ti-id-badge"></i>Account details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full"></i>Orders</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="tab-content dashboard_content">
                    <!-- Account Details -->
                    <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                        <div class="card">
                            <div class="card-header">
                                <h3>Account Details</h3>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('user.updateProfile') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Name <span class="required">*</span></label>
                                            <input required class="form-control" name="name" type="text" value="{{ $user->name }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Contact No <span class="required">*</span></label>
                                            <input required class="form-control" name="contact" type="text" value="{{ $user->contact }}">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Address <span class="required">*</span></label>
                                            <input required class="form-control" name="address" type="text" value="{{ $user->address }}">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Email Address <span class="required">*</span></label>
                                            <input required class="form-control" name="email" type="email" value="{{ $user->email }}">
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Orders -->
                    <div class="tab-pane  active" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                        <div class="card">
                            <div class="card-header">
                                <h3>Orders</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive order_table">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Order Date</th>
                                                <th>Order No</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($orders as $order)
                                                <tr>
                                                    <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                                    <td>{{ $order->order_no }}</td>
                                                    <td>
                                                        <a href="{{ route('orders.view', $order->id) }}" class="btn btn-warning">View</a>
                                                        <a href="{{ route('orders.pdf', $order->id) }}" class="btn btn-warning" target="_blank">Invoice</a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3" class="text-center">No orders found</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

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