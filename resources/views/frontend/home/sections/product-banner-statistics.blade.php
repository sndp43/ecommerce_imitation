@php
    $categories = \App\Models\Category::where('status', 1)
    ->get();
@endphp       
       
       <!-- product banner statistics area start -->
        <section class="product-banner-statistics">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="product-banner-carousel slick-row-10">
                        @foreach ($categories as $category)
                            <!-- banner single slide start -->
                            <div class="banner-slide-item">
                                <figure class="banner-statistics">
                                    <a href="{{route('products.index', ['category' => $category->slug])}}">
                                        <img src="{{asset($category->thumb_image)}}" alt="{{$category->name}}">
                                    </a>
                                    <div class="banner-content banner-content_style2">
                                        <h5 class="banner-text3"><a href="{{route('products.index', ['category' => $category->slug])}}">{{$category->name}}</a></h5>
                                    </div>
                                </figure>
                            </div>
                        @endforeach
                            <!-- banner single slide start -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- product banner statistics area end -->