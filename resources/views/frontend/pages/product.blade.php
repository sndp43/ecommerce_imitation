@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || Product Details
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
                                <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">products</li>
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
        PRODUCT PAGE START
    ==============================-->

    <!-- page main wrapper start -->
    <div class="shop-main-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <!-- sidebar area start -->
                    <div class="col-lg-3 order-2 order-lg-1">
                        <aside class="sidebar-wrapper">
                            <!-- single sidebar start -->
                            <div class="sidebar-single">
                                <h5 class="sidebar-title">All categories</h5>
                                <div class="sidebar-body">
                                    <ul class="shop-categories">
                                    @foreach ($categories as $category)
                                        <li><a href="{{route('products.index', ['category' => $category->slug])}}">{{$category->name}} </a></li>
                                    @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- single sidebar end -->

                            <!-- single sidebar start -->
                            <div class="sidebar-single">
                                <h5 class="sidebar-title">price</h5>
                                <div class="sidebar-body">
                                    <div class="price-range-wrap">
                                        <div class="price-range" data-min="1" data-max="5000"></div>
                                        <div class="range-slider">
                                            <form action="{{url()->current()}}" class="d-flex align-items-center justify-content-between">
                                            @foreach (request()->query() as $key => $value)
                                                @if($key != 'range')
                                                    <input type="hidden" name="{{$key}}" value="{{$value}}" />
                                                @endif
                                                @endforeach
                                                <div class="price-input">
                                                    <label for="amount">Price: </label>
                                                    <input
                                                    value="{{request()->query('range')}}"    
                                                    data-currancy="{{$settings->currency_icon}}" 
                                                    name="range" 
                                                    type="hidden" 
                                                    id="amount">
                                                    <input 
                                                    name="visible-range" 
                                                    value="{{request()->query('visible-range')}}"
                                                    type="text" 
                                                    id="visible-amount">
                                                </div>
                                                <button type="submit" class="filter-btn">filter</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single sidebar end -->

                            <!-- single sidebar start -->
                            <div class="sidebar-single">
                                <h5 class="sidebar-title">Brand</h5>
                                <div class="sidebar-body">
                                <ul class="shop-categories">
                                    @foreach ($brands  as $brand)
                                        <li><a href="{{route('products.index', ['brand' => $brand->slug])}}">{{$brand->name}} </a></li>
                                    @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- single sidebar end -->

                            <!-- single sidebar start -->
                            <!-- <div class="sidebar-single">
                                <h5 class="sidebar-title">color</h5>
                                <div class="sidebar-body">
                                    <ul class="checkbox-container categories-list">
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck12">
                                                <label class="custom-control-label" for="customCheck12">black (20)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck13">
                                                <label class="custom-control-label" for="customCheck13">red (6)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck14">
                                                <label class="custom-control-label" for="customCheck14">blue (8)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck11">
                                                <label class="custom-control-label" for="customCheck11">green (5)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck15">
                                                <label class="custom-control-label" for="customCheck15">pink (4)</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div> -->
                            <!-- single sidebar end -->

                            <!-- single sidebar start -->
                            <!-- <div class="sidebar-single">
                                <h5 class="sidebar-title">size</h5>
                                <div class="sidebar-body">
                                    <ul class="checkbox-container categories-list">
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck111">
                                                <label class="custom-control-label" for="customCheck111">S (4)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck222">
                                                <label class="custom-control-label" for="customCheck222">M (5)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck333">
                                                <label class="custom-control-label" for="customCheck333">L (7)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck444">
                                                <label class="custom-control-label" for="customCheck444">XL (3)</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div> -->
                            <!-- single sidebar end -->

                            <!-- single sidebar start -->
                            <!-- <div class="sidebar-banner">
                                <div class="img-container">
                                    <a href="#">
                                        <img src="assets/img/banner/sidebar-banner.jpg" alt="">
                                    </a>
                                </div>
                            </div> -->
                            <!-- single sidebar end -->
                        </aside>
                    </div>
                    <!-- sidebar area end -->

                    <!-- shop main wrapper start -->
                    <div class="col-lg-9 order-1 order-lg-2">
                        <div class="shop-product-wrapper">
                            <!-- shop product top wrap start -->
                            <div class="shop-top-bar">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-md-6 order-2 order-md-1">
                                        <div class="top-bar-left">
                                            <div class="product-view-mode">
                                                <a class="active" href="#" data-target="grid-view" data-bs-toggle="tooltip" title="Grid View"><i class="fa fa-th"></i></a>
                                                <a href="#" data-target="list-view" data-bs-toggle="tooltip" title="List View"><i class="fa fa-list"></i></a>
                                            </div>
                                            <!-- <div class="product-amount">
                                                <p>Showing 1–16 of 21 results</p>
                                            </div> -->
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-5 col-md-6 order-1 order-md-2">
                                        <div class="top-bar-right">
                                            <div class="product-short">
                                                <p>Sort By : </p>
                                                <select class="nice-select" name="sortby">
                                                    <option value="trending">Relevance</option>
                                                    <option value="sales">Name (A - Z)</option>
                                                    <option value="sales">Name (Z - A)</option>
                                                    <option value="rating">Price (Low &gt; High)</option>
                                                    <option value="date">Rating (Lowest)</option>
                                                    <option value="price-asc">Model (A - Z)</option>
                                                    <option value="price-asc">Model (Z - A)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <!-- shop product top wrap start -->

                            
                            <!-- product item list wrapper start -->
                            <div class="shop-product-wrap grid-view row mbn-30">
                            @foreach ($products as $product)
                                <!-- product single item start -->
                                <div class="col-md-4 col-sm-6">
                                    <!-- product grid start -->
                                    <div class="product-item">
                                        <figure class="product-thumb">
                                            <a href="{{route('product-detail', $product->slug)}}">
                                                <img 
                                                    class="pri-img" 
                                                    src="{{asset($product->thumb_image)}}" alt="product">
                                                <img 
                                                    class="sec-img" 
                                                    src="@if(isset($product->productImageGalleries[0]->image))
                                                        {{asset($product->productImageGalleries[0]->image)}}
                                                    @else
                                                        {{asset($product->thumb_image)}}
                                                    @endif" 
                                                alt="product">
                                            </a>
                                            <div class="product-badge">
                                                <div class="product-label new">
                                                    <span>{{productType($product->product_type)}}</span>
                                                </div>
                                                @if(checkDiscount($product))
                                                <div class="product-label discount">
                                                    <span>
                                                        -{{calculateDiscountPercent($product->price, $product->offer_price)}}%
                                                    </span>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="button-group">
                                            <a  
                                                data-id="{{$product->id}}"    
                                                href="#" 
                                                class="add_to_wishlist"   
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="left"
                                                title="Add to wishlist"
                                                tabindex="0">
                                                <i class="pe-7s-like"></i>
                                            </a>
                                            <a href="#" 
                                                data-bs-toggle="modal"  data-bs-target="#quick_view" class="show_product_modal" 
                                                data-id="{{ $product->id }}"
                                                data-bs-toggle="tooltip" data-bs-placement="left" 
                                                title="Quick View">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                                
                                            <!-- <a href="#" 
                                                data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a> -->
                                            </div>
                                            <div class="cart-hover">
                                            <form class="shopping-cart-form">
                                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                                    @foreach ($product->variants as $variant)
                                                    @if ($variant->status != 0)
                                                        <select class="d-none" name="variants_items[]">
                                                            @foreach ($variant->productVariantItems as $variantItem)
                                                                @if ($variantItem->status != 0)
                                                                    <option value="{{$variantItem->id}}" {{$variantItem->is_default == 1 ? 'selected' : ''}}>{{$variantItem->name}} (${{$variantItem->price}})</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    @endif
                                                    @endforeach
                                                    <input class="" name="qty" type="hidden" min="1" max="100" value="1" />
                                                    <button class="btn btn-cart add_cart" type="submit">add to cart</button>
                                                </form>
                                                <!-- <button class="btn btn-cart">add to cart</button> -->
                                            </div>
                                        </figure>
                                        <div class="product-caption text-center">
                                            <div class="product-identity">
                                                <p class="manufacturer-name"><a href="{{route('product-detail', $product->slug)}}">{{limitText($product->brand->name, 53)}}</a></p>
                                            </div>
                                            <!-- <ul class="color-categories">
                                                <li>
                                                    <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                                </li>
                                                <li>
                                                    <a class="c-darktan" href="#" title="Darktan"></a>
                                                </li>
                                                <li>
                                                    <a class="c-grey" href="#" title="Grey"></a>
                                                </li>
                                                <li>
                                                    <a class="c-brown" href="#" title="Brown"></a>
                                                </li>
                                            </ul> -->
                                            <h6 class="product-name">
                                                <a href="{{route('product-detail', $product->slug)}}">{{limitText($product->name, 53)}}</a>
                                            </h6>
                                            <div class="price-box">
                                            @if(checkDiscount($product))
                                                <span class="price-regular">{{$settings->currency_icon}}{{$product->offer_price}}</span>
                                                <span class="price-old"><del>{{$settings->currency_icon}}{{$product->price}}</del></span>
                                            @else
                                                <span class="price-regular">{{$settings->currency_icon}}{{$product->price}}</span>
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product grid end -->

                                    <!-- product list item end -->
                                    <div class="product-list-item">
                                        <figure class="product-thumb">
                                            <a href="{{route('product-detail', $product->slug)}}">
                                                <img 
                                                class="pri-img" 
                                                src="{{asset($product->thumb_image)}}" alt="product">
                                                <img class="sec-img" src="
                                                @if(isset($product->productImageGalleries[0]->image))
                                                    {{asset($product->productImageGalleries[0]->image)}}
                                                @else
                                                    {{asset($product->thumb_image)}}
                                                @endif
                                                " alt="product">
                                            </a>
                                            <div class="product-badge">
                                                <div class="product-label new">
                                                    <span>{{productType($product->product_type)}}</span>
                                                </div>
                                                @if(checkDiscount($product))
                                                <div class="product-label discount">
                                                    <span>{{calculateDiscountPercent($product->price, $product->offer_price)}}%</span>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="button-group">
                                            <a  
                                                data-id="{{$product->id}}"    
                                                href="#" 
                                                class="add_to_wishlist"   
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="left"
                                                title="Add to wishlist"
                                                tabindex="0">
                                                <i class="pe-7s-like"></i>
                                            </a>
                                                <!-- <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a> -->
                                                <!-- <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a> -->
                                            </div>
                                            <div class="cart-hover">
                                            <form class="shopping-cart-form">
                                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                                    @foreach ($product->variants as $variant)
                                                    @if ($variant->status != 0)
                                                        <select class="d-none" name="variants_items[]">
                                                            @foreach ($variant->productVariantItems as $variantItem)
                                                                @if ($variantItem->status != 0)
                                                                    <option value="{{$variantItem->id}}" {{$variantItem->is_default == 1 ? 'selected' : ''}}>{{$variantItem->name}} (${{$variantItem->price}})</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    @endif
                                                    @endforeach
                                                    <input class="" name="qty" type="hidden" min="1" max="100" value="1" />
                                                    <button class="btn btn-cart add_cart" type="submit">add to cart</button>
                                                </form>
                                                <!-- <button class="btn btn-cart">add to cart</button> -->
                                            </div>
                                        </figure>
                                        <div class="product-content-list">
                                            <div class="manufacturer-name">
                                                <a href="{{route('product-detail', $product->slug)}}">{{limitText($product->category->name, 53)}}</a>
                                            </div>
                                            <!-- <ul class="color-categories">
                                                <li>
                                                    <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                                </li>
                                                <li>
                                                    <a class="c-darktan" href="#" title="Darktan"></a>
                                                </li>
                                                <li>
                                                    <a class="c-grey" href="#" title="Grey"></a>
                                                </li>
                                                <li>
                                                    <a class="c-brown" href="#" title="Brown"></a>
                                                </li>
                                            </ul> -->

                                            <h5 class="product-name"><a href="{{route('product-detail', $product->slug)}}">{{limitText($product->name, 53)}}</a></h5>
                                            <div class="price-box">
                                            @if(checkDiscount($product))
                                                <span class="price-regular">{{$settings->currency_icon}}{{$product->offer_price}}</span>
                                                <span class="price-old"><del>{{$settings->currency_icon}}{{$product->price}}</del></span>
                                            @else
                                                <span class="price-regular">{{$settings->currency_icon}}{{$product->price}}</span>
                                            @endif
                                            </div>
                                           {!!$product->long_description!!}
                                        </div>
                                    </div>
                                    <!-- product list item end -->
                                </div>
                            @endforeach
                            </div>
                            <!-- product item list wrapper end -->
                           
                            <!-- start pagination area -->
                            <div class="paginatoin-area text-center">
                                <ul class="pagination-box">
                                @if ($products->hasPages())
                                    {{$products->withQueryString()->links()}}
                                @endif
                                    <!-- <li><a class="previous" href="#"><i class="pe-7s-angle-left"></i></a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a class="next" href="#"><i class="pe-7s-angle-right"></i></a></li> -->
                                </ul>
                            </div>
                            <!-- end pagination area -->
                        </div>
                    </div>
                    <!-- shop main wrapper end -->
                </div>
            </div>
        </div>
        <!-- page main wrapper end -->
    <!--============================
        PRODUCT PAGE END
    ==============================-->
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $('.list-view').on('click', function(){
                let style = $(this).data('id');

                $.ajax({
                    method: 'GET',
                    url: "{{route('change-product-list-view')}}",
                    data: {style: style},
                    success: function(data){

                    }
                })
            })
        })
        @php
            if(request()->has('range') && request()->range !=  ''){
                $price = explode(';', request()->range);
                $from = $price[0];
                $to = $price[1];
            }else {
                $from = 0;
                $to = 8000;
            }
        @endphp
        jQuery(function () {
        jQuery("#slider_range").flatslider({
            min: 0, max: 10000,
            step: 100,
            values: [{{$from}}, {{$to}}],
            range: true,
            einheit: '{{$settings->currency_icon}}'
        });
    });
    </script>
@endpush
