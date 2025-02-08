@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || Cart Details
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
                                <li class="breadcrumb-item active" aria-current="page">cart</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!--============================
        CART VIEW PAGE START
    ==============================-->
    <!-- cart main wrapper start -->
    <div class="cart-main-wrapper section-padding">
            <div class="container">
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Cart Table Area -->
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="pro-thumbnail">Thumbnail</th>
                                            <th class="pro-title">Product</th>
                                            <th class="pro-price">Price</th>
                                            <th class="pro-quantity">Quantity</th>
                                            <th class="pro-subtotal">Total</th>
                                            <th class="pro-remove"><a href="#" class="fa-inverse clear_cart"><i class="fa-inverse fa fa-trash"></i> clear cart</a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartItems as $item)
                                        <tr>
                                            <td class="pro-thumbnail">
                                                <a href="#">
                                                    <img src="{{asset($item->options->image)}}" alt="product"
                                                    class="img-fluid w-100">
                                                </a>
                                            </td>
                                            <td class="pro-title">
                                                <p>{!! $item->name !!}</p>
                                                    @foreach ($item->options->variants as $key => $variant)
                                                    <span>{{$key}}: {{$variant['name']}} ({{$settings->currency_icon.$variant['price']}})</span>
                                                    @endforeach
                                            </td>
                                            <td class="pro-price">
                                                <span><h6>{{$settings->currency_icon.$item->price}}</h6></span>
                                            </td>
                                            <td class="pro-quantity">
                                            <div class="pro-qty">
                                                <input 
                                                data-skip = "true"
                                                class="product-qty" 
                                                data-rowid="{{$item->rowId}}" type="text" 
                                                min="1" 
                                                max="100" 
                                                value="{{$item->qty}}" 
                                                readonly>
                                            </div>
                                                <!-- <div class="product_qty_wrapper">
                                                    <button class="btn btn-danger product-decrement"><i class="fa fa-minus"></i></button>
                                                    <input class="product-qty" data-rowid="{{$item->rowId}}" type="text" min="1" max="100" value="{{$item->qty}}" readonly />
                                                    <button class="btn btn-success product-increment"><i class="fa fa-plus"></i></button>
                                                </div> -->
                                            </td>
                                            <td class="pro-subtotal">
                                                <span><h6 id="{{$item->rowId}}">{{$settings->currency_icon.($item->price + $item->options->variants_total) * $item->qty}}</h6></span>
                                            </td>
                                            <td class="pro-remove">
                                                <a href="{{route('cart.remove-product', $item->rowId)}}"><i class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @if (count($cartItems) === 0)
                                        <tr class="d-flex" >
                                            <td class="wsus__pro_icon" rowspan="2" style="width:100%">
                                                Cart is empty!
                                            </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <!-- Cart Update Option -->
                            <div class="cart-update-option d-block d-md-flex justify-content-between">
                                <div class="apply-coupon-wrapper">
                                    <!-- <form action="#" method="post" class=" d-block d-md-flex">
                                        <input type="text" placeholder="Enter Your Coupon Code" required />
                                        <button class="btn btn-sqr">Apply Coupon</button>
                                    </form> -->

                                    <form id="coupon_form">
                                        <input 
                                        type="text" 
                                        placeholder="Enter Your Coupon Code" name="coupon_code" 
                                        value="{{session()->has('coupon') ? session()->get('coupon')['coupon_code'] : ''}}">
                                        <button 
                                        type="submit" 
                                        class="btn btn-sqr">Apply Coupon</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 ml-auto">
                            <!-- Cart Calculation Area -->
                            <div class="cart-calculator-wrapper">
                                <div class="cart-calculate-items">
                                    <h6>Cart Totals</h6>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <td>Sub Total</td>
                                                <td><span id="sub_total">{{$settings->currency_icon}}{{getCartTotal()}}</span></td>
                                            </tr>
                                            <tr>
                                                <td>Coupan (-)</td>
                                                <td><span id="discount">{{$settings->currency_icon}}{{getCartDiscount()}}</span></td>
                                            </tr>
                                            <tr class="total">
                                                <td>Total</td>
                                                <td class="total-amount"><span id="cart_total">{{$settings->currency_icon}}{{getMainCartTotal()}}</span></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <a class="btn btn-sqr mt-4 w-100 text-center" href="{{route('user.checkout')}}">Proceed Checkout</a>
                                <a class="btn btn-sqr mt-1 w-100 text-center" href="{{route('home')}}"><i
                                class="fab fa-shopify"></i> Keep Shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart main wrapper end -->

        <!-- <section id="wsus__single_banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="wsus__single_banner_content">
                            @if ($cartpage_banner_section->banner_one->status == 1)
                            <a href="{{$cartpage_banner_section->banner_one->banner_url}}">
                                <img class="img-gluid" src="{{asset($cartpage_banner_section->banner_one->banner_image)}}" alt="">
                            </a>
                            @endif
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="wsus__single_banner_content single_banner_2">
                            @if ($cartpage_banner_section->banner_two->status == 1)
                            <a href="{{$cartpage_banner_section->banner_two->banner_url}}">
                                <img class="img-gluid" src="{{asset($cartpage_banner_section->banner_two->banner_image)}}" alt="">
                            </a>
                            @endif
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
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // incriment product quantity
        $(document).on('click','.product-increment',function () {
            let input = $(this).siblings('.product-qty');
            let quantity = parseInt(input.val()) + 1;
            let rowId = input.data('rowid');
            input.val(quantity);

            $.ajax({
                url: "{{route('cart.update-quantity')}}",
                method: 'POST',
                data: {
                    rowId: rowId,
                    quantity: quantity
                },
                success: function(data){
                    if(data.status === 'success'){
                        let productId = '#'+rowId;
                        let totalAmount = "{{$settings->currency_icon}}"+data.product_total
                        $(productId).text(totalAmount)

                        renderCartSubTotal()
                        calculateCouponDescount()
                        toastr.remove();
                        toastr.success(data.message)
                    }else if (data.status === 'error'){
                        toastr.remove();
                        toastr.error(data.message)
                    }
                },
                error: function(data){

                }
            })
        })
        // decrement product quantity
        $(document).on('click','.product-decrement',function () {
            let input = $(this).siblings('.product-qty');
            let quantity = parseInt(input.val()) - 1;
            let rowId = input.data('rowid');

            if(quantity < 1){
                quantity = 1;
            }

            input.val(quantity);

            $.ajax({
                url: "{{route('cart.update-quantity')}}",
                method: 'POST',
                data: {
                    rowId: rowId,
                    quantity: quantity
                },
                success: function(data){
                    if(data.status === 'success'){
                        let productId = '#'+rowId;
                        let totalAmount = "{{$settings->currency_icon}}"+data.product_total
                        $(productId).text(totalAmount)

                        renderCartSubTotal()
                        calculateCouponDescount()
                        toastr.remove();
                        toastr.success(data.message)
                    }else if (data.status === 'error'){
                        toastr.remove();
                        toastr.error(data.message)
                    }
                },
                error: function(data){

                }
            })

        })

        // clear cart
        $('.clear_cart').on('click', function(e){
            e.preventDefault();
            Swal.fire({
                    title: 'Are you sure?',
                    text: "This action will clear your cart!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, clear it!'
                    }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: 'get',
                            url: "{{route('clear.cart')}}",
                            success: function(data){
                                if(data.status === 'success'){
                                    window.location.reload();
                                }
                            },
                            error: function(xhr, status, error){
                                console.log(error);
                            }
                        })
                    }
                })
        })

        // get subtotal of cart and put it on dom
        function renderCartSubTotal(){
            $.ajax({
                method: 'GET',
                url: "{{ route('cart.sidebar-product-total') }}",
                success: function(data) {
                    $('#sub_total').text("{{$settings->currency_icon}}"+data);
                },
                error: function(data) {
                    console.log(data);
                }
            })
        }

        // applay coupon on cart

        $('#coupon_form').on('submit', function(e){
            e.preventDefault();
            let formData = $(this).serialize();
            $.ajax({
                method: 'GET',
                url: "{{ route('apply-coupon') }}",
                data: formData,
                success: function(data) {
                   if(data.status === 'error'){
                    toastr.remove();
                    toastr.error(data.message)
                   }else if (data.status === 'success'){
                    calculateCouponDescount()
                    toastr.remove();
                    toastr.success(data.message)
                   }
                },
                error: function(data) {
                    console.log(data);
                }
            })

        })

        // calculate discount amount
        function calculateCouponDescount(){
            $.ajax({
                method: 'GET',
                url: "{{ route('coupon-calculation') }}",
                success: function(data) {
                    if(data.status === 'success'){
                        $('#discount').text('{{$settings->currency_icon}}'+data.discount);
                        $('#cart_total').text('{{$settings->currency_icon}}'+data.cart_total);
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            })
        }


    })
</script>
@endpush
