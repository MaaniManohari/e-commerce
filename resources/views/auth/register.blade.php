@extends('User.layouts.userFront')
@section('content')

<!-- START MAIN CONTENT -->
<div class="main_content">

    <!-- START LOGIN SECTION -->
    <div class="login_register_wrap section" style="position: relative; background-image: url('{{ asset('assets/images/my/bg_1.jpg') }}'); background-size: cover; background-position: center; min-height: 100vh;">
        <!-- Dark overlay -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 1;"></div>
        <div class="container" style="position: relative; z-index: 2;">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10">
                    <br><br>
                    <div class="login_wrap">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h3>Create an Account</h3>
                            </div>
                            <form action="{{ route('user.register') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" required class="form-control" name="name" placeholder="Enter Your Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" required class="form-control" name="email" placeholder="Enter Your Email">
                                </div>
                                <div class="form-group">
                                    <input type="text" required class="form-control" name="address" placeholder="Enter Your Address">
                                </div>
                                <div class="form-group">
                                    <input type="text" required class="form-control" name="contact" placeholder="Enter Your Mobile Number">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" required type="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" required type="password" name="confirm_password" placeholder="Confirm Password">
                                </div>
                                <div class="login_footer form-group">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2" value="">
                                            <label class="form-check-label" for="exampleCheckbox2"><span>I agree to terms &amp; Policy.</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-fill-out btn-block">Register</button>
                                </div>
                            </form>

                            <div class="form-note text-center">Already have an account? <a href="{{ route('login') }}">Log in</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END LOGIN SECTION -->

    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif
</div>
<!-- END MAIN CONTENT -->

@endsection
