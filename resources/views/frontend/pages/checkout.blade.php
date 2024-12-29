@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || Checkout
@endsection

@section('content')

    <!--============================
        BREADCRUMB START
    ==============================-->
    <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="javascript:;">checkout</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--============================
        BREADCRUMB END
    ==============================-->


    <!--============================
        CHECK OUT PAGE START
    ==============================-->


    <!-- checkout main wrapper start -->
    <div class="checkout-page-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <!-- Checkout Billing Details -->
                    <div class="col-lg-6">
                        <div class="checkout-billing-details-wrap">
                            <h5 class="checkout-title">Billing Details</h5>
                            <div class="billing-form-wrap">
                            <div class="row mb-4">
                                <div class="single-input-item">
                                    <a href="javascript:;" style="margin-left:auto;" class="btn btn-sqr" data-bs-toggle="modal" data-bs-target="#exampleModal">Add new address</a>
                                </div>
                            </div>
                            <div class="row">
                                @foreach ($addresses as $i => $address)
                                <div class="col-xl-6 mb-4">
                                    <div class="wsus__checkout_single_address">
                                        <div class="form-check custom-control custom-radio mb-2">
                                            <input 
                                            class="form-check-input shipping_address custom-control-input" 
                                            data-id="{{$address->id}}" 
                                            type="radio" 
                                            name="flexRadioDefault"
                                            id="flexRadioDefault{{$i}}">
                                            <label 
                                            class="form-check-label custom-control-label" for="flexRadioDefault{{$i}}"><strong>Select shipping address</strong>
                                            </label>
                                        </div>
                                        <ul>
                                            <li><strong>Name :</strong> {{$address->name}}</li>
                                            <li><strong>Phone :</strong> {{$address->phone}}</li>
                                            <li><strong>Email :</strong> {{$address->email}}</li>
                                            <li><strong>Country :</strong> {{$address->country}}</li>
                                            <li><strong>City :</strong> {{$address->city}}</li>
                                            <li><strong>Zip Code :</strong> {{$address->zip}}</li>
                                            <li><strong>Address :</strong> {{$address->address}}</li>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary Details -->
                    <div class="col-lg-6">
                        <div class="order-summary-details">
                            <h5 class="checkout-title">Your Order Summary</h5>
                            <div class="order-summary-content">
                                <!-- Order Summary Table -->
                                <div class="order-summary-table table-responsive text-center">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>Sub Total</td>
                                                <td><strong>{{$settings->currency_icon}}{{getCartTotal()}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Shipping method (+):
                                                    <br><i>please select one shipping method</i>
                                                </td>
                                                <td class="justify-content-center">
                                                    <ul class="shipping-type">
                                                        @foreach ($shippingMethods as $i => $method)
                                                            @if ($method->type === 'min_cost' && getCartTotal() >= $method->min_cost)
                                                            <li class="single-payment-method mb-3">
                                                                <div class="payment-method-name custom-control custom-radio">
                                                                    <input 
                                                                    value="{{$method->id}}"
                                                                    data-id="{{$method->cost}}"
                                                                    type="radio" 
                                                                    id="freeshipping{{$i}}" 
                                                                    name="shipping" 
                                                                    class="custom-control-input shipping_method" />
                                                                    <label 
                                                                    class="custom-control-label" 
                                                                    for="freeshipping{{$i}}">{{$method->name}}
                                                                    <span>cost: ({{$settings->currency_icon}}{{$method->cost}})</span></label>
                                                                </div>
                                                            </li>
                                                            @elseif ($method->type === 'flat_cost')
                                                            <li class="single-payment-method mb-3">
                                                                <div class="payment-method-name custom-control custom-radio">
                                                                    <input 
                                                                    value="{{$method->id}}"
                                                                    data-id="{{$method->cost}}"
                                                                    type="radio" 
                                                                    id="flatrate{{$i}}" 
                                                                    name="shipping" 
                                                                    class="custom-control-input shipping_method" 
                                                                    checked />
                                                                    <label 
                                                                    class="custom-control-label" 
                                                                    for="flatrate{{$i}}"> {{$method->name}}
                                                                    <span>cost: ({{$settings->currency_icon}}{{$method->cost}})</label>
                                                                </div>
                                                            </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Coupan (-):</td>
                                                <td><strong>{{$settings->currency_icon}}{{getCartDiscount()}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Total Amount</td>
                                                <td><strong id="total_amount" data-id="{{getMainCartTotal()}}">{{$settings->currency_icon}}{{getMainCartTotal()}}</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="terms_area mt-4 mb-4">
                                <div class="form-check">
                                    <input class="form-check-input agree_term" type="checkbox" value="" id="flexCheckChecked3"
                                        checked>
                                    <label class="form-check-label " for="flexCheckChecked3">
                                        I have read and agree to the website <a href="{{ route('terms-and-conditions') }}">terms and conditions *</a>
                                    </label>
                                </div>
                        </div>
                        <form action="" id="checkOutForm">
                                <input type="hidden" name="shipping_method_id" value="" id="shipping_method_id">
                                <input type="hidden" name="shipping_address_id" value="" id="shipping_address_id">

                        </form>
                        <a href="" id="submitCheckoutForm" class="btn btn-sqr">Place Order</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- checkout main wrapper end -->
    <!-- Address Modal start -->

    <div class="modal" id="exampleModal">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-2 ms-2" id="exampleModalLabel">Add new address</h5>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- address inner -->
                    <form action="{{route('user.checkout.address.create')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="single-input-item">
                                <input 
                                required
                                type="text" 
                                placeholder="Name *" 
                                name="name" 
                                value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-input-item">
                                <input 
                                required
                                type="text" 
                                placeholder="Phone *" 
                                name="phone" 
                                value="{{old('phone')}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-input-item">
                                <input 
                                required
                                type="email" 
                                placeholder="Email *" 
                                name="email" 
                                value="{{old('email')}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="single-input-item">
                                <select 
                                required 
                                class="select_2"
                                name="country">
                                    <!-- <option value="">Country / Region *</option>
                                    @foreach (config('settings.country_list') as $key => $county)
                                        <option {{$county === old('country') ? 'selected' : ''}} value="{{$county}}">{{$county}}</option>
                                    @endforeach -->
                                    <option value="India">India</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-input-item">
                                <input 
                                required
                                type="text" 
                                placeholder="State *" 
                                name="state" 
                                value="{{old('state')}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-input-item">
                                <input 
                                required
                                type="text" 
                                placeholder="Town / City *" 
                                name="city" 
                                value="{{old('city')}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="single-input-item">
                                <input 
                                required
                                type="text" 
                                placeholder="Zip *" 
                                name="zip" 
                                value="{{old('zip')}}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="single-input-item">
                                <input 
                                required
                                type="text" 
                                placeholder="Address *" 
                                name="address" 
                                value="{{old('address')}}">
                            </div>
                        </div>

                        <div class="col-xl-12">
                            <div class="single-input-item">
                                <button 
                                type="submit" 
                                class="btn btn-sqr">Add Address</button>
                            </div>
                        </div>
                        </div>       
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Address Modal end -->

    <!-- <div class="">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add new address</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="wsus__check_form p-3">
                            <form action="{{route('user.checkout.address.create')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="single-input-item">
                                            <input type="text" placeholder="Name *" name="name" value="{{old('name')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-input-item">
                                            <input type="text" placeholder="Phone *" name="phone" value="{{old('phone')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-input-item">
                                            <input type="email" placeholder="Email *" name="email" value="{{old('email')}}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="single-input-item">
                                            <select class="select_2" name="country">
                                                <option value="">Country / Region *</option>
                                                @foreach (config('settings.country_list') as $key => $county)
                                                    <option {{$county === old('country') ? 'selected' : ''}} value="{{$county}}">{{$county}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-input-item">
                                            <input type="text" placeholder="State *" name="state" value="{{old('state')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-input-item">
                                            <input type="text" placeholder="Town / City *" name="city" value="{{old('city')}}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="single-input-item">
                                            <input type="text" placeholder="Zip *" name="zip" value="{{old('zip')}}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Address *" name="address" value="{{old('address')}}">
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="wsus__check_single_form">
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!--============================
        CHECK OUT PAGE END
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

        $('input[type="radio"]').prop('checked', false);
        $('#shipping_method_id').val("");
        $('#shipping_address_id').val("");

        $('.shipping_method').on('click', function(){
            let shippingFee = $(this).data('id');
            let currentTotalAmount = $('#total_amount').data('id')
            let totalAmount = currentTotalAmount + shippingFee;

            $('#shipping_method_id').val($(this).val());
            $('#shipping_fee').text("{{$settings->currency_icon}}"+shippingFee);

            $('#total_amount').text("{{$settings->currency_icon}}"+totalAmount)
        })

        $('.shipping_address').on('click', function(){
            $('#shipping_address_id').val($(this).data('id'));
        })

        // submit checkout form
        $('#submitCheckoutForm').on('click', function(e){
            e.preventDefault();
            if($('#shipping_method_id').val() == ""){
                toastr.error('Shipping method is requred');
            }else if ($('#shipping_address_id').val() == ""){
                toastr.error('Shipping address is requred');
            }else if (!$('.agree_term').prop('checked')){
                toastr.error('You have to agree website terms and conditions');
            }else {
                $.ajax({
                    url: "{{route('user.checkout.form-submit')}}",
                    method: 'POST',
                    data: $('#checkOutForm').serialize(),
                    beforeSend: function(){
                        $('#submitCheckoutForm').html('<i class="fa fa-spinner fa-spin fa-1x"></i>')
                    },
                    success: function(data){
                        if(data.status === 'success'){
                            $('#submitCheckoutForm').text('Place Order')
                            // redirect user to next page
                            window.location.href = data.redirect_url;
                        }
                    },
                    error: function(data){
                        console.log(data);
                    }
                })
            }



        })
    })
</script>
@endpush
