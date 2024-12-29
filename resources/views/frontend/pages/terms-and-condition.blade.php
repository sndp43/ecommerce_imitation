@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || Terms and conditions
@endsection

@section('content')
    <!--============================
        BREADCRUMB START
    ==============================-->

    <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="javascript:;">terms and conditions</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--============================
        BREADCRUMB END
    ==============================-->


    <!--============================
        PAYMENT PAGE START
    ==============================-->
    <section id="wsus__cart_view">
        <div class="container">
            <div class="wsus__pay_info_area">
                <div class="row">
                    <div class="card">
                        <div class="cart-body p-5">
                            {!!@$terms->content!!}
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
