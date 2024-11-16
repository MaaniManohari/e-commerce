@extends('admin.layouts.admin')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1>Orders</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"></li>
                        <li class="breadcrumb-item active">Orders</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Orders List</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>User ID</th>
                                        <th>User Name</th>
                                        <th>Order Amount</th>
                                        <th>Address</th>
                                        <th>User Contact No</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                        <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->user_id }}</td>
                                            <td>{{ $order->user ? $order->user->name : 'No User' }}</td>
                                            <td>${{ $order->grand_total }}</td>
                                            <td>{{ $order->user ? $order->user->address : 'No Address' }}</td>
                                            <td>{{ $order->user ? $order->user->contact : 'No Contact' }}</td>
                                            <td>
                                                @if($order->status === 'pending')
                                                    <span class="badge badge-warning">Pending</span>
                                                @elseif($order->status === 'approved')
                                                    <span class="badge badge-success">Approved</span>
                                                @elseif($order->status === 'rejected')
                                                    <span class="badge badge-danger">Rejected</span>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="status" value="approved">
                                                    <button type="submit" class="btn btn-success btn-sm">
                                                        <i class="fa fa-check"></i> Approve
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="showRejectForm({{ $order->id }})">
                                                        <i class="fa fa-times"></i> Reject 
                                                    </button>
                                                </form>

                                                <!-- Button to Trigger the Popup -->
                                                

                                                <!-- Popup Form for Rejection -->
                                                <div id="reject-form-{{ $order->id }}" class="reject-popup" style="display: none; position: absolute; background-color: #f8f9fa; padding: 15px; border: 1px solid #ccc;">
                                                    <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="status" value="rejected">
                                                        <div class="form-group">
                                                            <label for="reason-{{ $order->id }}">Reason for Rejection</label>
                                                            <textarea class="form-control" name="reason" id="reason-{{ $order->id }}" rows="3" required></textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-times"></i> Submit Rejection
                                                        </button>
                                                        <button type="button" class="btn btn-secondary btn-sm" onclick="hideRejectForm({{ $order->id }})">Cancel</button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.orders.viewOrder', $order->id) }}" class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye"></i> View
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>User ID</th>
                                        <th>User Name</th>
                                        <th>Order Amount</th>
                                        <th>Address</th>
                                        <th>User Contact No</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                        <th>View</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- JavaScript for handling popup forms -->
<script>
    function showRejectForm(orderId) {
        document.getElementById('reject-form-' + orderId).style.display = 'block';
    }

    function hideRejectForm(orderId) {
        document.getElementById('reject-form-' + orderId).style.display = 'none';
    }
</script>

<style>
    .reject-popup {
        z-index: 1000;
        width: 300px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
</style>

@endsection
