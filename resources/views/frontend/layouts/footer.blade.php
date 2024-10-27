    <!-- footer area start -->
@php
    $footerInfo = Cache::rememberForever('footer_info', function(){
        return \App\Models\FooterInfo::first();
    });
    $footerSocials = Cache::rememberForever('footer_socials', function(){
        return \App\Models\FooterSocial::where('status', 1)->get();
    });
    $footerGridTwoLinks = Cache::rememberForever('footer_grid_two', function(){
        return \App\Models\FooterGridTwo::where('status', 1)->get();
    });
    $footerTitle = \App\Models\FooterTitle::first();
    $footerGridThreeLinks =Cache::rememberForever('footer_grid_three', function(){
        return \App\Models\FooterGridThree::where('status', 1)->get();
    });
@endphp
    <footer class="footer-widget-area">
        <div class="footer-top section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-item">
                            <div class="widget-title">
                                <div class="widget-logo">
                                    <a href="{{url('/')}}">
                                        <img src="{{asset(@$footerInfo->logo)}}" alt="brand logo">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-item">
                            <h6 class="widget-title">Contact Us</h6>
                            <div class="widget-body">
                                <address class="contact-block">
                                    <ul>
                                        <li><i class="pe-7s-home"></i> {{@$footerInfo->address}}</li>
                                        <li><i class="pe-7s-mail"></i> <a href="mailto:{{@$footerInfo->email}}">{{@$footerInfo->email}}
                                        <li><i class="pe-7s-call"></i> <a href="callto:{{@$footerInfo->phone}}">{{@$footerInfo->phone}}</a></li>
                                    </ul>
                                </address>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-item">
                            <h6 class="widget-title">Information</h6>
                            <div class="widget-body">
                                <ul class="info-list">
                                    @foreach ($footerGridThreeLinks as $link)
                                    <li><a  href="{{$link->url}}">{{$link->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-item">
                            <h6 class="widget-title">Follow Us</h6>
                            <div class="widget-body social-link">
                                @foreach ($footerSocials as $link)
                                <a href="{{$link->url}}"><i class="{{str_replace('in-in','in',str_replace('k-f','k',str_replace('fab','fa',$link->icon)))}}"></i></a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mt-20">
                    <div class="col-md-6">
                        <div class="newsletter-wrapper">
                            <h6 class="widget-title-text">Signup for newsletter</h6>
                            <form class="newsletter-inner" action="" method="POST" id="newsletter">
                                @csrf
                                <input type="text" class="news-field newsletter_email" autocomplete="off" placeholder="Enter your email address">
                                <button type="submit" class="news-btn subscribe_btn" id="mc-submit">Subscribe</button>
                            </form>
                            <!-- mail-chimp-alerts Start -->
                            <div class="mailchimp-alerts">
                                <div class="mailchimp-submitting"></div><!-- mail-chimp-submitting end -->
                                <div class="mailchimp-success"></div><!-- mail-chimp-success end -->
                                <div class="mailchimp-error"></div><!-- mail-chimp-error end -->
                            </div>
                            <!-- mail-chimp-alerts end -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-payment">
                            <img src="{{asset('frontend/img/payment.png')}}" alt="payment method">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="copyright-text text-center">
                            <p>{{@$footerInfo->copyright}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->