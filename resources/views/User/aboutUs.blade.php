@extends('User.layouts.userFront')
@section('content')

<!-- Breadcrumb Section -->
<div class="breadcrumb_section" style="position: relative; background-image: url('{{ asset('assets/images/my/bg_9.jpg') }}'); background-size: cover; background-position: center; height: 300px;">
    <!-- Dark Overlay -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);"></div>

    <div class="container" style="position: relative; z-index: 1;">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1 style="color: white; text-shadow: 2px 2px 5px rgba(0,0,0,0.5);">About Us</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end" style="background-color: rgba(0,0,0,0.5); padding: 5px 10px; border-radius: 5px;">
                    <li class="breadcrumb-item"><a href="#" style="color: white;">Home</a></li>
                    <li class="breadcrumb-item active" style="color: white;">About Us</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<!-- STAT SECTION ABOUT --> 
<div class="section">
	<div class="container">
    	<div class="row align-items-center">
        	<div class="col-lg-6">
            	<div class="about_img scene mb-4 mb-lg-0">
                    <img src="assets\images\my\ghj.jpg" alt="about_img"/>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="heading_s1">
                    <h2>Who We are</h2>
                </div>
                <p> We provide innovative home décors and appliances, designing to enhance the beauty and functionality of modern homes. We curate a wide range of stylish and contemporary products, from elegant furniture to smart home appliances, tailoring to fit every aesthetic and lifestyle.</p>
                <p>We believe in blending design with technology, offering cutting-edge solutions that not only transform your space but also simplify everyday living. Our ecommerce website makes it easy for you to explore our diverse collection, with seamless online shopping and fast, reliable delivery straight to your door.</p>
                <p>Whether you're refreshing a single room or outfitting an entire home, We provides the quality, convenience, and inspiration you need to bring your dream home to life.</p>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION ABOUT --> 

<!-- START SECTION WHY CHOOSE --> 
<div class="section bg_light_blue2 pb_70">
	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-lg-6 col-md-8">
            	<div class="heading_s1 text-center">
                	<h2>Why Choose Us?</h2>
                </div>
                <p class="text-center leads">At Concept Store, we believe that the little things make a big difference in your home. Our selection of minimalistic decor and small home essentials is thoughtfully curated to add a touch of elegance to your space.</p>
            </div>
        </div>
        <div class="row justify-content-center">
        	<div class="col-lg-4 col-sm-6">
            	<div class="icon_box icon_box_style4 box_shadow1">
                	<div class="icon">
                    	<i class="ti-pencil-alt"></i>
                    </div>
                    <div class="icon_box_content">
                    	<h5>Simple, Beautiful Designs</h5>
                        <p>We offer a collection of sleek, minimalistic home decor and appliances that blend seamlessly into any space and designed to be both functional and stylish, perfect for those who appreciate clean and beauty.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
            	<div class="icon_box icon_box_style4 box_shadow1">
                	<div class="icon">
                    	<i class="ti-layers"></i>
                    </div>
                    <div class="icon_box_content">
                    	<h5>Affordable Quality</h5>
                        <p>Quality doesn’t have to come at a high price. At Concept Store, our items are carefully chosen for their durability and affordability, ensuring you get the best value without compromising on style.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
            	<div class="icon_box icon_box_style4 box_shadow1">
                	<div class="icon">
                    	<i class="ti-email"></i>
                    </div>
                    <div class="icon_box_content">
                    	<h5>Curated Simplicity</h5>
                        <p>Our store is designed for simplicity. You won’t feel overwhelmed by options – instead, you'll find a refined selection of handpicked items that bring balance and harmony to your home.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION WHY CHOOSE --> 

