 <!-- banner statistics area start -->
 {{-- single-banner --}}
        <div class="banner-statistics-area">
            <div class="container">
                <div class="row row-20 mtn-20">
                    <div class="col-sm-6">
                        @if ($homepage_secion_banner_two->banner_one->status == 1)
                        <figure class="banner-statistics mt-20">
                            <a href="{{$homepage_secion_banner_two->banner_one->banner_url}}">
                                <img src="{{asset($homepage_secion_banner_two->banner_one->banner_image)}}" alt="product banner">
                            </a>
                            
                        </figure>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        @if ($homepage_secion_banner_two->banner_two->status == 1)
                        <figure class="banner-statistics mt-20">
                            <a href="{{$homepage_secion_banner_two->banner_two->banner_url}}">
                                <img src="{{asset($homepage_secion_banner_two->banner_two->banner_image)}}"  alt="product banner">
                            </a>
                            
                        </figure>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- banner statistics area end -->