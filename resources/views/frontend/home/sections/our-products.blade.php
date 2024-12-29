        <!-- product area start -->
        {{-- hot-deals --}}
        <section class="product-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">our products</h2>
                            <p class="sub-title">Add our products to weekly lineup</p>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-container">
                            <!-- product tab menu start -->
                            <div class="product-tab-menu">
                                <ul class="nav justify-content-center">
                                    <li><a href="#tab1" class="active" data-bs-toggle="tab">New Arrival</a></li>
                                    <li><a href="#tab2" data-bs-toggle="tab">Featured</a></li>
                                    <li><a href="#tab3" data-bs-toggle="tab">Top Product</a></li>
                                    <li><a href="#tab4" data-bs-toggle="tab">Best Product</a></li>
                                </ul>
                            </div>
                            <!-- product tab menu end -->

                            <!-- product tab content start -->
                            <div class="tab-content">
                                @foreach ($typeBaseProducts as $key => $products)
                                    <div class="tab-pane fade {{ $loop->index === 0 ? 'show active' : '' }}"  id="tab{{$loop->index + 1}}">
                                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                        <!-- product item start -->
                                        @foreach ($products as $product)
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="{{route('product-detail', $product->slug)}}">
                                                    <img class="pri-img" src="{{asset($product->thumb_image)}}" alt="product">
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
                                                        <span>
                                                            <span class="wsus__minus">-{{calculateDiscountPercent($product->price, $product->offer_price)}}%</span>
                                                       </span>
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="button-group">
                                                    <!-- <a href="" 
                                                    data-id="{{$product->id}}"
                                                    data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="add_to_wishlist pe-7s-like"></i></a> -->

                                                    <a  
                                                    data-bs-toggle="tooltip"
                                                    title="Add to Wishlist" 
                                                    href="#"
                                                    class="add_to_wishlist" 
                                                    data-id="{{$product->id}}">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                    <a href="#" 
                                                        data-bs-toggle="modal"  
                                                        data-bs-target="#quick_view" 
                                                        class="show_product_modal" 
                                                        data-id="{{ $product->id }}"
                                                        data-bs-toggle="tooltip" 
                                                        data-bs-placement="left" 
                                                        title="Quick View">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <!-- {{-- <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a> --}} -->
                                                    <!-- <a href="#" 
                                                    data-id="{{ $product->id }}"
                                                    data-bs-toggle="modal" data-bs-target="#quick_view"
                                                    class="show_product_modal"
                                                    >
                                                    <span 
                                                    data-bs-toggle="tooltip" data-bs-placement="left"
                                                    title="Quick View"
                                                    >
                                                        <i class="pe-7s-search">
                                                        </i>
                                                    </span>
                                                    </a> -->
                                                </div>
                                                <div class="cart-hover">
                                                    <form class="shopping-cart-form">
                                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                                    <input class="" name="qty" type="hidden" min="1" max="100" value="1">
                                                    <button class="btn btn-cart add_cart" type="submit">add to cart</button>
                                                    </form>
                                                    <!-- <button class="btn btn-cart add_cart">add to cart 1</button> -->
                                                </div>
                                            </figure>
                                            <div class="product-caption text-center">
                                                <div class="product-identity">
                                                    <p class="manufacturer-name"><a href="#">{{$product->category->name}}</a></p>
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
                                                    <a href="{{route('product-detail', $product->slug)}}">{{limitText($product->name, 52)}}</a>
                                                </h6>
                                                <div class="price-box">
                                                @if(checkDiscount($product))
                                                    <span class="price-regular">{{$settings->currency_icon}}{{$product->offer_price}} <del>{{$settings->currency_icon}}{{$product->price}}</del></span>
                                                @else
                                                    <span class="price-old">{{$settings->currency_icon}}{{$product->price}}</span>
                                                @endif
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <!-- product item end -->
                                    </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- product tab content end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- product area end -->
        