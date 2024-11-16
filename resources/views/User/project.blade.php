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
                    <h1 style="color: white; text-shadow: 2px 2px 5px rgba(0,0,0,0.5);">Project Us</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end" style="background-color: rgba(0,0,0,0.5); padding: 5px 10px; border-radius: 5px;">
                    <li class="breadcrumb-item"><a href="#" style="color: white;">Home</a></li>
                    <li class="breadcrumb-item active" style="color: white;">Project Us</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row shop_container" style="padding: 20px">
    @foreach ($projects as $project)
        <div class="col-lg-4 col-md-6 col-8">
            <div class="product_box text-center">
                <div class="product_img">
                    @php
                        $photos = json_decode($project->photos);
                        $firstPhoto = $photos[0] ?? 'path/to/default/image.jpg';
                    @endphp
                    <a href="{{ route('projects.view', $project->id) }}">
                        <img src="{{ asset($firstPhoto) }}" alt="project_image">
                    </a>
                </div>
                <div class="product_info">
                    <h6 class="product_title"><a href="{{ route('projects.view', $project->id) }}">{{ $project->name }}</a></h6>
                    <div class="pr_desc">
                        <p>{{ $project->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
