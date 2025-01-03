<!-- product details inner end -->
<div class="row">
    <div class="col-lg-5">
        <div class="product-large-slider">
            <div class="pro-large-img img-zoom">
                @if ($product->video_link)
                    <a class="venobox wsus__pro_det_video" data-autoplay="true" data-vbtype="video"
                    href="{{$product->video_link}}">
                    <i class="fas fa-play"></i>
                </a>
                @endif
            </div>   
            <div class="pro-large-img img-zoom">
                <img src="{{asset($product->thumb_image)}}" alt="product-details')}}" />
            </div>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="product-details-des">
            <div class="manufacturer-name">
                <a href="#">{{$product->brand->name}}</a>
            </div>
            <h3 class="product-name">{{limitText($product->name, 150)}}</h3>
            <div class="ratings d-flex">
                @php
                    $avgRating = $product->reviews()->avg('rating');
                    $fullRating = round($avgRating);
                @endphp

                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $fullRating)
                    <i class="fas fa-star"></i>
                    <span><i class="fa fa-star"></i></span>
                    @else
                    <span><i class="fa fa-star-o"></i></span>
                    @endif
                @endfor
                <div class="pro-review">
                    <span>{{count($product->reviews)}} Reviews</span>
                </div>
            </div>
            <div class="price-box">
                @if (checkDiscount($product))
                    <span class="price-regular">{{$settings->currency_icon}}{{$product->offer_price}}</span>
                    <span class="price-old"><del>{{$settings->currency_icon}}{{$product->price}}</del></span>
                @else
                    <span class="price-regular">{{$settings->currency_icon}}{{$product->price}}</span>
                @endif
            </div>
            <!-- <h5 class="offer-text"><strong>Hurry up</strong>! offer ends in:</h5>
            <div class="product-countdown" data-countdown="{{ \Carbon\Carbon::parse($product->offer_end_date)->format('Y/m/d') }}"></div> -->
            <div class="availability">
                <i class="fa fa-check-circle"></i>
                @if ($product->qty > 0)
                        <span class="in_stock">in stock</span> ({{$product->qty}} item)
                @elseif ($product->qty === 0)
                        <span class="in_stock">stock out</span> ({{$product->qty}} item)
                @endif
            </div>
            <p class="pro-desc">{!! $product->short_description !!}</p>
            <form class="shopping-cart-form">
                <div class="quantity-cart-box d-flex align-items-center">
                    <h6 class="option-title">qty:</h6>
                    <div class="quantity">
                        <div class="pro-qty"><span class="dec qtybtn">-</span>
                            <input class="number_area" name="qty" type="text" min="1" max="100" value="1" />
                            <span class="inc qtybtn">+</span>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-cart2 add_cart" href="#">add to cart</button>
                </div>
                <input type="hidden" name="product_id" value="{{$product->id}}">
                @foreach ($product->variants as $variant)
                    <div class="pro-size">
                        @if ($variant->status != 0)
                            <div class="col-xl-6 col-sm-6">
                                <h5 class="mb-2">{{$variant->name}}: </h5>
                                <select class="nice-select select_2" name="variants_items[]">
                                    @foreach ($variant->productVariantItems as $variantItem)
                                        @if ($variantItem->status != 0)
                                            <option value="{{$variantItem->id}}" {{$variantItem->is_default == 1 ? 'selected' : ''}}>{{$variantItem->name}} ({{$settings->currency_icon}}{{$variantItem->price}})</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </div>
                @endforeach
            </form>
            <div class="useful-links">
                <a  
                data-bs-toggle="tooltip"
                title="Add to wishlist" 
                href="#"
                class="add_to_wishlist" 
                data-id="{{$product->id}}">
                    <i class="pe-7s-like"></i>wishlist
                </a>
            </div>
            <div class="like-icon">
                <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
            </div>
        </div>
    </div>
</div>
<!-- product details inner end -->