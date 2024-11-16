<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Anil z" name="author">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Shopwise is Powerful features and You Can Use The Perfect Build this Template For Any eCommerce Website. The template is built for sell Fashion Products, Shoes, Bags, Cosmetics, Clothes, Sunglasses, Furniture, Kids Products, Electronics, Stationery Products and Sporting Goods.">
    <meta name="keywords" content="ecommerce, electronics store, Fashion store, furniture store,  bootstrap 4, clean, minimal, modern, online store, responsive, retail, shopping, ecommerce store">

    <!-- SITE TITLE -->
    <title>Shopwise </title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset("front/assets/images/favicon.png")}}">
    <!-- Animation CSS -->
{{--    <link rel="stylesheet" href="assets/css/animate.css">--}}
    <link rel="stylesheet" href="{{asset("front/assets/css/animate.css")}}">
    <!-- Latest Bootstrap min CSS -->
    <link rel="stylesheet" href="{{asset("front/assets/bootstrap/css/bootstrap.min.css")}}">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{asset("front/assets/css/all.min.css")}}">
    <link rel="stylesheet" href="{{asset("front/assets/css/ionicons.min.css")}}">
    <link rel="stylesheet" href="{{asset("front/assets/css/themify-icons.css")}}">
    <link rel="stylesheet" href="{{asset("front/assets/css/linearicons.css")}}">
    <link rel="stylesheet" href="{{asset("front/assets/css/flaticon.css")}}">
    <link rel="stylesheet" href="{{asset("front/assets/css/simple-line-icons.css")}}">
    <!--- owl carousel CSS-->
{{--    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/jqvmap/jqvmap.min.css') }}">--}}
    <link rel="stylesheet" href="{{asset("front/assets/owlcarousel/css/owl.carousel.min.css")}}">
    <link rel="stylesheet" href="{{asset("front/assets/owlcarousel/css/owl.theme.css")}}">
    <link rel="stylesheet" href="{{asset("front/assets/owlcarousel/css/owl.theme.default.min.css")}}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{asset("front/assets/css/magnific-popup.css")}}">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{asset("front/assets/css/slick.css")}}">
    <link rel="stylesheet" href="{{asset("front/assets/css/slick-theme.css")}}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset("front/assets/css/style.css")}}">
    <link rel="stylesheet" href="{{asset("front/assets/css/responsive.css")}}">
<style>
    .whatsapp-icon {
    
    transition: transform 0.3s ease;
}

.whatsapp-icon:hover {
    transform: scale(1.2); /* Increases the size by 1.5 times */
}

    </style>
</head>

<body>


{{--@yield('header', view('admin.components.header'))--}}
@yield('header', view('User.components.header'))

@yield('content')

@yield('footer', view('User.components.footer'))

<a href="viber://chat?number=94706920607"><img src="{{ asset('assets/images/my/viber.png') }}" class="whatsapp-icon" style="height: 50px;width: 50px;bottom: 220px;position: fixed;right: 20px;z-index: 99;border-radius:8px;"></a>
<a href="http://m.me/106285981618194"><img src="{{ asset('assets/images/my/messenger.png') }}" class="whatsapp-icon" style="height: 50px;width: 50px;bottom: 160px;position: fixed;right: 20px;z-index: 99;border-radius:8px;"></a>
<a href="https://api.whatsapp.com/send?phone=9607878128"><img src="{{ asset('assets/images/my/whatsapp.jpg') }}" class="whatsapp-icon" style="height: 50px;width: 50px;bottom: 100px;position: fixed;right: 20px;z-index: 99;border-radius:8px;"></a>
<a href="#" class="scrollup" ><i class="ion-ios-arrow-up"></i></a>

<!-- Latest jQuery -->
<script src="{{asset("front/assets/js/jquery-1.12.4.min.js")}}"></script>
<!-- popper min js -->
<script src="{{asset("front/assets/js/popper.min.js")}}"></script>
<!-- Latest compiled and minified Bootstrap -->
<script src="{{asset("front/assets/bootstrap/js/bootstrap.min.js")}}"></script>
<!-- owl-carousel min js  -->
<script src="{{asset("front/assets/owlcarousel/js/owl.carousel.min.js")}}"></script>
<!-- magnific-popup min js  -->
<script src="{{asset("front/assets/js/magnific-popup.min.js")}}"></script>
<!-- waypoints min js  -->
<script src="{{asset("front/assets/js/waypoints.min.js")}}"></script>
<!-- parallax js  -->
<script src="{{asset("front/assets/js/parallax.js")}}"></script>
<!-- countdown js  -->
<script src="{{asset("front/assets/js/jquery.countdown.min.js")}}"></script>
<!-- imagesloaded js -->
<script src="{{asset("front/assets/js/imagesloaded.pkgd.min.js")}}"></script>
<!-- isotope min js -->
<script src="{{asset("front/assets/js/isotope.min.js")}}"></script>
<!-- jquery.dd.min js -->
<script src="{{asset("front/assets/js/jquery.dd.min.js")}}"></script>
<!-- slick js -->
<script src="{{asset("front/assets/js/slick.min.js")}}"></script>
<!-- elevatezoom js -->
<script src="{{asset("front/assets/js/jquery.elevatezoom.js")}}"></script>
<!-- scripts js -->
<script src="{{asset("front/assets/js/scripts.js")}}"></script>

</body>
</html>
