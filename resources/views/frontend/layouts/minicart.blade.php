 <!-- offcanvas mini cart start -->
 <div class="offcanvas-minicart-wrapper">
    <div class="minicart-inner">
        <div class="offcanvas-overlay"></div>
        <div class="minicart-inner-content">
            <div class="minicart-close">
                <i class="pe-7s-close"></i>
            </div>
            <div class="minicart-content-box">
                <div class="minicart-item-wrapper">
                    <ul class="">
                        @foreach (Cart::content() as $sidebarProduct)
                        <li class="minicart-item" id="mini_cart_{{$sidebarProduct->rowId}}">
                            <div class="minicart-thumb">
                                <a href="{{route('product-detail', $sidebarProduct->options->slug)}}">
                                    <img src="{{asset($sidebarProduct->options->image)}}" alt="product">
                                </a>
                            </div>
                            <div class="minicart-content">
                                <h3 class="product-name">
                                    <a href="{{route('product-detail', $sidebarProduct->options->slug)}}">{{$sidebarProduct->name}}</a>
                                </h3>
                                <p>
                                    <span class="cart-quantity">{{$sidebarProduct->qty}}<strong>&times;</strong>
                                    </span>
                                <span>{{$settings->currency_icon}}{{$sidebarProduct->price}}</span>
                                <div>
                                    <small>Variants total: {{ $settings->currency_icon }} {{$sidebarProduct->options->variants_total}}</small>
                                </div>
                                <div>
                                    <!-- <a  
                                        data-bs-toggle="tooltip"
                                        title="Remove from the cart and move to wishlist" 
                                        href="#"
                                        class="move_to_wishlist" 
                                        data-id="{{$sidebarProduct->id}}">
                                        <i class="pe-7s-like"></i>
                                    </a> -->
                                </div>

                                    <!-- <span class="cart-quantity">{{$sidebarProduct->qty}}<strong>&times;</strong></span>
                                    <span class="cart-price"> {{$settings->currency_icon}}{{$sidebarProduct->price}}</span> -->
                                </p>
                            </div>
                            <button class="minicart-remove remove_sidebar_product" data-id="{{$sidebarProduct->rowId}}"><i class="pe-7s-close"></i></button>
                        </li>
                        @endforeach
                        @if (Cart::content()->count() === 0)
                        <li class="text-center">Oops, nothing here yet!</li>
                        @endif
                    </ul>
                </div>

                <div class="mini_cart_actions minicart-pricing-box {{Cart::content()->count() === 0 ? 'd-none': ''}}">
                    <ul>
                        <li>
                            <span>sub-total</span>
                            <span><strong id="mini_cart_subtotal">{{$settings->currency_icon}}{{getCartTotal()}}</strong></span>
                        </li>
                        {{-- <li>
                            <span>Eco Tax (-2.00)</span>
                            <span><strong>$10.00</strong></span>
                        </li>
                        <li>
                            <span>VAT (20%)</span>
                            <span><strong>$60.00</strong></span>
                        </li>
                        <li class="total">
                            <span>total</span>
                            <span><strong>$370.00</strong></span>
                        </li> --}}
                    </ul>
                </div>

                <div class="mini_cart_actions minicart-button {{Cart::content()->count() === 0 ? 'd-none': ''}}">
                    <a href="{{route('cart-details')}}"><i class="fa fa-shopping-cart"></i> View Cart</a>
                    <a href="{{route('user.checkout')}}"><i class="fa fa-share"></i> Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- offcanvas mini cart end -->