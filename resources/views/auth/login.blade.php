@extends('User.layouts.userFront')
@section('content')

<!-- START MAIN CONTENT -->
<div class="main_content">

    <!-- START LOGIN SECTION -->
    <div class="login_register_wrap section" style="position: relative; background-image: url('{{ asset('assets/images/my/bg_1.jpg') }}'); background-size: cover; background-position: center; min-height: 100vh;">
        <!-- Dark overlay -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 1;"></div>
        <div class="container" style="position: relative; z-index: 2;">
            @if ($message = Session::get('error'))
                <div class="alert alert-secondary alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10">
                    <div class="login_wrap">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h3>Login</h3>
                            </div>
                            <form action="{{ route('user.login') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" required class="form-control" name="email" placeholder="Your Email">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" required type="password" name="password" placeholder="Password">
                                </div>
                                <div class="login_footer form-group">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                            <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                                        </div>
                                    </div>
                                    <a href="#">Forgot password?</a>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-fill-out btn-block" name="login">Log in</button>
                                </div>
                            </form>
                            <div class="form-note text-center">Don't Have an Account? <a href="{{ route('register') }}">Sign up now</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END LOGIN SECTION -->

</div>
<!-- END MAIN CONTENT -->

@endsection
