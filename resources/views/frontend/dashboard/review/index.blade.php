@extends('frontend.dashboard.layouts.master')

@section('title')
{{$settings->site_name}} || Product
@endsection

@section('content')
  <!--=============================
    DASHBOARD START
  ==============================-->
<!-- breadcrumb area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-wrap">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Reviews</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- breadcrumb area end -->
<!-- my account wrapper start -->
<div class="my-account-wrapper section-padding">
    <div class="container">
        <div class="section-bg-color">
            <div class="row">
                <div class="col-lg-12">
                @include('frontend.dashboard.layouts.sidebar')
                </div>
            </div>
        </div>
    </div>
</div>
<!-- my account wrapper end -->

  <!--=============================
    DASHBOARD START
  ==============================-->
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

@endpush
