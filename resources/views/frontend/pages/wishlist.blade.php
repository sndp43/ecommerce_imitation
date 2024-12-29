@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || Wishlist
@endsection

@section('content')
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">wishlist</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- wishlist main wrapper start -->
    <div class="wishlist-main-wrapper section-padding">
            <div class="container">
                <!-- Wishlist Page Content Start -->
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Wishlist Table Area -->
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="pro-thumbnail">Thumbnail</th>
                                            <th class="pro-title">Product</th>
                                            <th class="pro-price">Price</th>
                                            <th class="pro-quantity">Stock Status</th>
                                            <th class="pro-subtotal">Add to Cart</th>
                                            <th class="pro-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($wishlistProducts as $item)
                                        <tr id="{{$item->id}}">
                                            <td class="pro-thumbnail">
                                                <a href="{{route('product-detail', $item->product->slug)}}">
                                                    <img class="img-fluid" src="{{asset($item->product->thumb_image)}}" alt="Product" />
                                                </a>
                                            </td>
                                            <td class="pro-title">
                                                <a href="{{route('product-detail', $item->product->slug)}}">{{$item->product->name}}</a>
                                            </td>
                                            <td class="pro-price">
                                                <span>
                                                    {{$settings->currency_icon}}{{$item->product->price}}
                                                </span>
                                            </td>
                                            <td class="pro-quantity">{{$item->product->qty}}<span class="text-success"> In Stock</span></td>
                                            <td class="pro-subtotal">
                                            <form 
                                            data-from='wishlist'
                                            data-wishlist='{{$item->id}}'
                                            class="shopping-cart-form">
                                                <input min="1" max="100" name="qty" type="hidden" value="1">
                                                <input type="hidden" name="product_id" value="{{$item->product->id}}">
                                                <div class="action_link">
                                                    <button 
                                                    type="submit" class="btn btn-cart2 add_cart" href="#">Add to cart</button>
                                                </div>   
                                            </form>
                                            </td>
                                            <td class="pro-remove"><a href="{{route('user.wishlist.destory', $item->id)}}"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Wishlist Page Content End -->
            </div>
        </div>
        <!-- wishlist main wrapper end -->



    <!--============================
        CART VIEW PAGE START
    ==============================-->
    <!-- <section id="wsus__cart_view">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wsus__cart_list wishlist">
                        <div class="table-responsive">
                            <table>
                                <tbody>
                                    <tr class="d-flex">
                                        <th class="wsus__pro_img">
                                            product item
                                        </th>

                                        <th class="wsus__pro_name" style="width:500px">
                                            product details
                                        </th>

                                        <th class="wsus__pro_status">
                                            quantity
                                        </th>

                                        <th class="wsus__pro_tk" style="width:238px" >
                                            price
                                        </th>

                                        <th class="wsus__pro_icon">
                                            action
                                        </th>
                                    </tr>
                                    @foreach ($wishlistProducts as $item)

                                    <tr class="d-flex">
                                        <td class="wsus__pro_img"><img src="{{asset($item->product->thumb_image)}}" alt="product"
                                                class="img-fluid w-100">
                                            <a href="{{route('user.wishlist.destory', $item->id)}}"><i class="far fa-times"></i></a>
                                        </td>

                                        <td class="wsus__pro_name" style="width:500px">
                                            <p>{{$item->product->name}}</p>
                                        </td>

                                        <td class="wsus__pro_status">
                                            <p>{{$item->product->qty}}</p>
                                        </td>

                                        <td class="wsus__pro_tk" style="width:238px">
                                            <h6>
                                                {{$settings->currency_icon}}{{$item->product->price}}
                                            </h6>
                                        </td>

                                        <td class="">
                                            <a class="common_btn" href="{{route('product-detail', $item->product->slug)}}">View Product</a>
                                        </td>
                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!--============================
        CART VIEW PAGE END
    ==============================-->
@endsection

@push('scripts')

@endpush
