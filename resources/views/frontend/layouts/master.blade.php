<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>
        @yield('title')
    </title>
    <link rel="icon" type="image/png" href="{{ asset($logoSetting->favicon) }}">
    <!-- Favicon -->
    {{-- <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico"> --}}

    <!-- CSS
     ============================================ -->
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/vendor/bootstrap.min.css')}}">
    <!-- Pe-icon-7-stroke CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/vendor/pe-icon-7-stroke.css')}}">
    <!-- Font-awesome CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/vendor/font-awesome.min.css')}}">
    <!-- Slick slider css -->
    <link rel="stylesheet" href="{{asset('frontend/css/plugins/slick.min.css')}}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{asset('frontend/css/plugins/animate.css')}}">
    <!-- Nice Select css -->
    <link rel="stylesheet" href="{{asset('frontend/css/plugins/nice-select.css')}}">
    <!-- jquery UI css -->
    <link rel="stylesheet" href="{{asset('frontend/css/plugins/jqueryui.min.css')}}">
    <!-- main style css -->
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    @if ($settings->layout === 'RTL')
        <link rel="stylesheet" href="{{ asset('frontend/css/rtl.css') }}">
    @endif
    @vite(['resources/js/app.js'])
</head>

<body>

    <!--============================
        HEADER START
    ==============================-->
    @include('frontend.layouts.header')
    <!--============================
        HEADER END
    ==============================-->

    <!--============================
        Main Content Start
    ==============================-->
    @yield('content')
    <!--============================
       Main Content End
    ==============================-->

    <!--============================
        QUICK VIEW Start
    ==============================-->
    @include('frontend.layouts.quickview')
    <!--============================
       QUICK VIEW End
    ==============================-->


    <!--============================
        SCROLL BUTTON START
    ==============================-->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!--============================
        SCROLL BUTTON  END
    ==============================-->


    <!--============================
        FOOTER PART START
    ==============================-->
    @include('frontend.layouts.footer')
    <!--============================
        FOOTER PART END
    ==============================-->

    <!--============================
        MINI CART START
    ==============================-->
    @include('frontend.layouts.minicart')
    <!--============================
        MINI CART END
    ==============================-->

 <!-- JS
============================================ -->

    <!-- Modernizer JS -->
    <script src="{{asset('frontend/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <!-- jQuery JS -->
    <script src="{{asset('frontend/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('frontend/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <!-- slick Slider JS -->
    <script src="{{asset('frontend/js/plugins/slick.min.js')}}"></script>
    <!-- Countdown JS -->
    <script src="{{asset('frontend/js/plugins/countdown.min.js')}}"></script>
    <!-- Nice Select JS -->
    <script src="{{asset('frontend/js/plugins/nice-select.min.js')}}"></script>
    <!-- jquery UI JS -->
    <script src="{{asset('frontend/js/plugins/jqueryui.min.js')}}"></script>
    <!-- Image zoom JS -->
    <script src="{{asset('frontend/js/plugins/image-zoom.min.js')}}"></script>
    <!-- Images loaded JS -->
    <script src="{{asset('frontend/js/plugins/imagesloaded.pkgd.min.js')}}"></script>
    <!-- mail-chimp active js -->
    <script src="{{asset('frontend/js/plugins/ajaxchimp.js')}}"></script>
    <!-- contact form dynamic js -->
    <script src="{{asset('frontend/js/plugins/ajax-mail.js')}}"></script>
    <!-- google map api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script>
    <!-- google map active js -->
    <script src="{{asset('frontend/js/plugins/google-map.js')}}"></script>

    <!--main/custom js-->
    <script src="{{ asset('frontend/js/main.js') }}"></script>

    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}")
            @endforeach
        @endif
    </script>
    @include('frontend.layouts.scripts')
    @stack('scripts')
</body>

</html>
