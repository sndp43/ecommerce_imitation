 <!-- banner statistics area start -->
 {{-- single-banner --}}
        <!-- banner statistics area start -->
        <div class="banner-statistics-area">
            <div class="container">
                <div class="row row-20 mtn-20">
                    <div class="col-sm-6">
                    @if ($homepage_secion_banner_two->banner_one->status == 1)
                        <figure class="banner-statistics mt-20">
                            <a href="{{$homepage_secion_banner_two->banner_one->banner_url}}">
                                <img src="{{asset($homepage_secion_banner_two->banner_one->banner_image)}}" alt="product banner">
                            </a>
                            <div class="banner-content text-right">
                                <h5 class="banner-text1">{{$homepage_secion_banner_two->banner_one->banner_category}}</h5>
                                <h2 class="banner-text2">{!! html_entity_decode($homepage_secion_banner_two->banner_one->banner_title) !!}</h2>
                                <a href="{{$homepage_secion_banner_two->banner_one->banner_url}}" class="btn btn-text">{{$homepage_secion_banner_two->banner_one->banner_url_text ? $homepage_secion_banner_two->banner_one->banner_url_text : 'Shop Now'}}</a>
                            </div>
                    @endif
                        </figure>
                    </div>
                    <div class="col-sm-6">
                    @if ($homepage_secion_banner_two->banner_two->status == 1)
                        <figure class="banner-statistics mt-20">
                            <a href="{{$homepage_secion_banner_two->banner_two->banner_url}}">
                                <img src="{{asset($homepage_secion_banner_two->banner_two->banner_image)}}" alt="product banner">
                            </a>
                            <div class="banner-content text-right">
                                <h5 class="banner-text1">{{$homepage_secion_banner_two->banner_two->banner_category}}</h5>
                                <h2 class="banner-text2">{!! html_entity_decode($homepage_secion_banner_two->banner_two->banner_title) !!}</h2>
                                <a href="{{$homepage_secion_banner_two->banner_two->banner_url}}" class="btn btn-text">{{$homepage_secion_banner_two->banner_two->banner_url_text ? $homepage_secion_banner_two->banner_two->banner_url_text : 'Shop Now'}}</a>
                            </div>
                    @endif
                        </figure>
                    </div>
                    <div class="col-sm-6">
                    @if ($homepage_secion_banner_two->banner_three->status == 1)
                        <figure class="banner-statistics mt-20">
                            <a href="{{$homepage_secion_banner_two->banner_three->banner_url}}">
                                <img src="{{asset($homepage_secion_banner_two->banner_three->banner_image)}}" alt="product banner">
                            </a>
                            <div class="banner-content text-right">
                                <h5 class="banner-text1">{{$homepage_secion_banner_two->banner_three->banner_category}}</h5>
                                <h2 class="banner-text2">{!! html_entity_decode($homepage_secion_banner_two->banner_three->banner_title) !!}</h2>
                                <a href="{{$homepage_secion_banner_two->banner_three->banner_url}}" class="btn btn-text">{{$homepage_secion_banner_two->banner_three->banner_url_text ? $homepage_secion_banner_two->banner_three->banner_url_text : 'Shop Now'}}</a>
                            </div>
                    @endif
                        </figure>
                    </div>
                    <div class="col-sm-6">
                    @if ($homepage_secion_banner_two->banner_four->status == 1)
                        <figure class="banner-statistics mt-20">
                            <a href="{{$homepage_secion_banner_two->banner_four->banner_url}}">
                                <img src="{{asset($homepage_secion_banner_two->banner_four->banner_image)}}" alt="product banner">
                            </a>
                            <div class="banner-content text-right">
                                <h5 class="banner-text1">{{$homepage_secion_banner_two->banner_four->banner_category}}</h5>
                                <h2 class="banner-text2">{!! html_entity_decode($homepage_secion_banner_two->banner_four->banner_title) !!}</h2>
                                <a href="{{$homepage_secion_banner_two->banner_four->banner_url}}" class="btn btn-text">{{$homepage_secion_banner_two->banner_four->banner_url_text ? $homepage_secion_banner_two->banner_four->banner_url_text : 'Shop Now'}}</a>
                            </div>
                    @endif
                        </figure>
                    </div>

                </div>
            </div>
        </div>
        <!-- banner statistics area end -->