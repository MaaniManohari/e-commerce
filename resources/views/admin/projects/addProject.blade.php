@extends('admin.layouts.admin')
@section('content')
<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Project</h1>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Project</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4 col-md-12 mx-auto">
                    <!-- general form elements -->
                    {{--message--}}
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
                    {{--end--}}
                    <div class="card card-orange">
                        <div class="card-header">
                            <h3 class="card-title text-white">Add Project</h3>
                        </div>

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('add.projects') }}" enctype="multipart/form-data">
                            @csrf <!-- CSRF Protection -->
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-md-8 col-sm-12">
                                        <label for="exampleInputName">Project Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Enter Project Name" required>
                                    </div>

                                    <div class="col-md-4 col-sm-12">
                                        <label for="exampleInputPassword">Project Images</label>
                                        <input type="file" name="images[]" class="form-control" multiple required>
                                        <small class="form-text text-muted">You can upload up to 10 images.</small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12 col-sm-12">
                                        <label for="exampleInputContact">Project Description</label>
                                        <textarea type="text" name="description" class="form-control" id="exampleInputContact" placeholder="Enter Project Description" required></textarea>
                                    </div>
                                </div>

                                @error('type')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn bg-orange text-white">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.card -->

<!-- Remove the datepicker CSS and JS if not used -->
@endsection
