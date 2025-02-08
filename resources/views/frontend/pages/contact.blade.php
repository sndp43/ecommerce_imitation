@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || About
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
                                    <li class="breadcrumb-item"><a href="/"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">contact us</li>
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
        <!-- google map start -->
        <div class="map-area section-padding">
            {{-- <div id="google-map"></div> --}}
            <iframe
                                src="{{$settings->map}}"
                                width="1600" height="450" style="border:0;" allowfullscreen="100"
                                loading="lazy"></iframe>
        </div>
        <!-- google map end -->

    <!--============================
        CONTACT PAGE START
    ==============================-->
    {{-- <section id="wsus__contact">
        <div class="container">
            <div class="wsus__contact_area">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="row">
                            @if ($settings->contact_email)

                            <div class="col-xl-12">
                                <div class="wsus__contact_single">
                                    <i class="fal fa-envelope"></i>
                                    <h5>mail address</h5>
                                    <a href="mailto:example@gmail.com">{{@$settings->contact_email}}</a>
                                    <span><i class="fal fa-envelope"></i></span>
                                </div>
                            </div>
                            @endif
                            @if ($settings->contact_phone)
                            <div class="col-xl-12">
                                <div class="wsus__contact_single">
                                    <i class="far fa-phone-alt"></i>
                                    <h5>phone number</h5>
                                    <a href="macallto:{{@$settings->contact_phone}}">{{@$settings->contact_phone}}</a>
                                    <span><i class="far fa-phone-alt"></i></span>
                                </div>
                            </div>
                            @endif
                            @if ($settings->contact_address)

                            <div class="col-xl-12">
                                <div class="wsus__contact_single">
                                    <i class="fal fa-map-marker-alt"></i>
                                    <h5>contact address</h5>
                                    <a href="javascript:;">{{@$settings->contact_address}}</a>
                                    <span><i class="fal fa-map-marker-alt"></i></span>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="wsus__contact_question">
                            <h5>Send Us a Message</h5>
                            <form id="contact-form">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="wsus__con_form_single">
                                            <input type="text" placeholder="Your Name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="wsus__con_form_single">
                                            <input type="email" placeholder="Email" name="email">
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="wsus__con_form_single">
                                            <input type="text" placeholder="Subject" name="subject">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="wsus__con_form_single">
                                            <textarea cols="3" rows="5" placeholder="Message" name="message"></textarea>
                                        </div>
                                        <button type="submit" class="common_btn" id="form-submit">send now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="wsus__con_map">
                            <iframe
                                src="{{$settings->map}}"
                                width="1600" height="450" style="border:0;" allowfullscreen="100"
                                loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}




            <!-- contact area start -->
            <div class="contact-area section-padding pt-0">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="contact-message">
                                <h4 class="contact-title">Tell Us Your Project</h4>
                                <form id="contact-form" action="" method="post" class="contact-form">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <input name="name" placeholder="Name *" type="text" required>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <input name="email" placeholder="Email *" type="text" required>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <input name="subject" placeholder="Subject *" type="text">
                                        </div>
                                        <div class="col-12">
                                            <div class="contact2-textarea text-center">
                                                <textarea placeholder="Message *" name="message" class="form-control2" required=""></textarea>
                                            </div>
                                            <div class="contact-btn">
                                                <button type="submit" class="btn btn-sqr" id="form-submit">send now</button>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-center">
                                            <p class="form-messege"></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-info">
                                <h4 class="contact-title">Contact Us</h4>
                                <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum
                                    est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum
                                    formas human.</p>
                                <ul>
                                    <li><i class="fa fa-fax"></i> Address : {{@$settings->contact_address}}</li>
                                    <li><i class="fa fa-phone"></i> E-mail: {{@$settings->contact_email}}</li>
                                    <li><i class="fa fa-envelope-o"></i> {{@$settings->contact_phone}}</li>
                                </ul>
                                <div class="working-time">
                                    <h6>Working Hours</h6>
                                    <p><span>Monday – Saturday:</span>08AM – 22PM</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- contact area end -->


    <!--============================
        CONTACT PAGE END
    ==============================-->
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $('#contact-form').on('submit', function(e){
                e.preventDefault();
                let data = $(this).serialize();
                $.ajax({
                    method: 'POST',
                    url: "{{route('handle-contact-form')}}",
                    data: data,
                    beforeSend: function(){
                        $('#form-submit').text('sending..');
                        $('#form-submit').attr('disabled', true);
                    },
                    success: function(data){
                        if(data.status == 'success'){
                            toastr.remove();
                            toastr.success(data.message);
                            $('#contact-form')[0].reset();
                            $('#form-submit').text('send now')
                            $('#form-submit').attr('disabled', false);
                        }
                    },
                    error: function(data){
                        let errors = data.responseJSON.errors;

                        $.each(errors, function(key, value){
                            toastr.error(value);
                        })

                        $('#form-submit').text('send now');
                        $('#form-submit').attr('disabled', false);
                    }
                })
            })
        })
    </script>
@endpush
