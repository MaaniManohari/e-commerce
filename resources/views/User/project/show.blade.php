@extends('User.layouts.userFront')
@section('content')

<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>{{ $project->name }}</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Projects</a></li>
                    <li class="breadcrumb-item active">{{ $project->name }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <!-- Project Images -->
            <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                <div class="product-image">
                    <div class="product_img_box">
                        <img id="project_img" src="{{ asset($project->photos[0]) }}" alt="{{ $project->name }}"/>
                        <a href="#" class="product_img_zoom" title="Zoom">
                            <span class="linearicons-zoom-in"></span>
                        </a>
                    </div>
                    <div id="pr_item_gallery" class="project_gallery_item slick_slider" data-slides-to-show="4" data-slides-to-scroll="1" data-infinite="false">
                        @foreach ($project->photos as $index => $photo)
                            <div class="item">
                                <a href="#" class="project_gallery_item @if($index == 0) active @endif" data-image="{{ asset($photo) }}">
                                    <img src="{{ asset($photo) }}" alt="project_small_img{{ $index + 1 }}" />
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Project Details -->
            <div class="col-lg-6 col-md-6">
                <div class="pr_detail">
                    <div class="product_description">
                        <h4 class="project_title">{{ $project->name }}</h4>
                        <div class="pr_desc">
                            <p>{{ $project->description }}</p>
                        </div>
                    </div>
                    <hr />
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
