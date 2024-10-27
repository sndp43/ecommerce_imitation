@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || About
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
                                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
                                        <li class="breadcrumb-item active" aria-current="page">About us</li>
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
        PAYMENT PAGE START
    ==============================-->
    <section id="wsus__cart_view" class="section-padding">
        <div class="container">
            <div class="wsus__pay_info_area">
                <div class="row">
                    <div class="card">
                        <div class="cart-body p-5">
                            {!!@$about->content!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        PAYMENT PAGE END
    ==============================-->
@endsection