<!-- START SECTION TEAM -->
<!-- <div class="section pb_70">
	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-lg-6">
            	<div class="heading_s1 text-center">
                	<h2>Our Team Members</h2>
                </div>
                <p class="text-center leads">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
            </div>
        </div>
        <div class="row justify-content-center">
        	<div class="col-lg-3 col-sm-6">
            	<div class="team_box team_style1">
                	<div class="team_img">
                    	<img src="assets/images/team_img1.jpg" alt="team_img1">
                        <ul class="social_icons social_style1">
                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                    <div class="team_content">
                        <div class="team_title">
                            <h5>John Muniz</h5>
                            <span>Project Engineer</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
            	<div class="team_box team_style1">
                	<div class="team_img">
                    	<img src="assets/images/team_img2.jpg" alt="team_img2">
                        <ul class="social_icons social_style4">
                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                    <div class="team_content">
                        <div class="team_title">
                            <h5>Alea Brooks</h5>
                            <span>Graphics Designer</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
            	<div class="team_box team_style1">
                	<div class="team_img">
                    	<img src="assets/images/team_img3.jpg" alt="team_img3">
                        <ul class="social_icons social_style4">
                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                    <div class="team_content">
                        <div class="team_title">
                            <h5>Anders Glick</h5>
                            <span>Software Developer</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
            	<div class="team_box team_style1">
                	<div class="team_img">
                    	<img src="assets/images/team_img4.jpg" alt="team_img4">
                        <ul class="social_icons social_style4">
                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                    <div class="team_content">
                        <div class="team_title">
                            <h5>Richard Tice</h5>
                            <span>Web Developer</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- END SECTION TEAM -->

<!-- START SECTION TESTIMONIAL -->
<!-- <div class="section bg_redon">
	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-md-6">
            	<div class="heading_s1 text-center">
                	<h2>Our Client Say!</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-9">
            	<div class="testimonial_wrap testimonial_style1 carousel_slider owl-carousel owl-theme nav_style2" data-nav="true" data-dots="false" data-center="true" data-loop="true" data-autoplay="true" data-items='1'>
                	<div class="testimonial_box">
                    	<div class="testimonial_desc">
                        	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquam amet animi blanditiis consequatur debitis dicta distinctio, enim error eum iste libero modi nam natus perferendis possimus quasi sint sit tempora voluptatem.</p>
                        </div>
                        <div class="author_wrap">
                            
                            <div class="author_name">
                                <h6>Lissa Castro</h6>
                                <span>Designer</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial_box">
                    	<div class="testimonial_desc">
                        	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquam amet animi blanditiis consequatur debitis dicta distinctio, enim error eum iste libero modi nam natus perferendis possimus quasi sint sit tempora voluptatem.</p>
                        </div>
                        <div class="author_wrap">
                            
                            <div class="author_name">
                                <h6>Alden Smith</h6>
                                <span>Designer</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial_box">
                    	<div class="testimonial_desc">
                        	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquam amet animi blanditiis consequatur debitis dicta distinctio, enim error eum iste libero modi nam natus perferendis possimus quasi sint sit tempora voluptatem.</p>
                        </div>
                        <div class="author_wrap">
                            
                            <div class="author_name">
                                <h6>Daisy Lana</h6>
                                <span>Designer</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial_box">
                    	<div class="testimonial_desc">
                        	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquam amet animi blanditiis consequatur debitis dicta distinctio, enim error eum iste libero modi nam natus perferendis possimus quasi sint sit tempora voluptatem.</p>
                        </div>
                        <div class="author_wrap">
                            
                            <div class="author_name">
                                <h6>John Becker</h6>
                                <span>Designer</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- END SECTION TESTIMONIAL -->

<!-- START SECTION SHOP INFO -->
<div class="section pb_70">
    	<div class="container">
            <div class="row no-gutters">
                <div class="col-lg-4">	
                    <div class="icon_box icon_box_style1">
                        <div class="icon">
                            <i class="flaticon-shipped"></i>
                        </div>
                        <div class="icon_box_content">
                            <h5>Boundless Delivery</h5>
                            <p>No matter where you are. With our global shipping services, we bring style and innovation to homes around the world, hassle-free.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">	
                    <div class="icon_box icon_box_style1">
                        <div class="icon">
                            <i class="flaticon-money-back"></i>
                        </div>
                        <div class="icon_box_content">
                            <h5>Personal Touch</h5>
                            <p> We always ready to help you find exactly what you need for your space, with personalized attention</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">	
                    <div class="icon_box icon_box_style1">
                        <div class="icon">
                            <i class="flaticon-support"></i>
                        </div>
                        <div class="icon_box_content">
                            <h5>Convenient Shopping</h5>
                            <p>Shop with ease, whether you visit us in-store or online.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- END SECTION SHOP INFO -->
<script>
document.addEventListener('DOMContentLoaded', function() {
            const myElement = document.getElementById('navhome');
            const newElement = document.getElementById('navabout');
            myElement.classList.remove('active');
             newElement.classList.add('active');
        });
</script>


@endsection