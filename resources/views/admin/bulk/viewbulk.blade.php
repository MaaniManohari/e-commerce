@extends('admin.layouts.admin')
@section('content')

<div class="content-wrapper">
    <!-- Content Wrapper. Contains page content -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1>Bulk Orders</h1>
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
    
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    {{-- Message --}}
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    {{-- End Message --}}
                    
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Bulk Orders</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table  id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Address</th>
                                        <th>Response</th>
                                        <th>Note</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bulkOrders as $bulkOrder)
                                        <tr>
                                            <td>{{ $bulkOrder->name }}</td>
                                            <td>{{ $bulkOrder->email }}</td>
                                            <td>{{ $bulkOrder->contact }}</td>
                                            <td>{{ $bulkOrder->address }}</td>
                                            <td>
                                                <form action="{{ route('bulkorders.updateResponseAndNote', $bulkOrder->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="checkbox" name="response" {{ $bulkOrder->response ? 'checked' : '' }} 
                                                        onchange="this.form.submit()" 
                                                        style="
                                                            appearance: none;
                                                            width: 25px;
                                                            height: 25px;
                                                            background-color: white;
                                                            border: 2px solid blue;
                                                            border-radius: 4px;
                                                            display: inline-block;
                                                            position: relative;
                                                        ">
                                                    <style>
                                                        input[type="checkbox"]:checked::after {
                                                            content: '✔';
                                                            color: blue;
                                                            font-size: 20px;
                                                            position: absolute;
                                                            top: -3px;
                                                            left: 2px;
                                                        }
                                                    </style>
                                            <td>
                                                    <textarea name="note" class="form-control" rows="2" onchange="this.form.submit()">{{ $bulkOrder->note }}</textarea>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Address</th>
                                        <th>Response</th>
                                        <th>Note</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection

<!-- Custom CSS to style the checkbox and textarea -->
@section('styles')
<style>
    input[type="checkbox"] {
        transform: scale(1.5);
        margin-right: 10px;
    }
    textarea {
        resize: none;
    }
</style>
@endsection


