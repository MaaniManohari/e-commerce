@extends('User.layouts.userFront')

@section('content')

<!-- Breadcrumb Section -->
<div class="breadcrumb_section" style="position: relative; background-image: url('{{ asset('assets/images/my/bg_contact.jpg') }}'); background-size: cover; background-position: center; height: 300px;">
    <!-- Dark Overlay -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);"></div>

    <div class="container" style="position: relative; z-index: 1;">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1 style="color: white; text-shadow: 2px 2px 5px rgba(0,0,0,0.5);">Contact Us</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end" style="background-color: rgba(0,0,0,0.5); padding: 5px 10px; border-radius: 5px;">
                    <li class="breadcrumb-item"><a href="#" style="color: white;">Home</a></li>
                    <li class="breadcrumb-item active" style="color: white;">Contact Us</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- START SECTION CONTACT -->
<div class="section pb_70" >
    <div class="container" style="background-image: url('{{ asset('assets/images/my/conbg.jpg') }}'); background-size: cover; background-position: center; padding: 40px; border-radius: 10px;">
        <div class="row">
            <div class="col-xl-4 col-md-6">
                <div class="contact_wrap contact_style3">
                    <div class="contact_icon">
                        <i class="linearicons-map2"></i>
                    </div>
                    <div class="contact_text">
                        <span>Address</span>
                        <p>Ma.Tharaadh / Sayyid Kilegefaanu magu., Male, Maldives</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="contact_wrap contact_style3">
                    <div class="contact_icon">
                        <i class="linearicons-envelope-open"></i>
                    </div>
                    <div class="contact_text">
                        <span>Email Address</span>
                        <a href="mailto:info@sitename.com">info@concepthomemv.com</a><br><br>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="contact_wrap contact_style3">
                    <div class="contact_icon">
                        <i class="linearicons-tablet2"></i>
                    </div>
                    <div class="contact_text">
                        <span>Phone</span>
                        <p> +960 3331039<br>+960 7878128</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION CONTACT -->

<div class="row justify-content-center">
           <div class="col-xl-4 col-md-6 justify-content-center">
                <div class="contact_wrap contact_style3">
                    <!-- <div class="contact_icon">
                    <i class="icofont-facebook-messenger"></i>
                    </div> -->
                    
                    <div class="contact_text">
                        <a href="http://m.me/106285981618194">
                    <button type="submit" class="btn btn-fill-out" style="background-color: rgb(253, 253, 253); color: rgb(248, 248, 248); border: none;"><b>Contact Us On Messenger</b></button>
                      </a>
                    </div><br>
                    <a href="http://m.me/106285981618194"><img  src="{{ asset('assets/images/my/facebook-messenger.svg') }}" style="height: 50px;;width: 50px;;" alt="logo"></a>
                </div>
            </div>
</div>
<!-- START CONTACT FORM SECTION WITH BACKGROUND IMAGE -->
<div class="container mt-5" style="background-image: url('{{ asset('assets/banners/banners/bg2.jpg') }}'); background-size: cover; background-position: center; padding: 40px; border-radius: 10px;">
    <div class="row" style="padding-bottom: 20px">
        <!-- Left Side: Contact Form -->
        <div class="col-lg-6">
            <div class="heading_s1">
                <h2 style="color: rgb(219, 211, 211)">Get In touch</h2>
            </div>
            <p class="leads">Type and submit your messages here...</p>

            <!-- Display success message -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="field_form">
                <form method="POST" action="{{ route('contact.form.submit') }}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input required placeholder="Enter Name *" class="form-control" name="name" type="text">
                        </div>
                        <div class="form-group col-md-6">
                            <input required placeholder="Enter Email *" class="form-control" name="email" type="email">
                        </div>
                        <div class="form-group col-md-6">
                            <input required placeholder="Enter Phone No. *" class="form-control" name="phone">
                        </div>
                        <div class="form-group col-md-6">
                            <input placeholder="Enter Subject" class="form-control" name="subject">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea required placeholder="Message *" class="form-control" name="message" rows="4"></textarea>
                        </div>
                        <div class="col-md-12" style="color: whitesmoke;">
                            <button type="submit" class="btn btn-fill-out" style="background-color: rgb(253, 253, 253); color: rgb(248, 248, 248); border: none;">Send Message</button>
                           
                        </div>
                    </div>
                </form>
            </div>
        </div>




        <!-- Right Side: Google Map -->
        <div class="col-lg-6">
            <div class="mapouter">
                <div class="gmap_canvas">
                    <iframe width="100%" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=123%20Street,%20Old%20Male,%20Maldives,%20UK&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END CONTACT FORM SECTION -->
<br>

<script>
document.addEventListener('DOMContentLoaded', function() {
            const myElement = document.getElementById('navhome');
            const newElement = document.getElementById('navcontact');
            myElement.classList.remove('active');
             newElement.classList.add('active');
        });
</script>
@endsection
