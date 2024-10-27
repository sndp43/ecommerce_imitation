        <!-- hero slider area start -->
        <section class="slider-area">
            <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
                @foreach ($sliders as $slider)
                <!-- single slider item start -->
                <div class="hero-single-slide hero-overlay">
                    <div class="hero-slider-item bg-img" data-bg="{{$slider->banner}}">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="hero-slider-content slide-1">
                                        <h2 class="slide-title">{!! $slider->type !!} <span>{!! $slider->title !!}</span></h2>
                                        <h6>start at {{$settings->currency_icon}}{{$slider->starting_price}}</h6>
                                      
                                        <a href="{{$slider->btn_url}}" class="btn btn-hero" tabindex="0">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single slider item start -->
                @endforeach
            </div>
        </section>
        <!-- hero slider area end -->