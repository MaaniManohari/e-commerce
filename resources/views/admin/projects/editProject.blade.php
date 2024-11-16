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
                        <h1>Edit Project</h1>
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
                        {{-- message --}}
                        @if ($errors->any())
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
                        {{-- end --}}
                        <div class="card card-orange">
                            <div class="card-header">
                                <h3 class="card-title text-white">Edit Project</h3>
                            </div>

                            <!-- form start -->
                            <form method="POST" action="{{ route('projects.update', $project->id) }}" enctype="multipart/form-data">
                                @csrf <!-- CSRF Protection -->
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-md-8 col-sm-12">
                                            <label for="projectName">Project Name</label>
                                            <input type="text" name="name" class="form-control" id="projectName" value="{{ old('name', $project->name) }}">
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <label for="projectImages">Project Photos</label>
                                            <input type="file" name="photos[]" class="form-control" multiple>
                                        </div>
                                        <div class="col-md-12 col-sm-12 mt-3">
                                            <label>Available Photos</label>
                                            <div>
                                                @if (!empty($project->images))
                                                    @php
                                                        $images = json_decode($project->images, true);
                                                    @endphp
                                                    @if (is_array($images))
                                                        @foreach ($images as $index => $image)
                                                            <div style="display: inline-block; margin: 5px; position: relative;">
                                                                <img src="{{ asset('storage/' . $image) }}" alt="Project Image" width="100" height="100">
                                                                <button type="button" class="btn btn-danger btn-sm" style="position: absolute; top: 5px; right: 5px;" onclick="removeImage('{{ $index }}')">Remove</button>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <p>No photos available</p>
                                                    @endif
                                                @else
                                                    <p>No photos available</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12 col-sm-12">
                                            <label for="projectDescription">Description</label>
                                            <textarea name="description" class="form-control" id="projectDescription" placeholder="Enter Project Description">{{ old('description', $project->description) }}</textarea>
                                        </div>
                                    </div>

                                    @error('type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn bg-orange text-white">Update</button>
                                </div>
                            </form>

                            <form id="removeImageForm" action="{{ route('projects.removeImage', $project->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="image_index" id="imageIndex">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <br>
    <br>
    <!-- /.card -->
    <script>
        function removeImage(index) {
            if (confirm('Are you sure you want to remove this image?')) {
                document.getElementById('imageIndex').value = index;
                document.getElementById('removeImageForm').submit();
            }
        }
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
@endsection
