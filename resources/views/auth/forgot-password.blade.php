@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || Forgot Password
@endsection

@section('content')

    <!--============================
        BREADCRUMB START
    ==============================-->
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">login-forgot password</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->
    <!--============================
        BREADCRUMB END
    ==============================-->


    <!--============================
        FORGET PASSWORD START
    ==============================-->
    <!--
    <section id="wsus__login_register">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 m-auto">
                    <div class="wsus__forget_area">
                        <span class="qiestion_icon"><i class="fal fa-question-circle"></i></span>
                        <h4>forget password ?</h4>
                        <p>enter the email address to register with <span>e-shop</span></p>
                        <div class="wsus__login">
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="wsus__login_input">
                                    <i class="fal fa-envelope"></i>
                                    <input id="email" type="email" name="email" value="{{old('email')}}" placeholder="Your Email">
                                </div>

                                <button class="common_btn" type="submit">send</button>
                            </form>
                        </div>
                        <a class="see_btn mt-4" href="{{route('login')}}">go to login</a>
                    </div>
                </div>
            </div>
        </div>
    </section> -->



    <div class="login-register-wrapper section-padding">
        <div class="container">
            <div class="member-area-from-wrap">
                <div class="row">
                    <!-- Forgot Password Start -->
                    <div class="col-lg-6">
                        <div class="login-reg-form-wrap">
                            <h4>forget password ?</h4>
                            <p>enter the email address</p>
                            <form action="{{ route('password.email') }}" method="post">
                                @csrf
                                <div class="single-input-item">
                                    <input id="email" type="email" name="email" value="{{old('email')}}" placeholder="Your Email">
                                </div>
                                <div class="single-input-item">
                                    <button class="btn btn-sqr" type="submit">send</button>
                                    <a class="btn btn-text ms-4" href="{{route('login')}}">go to login</a>
                                </div>
                            </form>
                            
                        </div>
                       
                    </div>
                    <!-- Forgot Password End -->

                </div>
            </div>
        </div>
    </div>
    <!--============================
        FORGET PASSWORD END
    ==============================-->
@endsection
