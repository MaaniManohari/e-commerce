@extends('User.layouts.userFront')

@section('content')

<!-- Breadcrumb Section -->
<div class="breadcrumb_section" style="position: relative; background-image: url('{{ asset('assets/banners/banners/2banner.png') }}'); background-size: cover; background-position: center; height: 300px;">
    <!-- Dark Overlay -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);"></div>

    <div class="container" style="position: relative; z-index: 1;">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1 style="color: white; text-shadow: 2px 2px 5px rgba(0,0,0,0.5);">Bulk Orders</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end" style="background-color: rgba(0,0,0,0.5); padding: 5px 10px; border-radius: 5px;">
                    <li class="breadcrumb-item"><a href="#" style="color: white;">Home</a></li>
                    <li class="breadcrumb-item active" style="color: white;">Bulk Orders</li>
                </ol>
            </div>
        </div>
    </div>
</div>



    <!-- Form Section with Background Image -->
    <div class="container mt-5" style="background-image: url('{{ asset('assets/images/my/bg_1.jpg') }}'); background-size: cover; background-position: center; padding: 40px; border-radius: 10px;">
        <div class="row">
            <div class="col-md-6">
                <!-- You can add content or images here if needed -->
            </div>

            <div class="col-md-6">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('bulk.order.submit') }}">
                    @csrf
                    <div class="form-group">
                        <label for="inputName">Name</label>
                        <input type="text" class="form-control" id="inputName" name="name" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="inputContact">Contact Number</label>
                        <input type="text" class="form-control" id="inputContact" name="contact" placeholder="Enter your contact number" required>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Enter your address" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <br>

@endsection
