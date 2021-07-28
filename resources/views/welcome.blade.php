<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title> {{env('APP_NAME')}} - Internet Services</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/favicon.ico">
    <!-- Bootstrap -->
    <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- tobii css -->
    <link href="{{asset('front/css/tobii.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons -->
    <link href="{{asset('css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
    <!-- Main Css -->
    <link href="{{asset('front/css/style.css')}}" rel="stylesheet" type="text/css" id="theme-opt" />
    <link href="{{asset('front/css/colors/default.css')}}" rel="stylesheet" id="color-opt">

</head>

<body>
<!-- Loader -->
<!-- <div id="preloader">
    <div id="status">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
</div> -->
<!-- Loader -->

<!-- Navbar STart -->
<header id="topnav" class="defaultscroll sticky" style="background-color: white !important;">
    <div class="container">
        <!-- Logo container-->
        <a class="logo" href="{{ url('/') }}">
{{--            <div class="title m-b-md" style="height: 24px;">--}}
{{--                {{env('APP_NAME')}}--}}
{{--            </div>--}}
{{--            <img src="images/logo-dark.png" height="24" class="logo-light-mode" alt="">--}}
{{--            <img src="images/logo-light.png" height="24" class="logo-dark-mode" alt="">--}}
        </a>
        <div class="buy-button">
            @if (Route::has('login'))
                <div class="">
                    @auth
                        @hasrole('customer')
                        <a href="{{ url('/home') }}" class="btn btn-primary-outline">Dashboard</a>
                        @endhasrole
                        @hasrole('admin')
                        <a href="{{ url('/admin') }}" class="btn btn-primary-outline">Dashboard</a>
                        @endhasrole

                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary-outline">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary-outline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div><!--end login button-->
        <!-- End Logo container-->
        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">
                <li><a href="{{ url('/') }}" class="sub-menu-item text-sm-right">Home</a></li>
                <li><a href="{{ url('/') }}" class="sub-menu-item text-sm-right">Service</a></li>
                <li><a href="{{ url('/') }}" class="sub-menu-item text-sm-right">FAQ</a></li>
                <li><a href="{{ url('/') }}" class="sub-menu-item text-sm-right">Coverage</a></li>
            </ul>
            <div class="buy-menu-btn d-none">
                @if (Route::has('login'))
                    <div class="">
                        @auth

                            <a href="{{ url('/home') }}" class="btn btn-primary">Dashboard</a>

                        @else

                            <a href="{{ route('login') }}" class="btn btn-primary-outline">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-primary-outline">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div><!--end login button-->
        </div><!--end navigation-->
    </div><!--end container-->
</header><!--end header-->
<!-- Navbar End -->

<!-- Hero Start -->
<section class="bg-half-170 border-bottom d-table w-100" id="home">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-7">
                <div class="title-heading mt-4">
                    <div class="alert alert-white alert-pills shadow" role="alert">
                        <span class="content">Expand <span class="text-primary">Your Connections</span> Now - {{env('APP_NAME')}}.</span>
                    </div>
                    <h1 class="heading mb-3">Leading Internet Business For <span class="text-primary typewrite" data-period="2000" data-type='[ "Streaming", "High Speed Gaming", "Technology", "Video Call", "Software" ]'> <span class="wrap"></span> </span> Solution</h1>
                    <p class="para-desc text-muted">We will provide you internet speeds that are unmatched </p>
                    <div class="mt-4">
                        <a href="javascript:void(0)" class="btn btn-outline-primary rounded"><i class="uil uil-store"></i> Get Connected</a>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-6 col-md-5 mt-4 pt-2 mt-sm-0 pt-sm-0">
                <div class="position-relative">
                    <img src="{{asset('front/images/busi01.jpg')}}" class="rounded img-fluid mx-auto d-block" alt="">
{{--                    <div class="play-icon">--}}
{{--                        <a href="#!" data-type="youtube" data-id="yba7hPeTSjk" class="play-btn lightbox">--}}
{{--                            <i class="mdi mdi-play text-primary rounded-circle bg-white shadow"></i>--}}
{{--                        </a>--}}
{{--                    </div>--}}
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- Hero End -->

<!-- Feature Start -->
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">What We Do ?</h4>
                    <p class="text-muted para-desc mx-auto mb-0">Start working with <span class="text-primary fw-bold">{{env('APP_NAME')}}</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-md-4 col-12">
                <div class="features mt-5">
                    <div class="image position-relative d-inline-block">
                        <i class="uil uil-edit-alt h1 text-primary"></i>
                    </div>

                    <div class="content mt-4">
                        <h5>Design & Development</h5>
                        <p class="text-muted mb-0">Nisi aenean vulputate eleifend tellus vitae eleifend enim a Aliquam aenean elementum semper.</p>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-md-4 col-12 mt-5">
                <div class="features">
                    <div class="image position-relative d-inline-block">
                        <i class="uil uil-vector-square h1 text-primary"></i>
                    </div>

                    <div class="content mt-4">
                        <h5>Management & Marketing</h5>
                        <p class="text-muted mb-0">Allegedly, a Latin scholar established the origin of the text by established compiling unusual word.</p>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-md-4 col-12 mt-5">
                <div class="features">
                    <div class="image position-relative d-inline-block">
                        <i class="uil uil-file-search-alt h1 text-primary"></i>
                    </div>

                    <div class="content mt-4">
                        <h5>Stratagy & Research</h5>
                        <p class="text-muted mb-0">It seems that only fragments of the original text remain in the Lorem the original Ipsum texts used today.</p>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-md-4 col-12 mt-5">
                <div class="features">
                    <div class="image position-relative d-inline-block">
                        <i class="uil uil-airplay h1 text-primary"></i>
                    </div>

                    <div class="content mt-4">
                        <h5>Easy To Use</h5>
                        <p class="text-muted mb-0">Nisi aenean vulputate eleifend tellus vitae eleifend enim a Aliquam eleifend aenean elementum semper.</p>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-md-4 col-12 mt-5">
                <div class="features">
                    <div class="image position-relative d-inline-block">
                        <i class="uil uil-calendar-alt h1 text-primary"></i>
                    </div>

                    <div class="content mt-4">
                        <h5>Daily Reports</h5>
                        <p class="text-muted mb-0">Allegedly, a Latin scholar established the origin of the established text by compiling unusual word.</p>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-md-4 col-12 mt-5">
                <div class="features">
                    <div class="image position-relative d-inline-block">
                        <i class="uil uil-clock h1 text-primary"></i>
                    </div>

                    <div class="content mt-4">
                        <h5>Real Time Zone</h5>
                        <p class="text-muted mb-0">It seems that only fragments of the original text remain in only fragments the Lorem Ipsum texts used today.</p>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- End feature -->



<!-- Price Start -->
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">Choose Simple Pricing</h4>
                    <p class="text-muted para-desc mb-0 mx-auto">Start working with <span class="text-primary fw-bold">{{env('APP_NAME')}}</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row align-items-center">

            @foreach($Packages as $key => $package)
            <div class="col-md-4 col-12 mt-4 pt-2">

                <div class="card pricing-rates business-rate shadow bg-light rounded text-center border-0">
                    <div class="card-body py-5">
                        <h6 class="title fw-bold text-uppercase text-primary mb-4">{{$package->description}}</h6>
                        <div class="d-flex justify-content-center mb-4">
                            <span class="h4 mb-0 mt-2">KSH</span>
                            <span class="price h1 mb-0">{{$package->amount}}</span>
                            <span class="h4 align-self-end mb-1">/mo</span>
                        </div>

                        <ul class="list-unstyled mb-0 ps-0">
                            <li class="h6 text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Full Access</li>
                            <li class="h6 text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Enhanced Security</li>
                            <li class="h6 text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Source Files</li>
                            <li class="h6 text-muted mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>1 Domain Free</li>
                        </ul>
                        <a href="{{route('checkout',['id'=>$package->id])}}" class="btn btn-primary mt-4">{{$package->name}}</a>
                    </div>
                </div>

            </div><!--end col-->
            @endforeach
        </div><!--end row-->
    </div><!--end container-->
    <!-- Price End -->

    <!-- Counter End -->
    <div class="container mt-100 mt-60">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section-title">
                    <h4 class="title mb-4">See everything about your <span class="text-primary">{{env('APP_NAME')}}</span> Business</h4>
                    <p class="text-muted para-desc">Start working with <span class="text-primary fw-bold">{{env('APP_NAME')}}</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                    <ul class="list-unstyled text-muted">
                        <li class="mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Digital Marketing Solutions for Tomorrow</li>
                        <li class="mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Our Talented & Experienced Marketing Agency</li>
                        <li class="mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Create your own skin to match your brand</li>
                    </ul>
                </div>
            </div><!--end col-->

            <div class="col-lg-6">
                <div class="row ms-lg-5" id="counter">
                    <div class="col-md-6 col-12">
                        <div class="row">
                            <div class="col-12 mt-4 mt-lg-0 pt-2 pt-lg-0">
                                <div class="card counter-box border-0 bg-light bg-gradient shadow text-center rounded">
                                    <div class="card-body py-5">
                                        <h2 class="mb-0"><span class="counter-value" data-target="97">3</span>%</h2>
                                        <h5 class="counter-head mb-0">Happy Client</h5>
                                    </div>
                                </div>
                            </div><!--end col-->

                            <div class="col-12 mt-4 pt-2">
                                <div class="card counter-box border-0 bg-primary bg-gradient shadow text-center rounded">
                                    <div class="card-body py-5">
                                        <h2 class="text-light title-dark mb-0"><span class="counter-value" data-target="15">1</span>+</h2>
                                        <h5 class="counter-head mb-0 title-dark text-light">Awards</h5>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end Row-->
                    </div><!--end col-->

                    <div class="col-md-6 col-12">
                        <div class="row pt-lg-4 mt-lg-4">
                            <div class="col-12 mt-4 pt-2">
                                <div class="card counter-box border-0 bg-success bg-gradient shadow text-center rounded">
                                    <div class="card-body py-5">
                                        <h2 class="text-light title-dark mb-0"><span class="counter-value" data-target="2">0</span>K</h2>
                                        <h5 class="counter-head mb-0 title-dark text-light">Connections</h5>
                                    </div>
                                </div>
                            </div><!--end col-->

                            <div class="col-12 mt-4 pt-2">
                                <div class="card counter-box border-0 bg-light bg-gradient shadow text-center rounded">
                                    <div class="card-body py-5">
                                        <h2 class="mb-0"><span class="counter-value" data-target="98">3</span>%</h2>
                                        <h5 class="counter-head mb-0">Coverage</h5>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end Row-->
                    </div><!--end col-->
                </div><!--end Row-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- Counter End -->

<!-- News Start -->
<section class="section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">Latest News</h4>
                    <p class="text-muted para-desc mx-auto mb-0">Start working with <span class="text-primary fw-bold">{{env('APP_NAME')}}</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-lg-4 col-md-6 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img src="{{asset('front/images/blog/01.jpg')}}" class="card-img-top rounded-top" alt="...">
                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h5><a href="javascript:void(0)" class="card-title title text-dark">Design your apps in your own way</a></h5>
                        <div class="post-meta d-flex justify-content-between mt-3">
                            <ul class="list-unstyled mb-0">
                                <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>33</a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>08</a></li>
                            </ul>
                            <a href="/" class="text-muted readmore">Read More <i class="uil uil-angle-right-b align-middle"></i></a>
                        </div>
                    </div>
                    <div class="author">
                        <small class="text-light user d-block"><i class="uil uil-user"></i> Calvin Carlo</small>
                        <small class="text-light date"><i class="uil uil-calendar-alt"></i> 13th August, 2019</small>
                    </div>
                </div>
            </div><!--end col-->

{{--            <div class="col-lg-4 col-md-6 mt-4 pt-2">--}}
{{--                <div class="card blog rounded border-0 shadow">--}}
{{--                    <div class="position-relative">--}}
{{--                        <img src="{{asset('front/images/blog/02.jpg')}}" class="card-img-top rounded-top" alt="...">--}}
{{--                        <div class="overlay rounded-top bg-dark"></div>--}}
{{--                    </div>--}}
{{--                    <div class="card-body content">--}}
{{--                        <h5><a href="javascript:void(0)" class="card-title title text-dark">How apps is changing the IT world</a></h5>--}}
{{--                        <div class="post-meta d-flex justify-content-between mt-3">--}}
{{--                            <ul class="list-unstyled mb-0">--}}
{{--                                <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>33</a></li>--}}
{{--                                <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>08</a></li>--}}
{{--                            </ul>--}}
{{--                            <a href="/" class="text-muted readmore">Read More <i class="uil uil-angle-right-b align-middle"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="author">--}}
{{--                        <small class="text-light user d-block"><i class="uil uil-user"></i> Calvin Carlo</small>--}}
{{--                        <small class="text-light date"><i class="uil uil-calendar-alt"></i> 13th August, 2019</small>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div><!--end col-->--}}

            <div class="col-lg-4 col-md-6 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9360848754738617"
                                crossorigin="anonymous"></script>
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-format="fluid"
                             data-ad-layout-key="-6o+dl-2l-a4+rs"
                             data-ad-client="ca-pub-9360848754738617"
                             data-ad-slot="4728916331"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
{{--                    <div class="card-body content">--}}
{{--                        <h5><a href="javascript:void(0)" class="card-title title text-dark">How apps is changing the IT world</a></h5>--}}
{{--                        <div class="post-meta d-flex justify-content-between mt-3">--}}
{{--                            <ul class="list-unstyled mb-0">--}}
{{--                                <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>33</a></li>--}}
{{--                                <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>08</a></li>--}}
{{--                            </ul>--}}
{{--                            <a href="/" class="text-muted readmore">Read More <i class="uil uil-angle-right-b align-middle"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="author">--}}
{{--                        <small class="text-light user d-block"><i class="uil uil-user"></i> Calvin Carlo</small>--}}
{{--                        <small class="text-light date"><i class="uil uil-calendar-alt"></i> 13th August, 2019</small>--}}
{{--                    </div>--}}
                </div>
            </div><!--end col-->

            <div class="col-lg-4 col-md-6 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img src="{{asset('front/images/blog/03.jpg')}}" class="card-img-top rounded-top" alt="...">
                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h5><a href="javascript:void(0)" class="card-title title text-dark">Smartest Applications for Business</a></h5>
                        <div class="post-meta d-flex justify-content-between mt-3">
                            <ul class="list-unstyled mb-0">
                                <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>33</a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>08</a></li>
                            </ul>
                            <a href="/" class="text-muted readmore">Read More <i class="uil uil-angle-right-b align-middle"></i></a>
                        </div>
                    </div>
                    <div class="author">
                        <small class="text-light user d-block"><i class="uil uil-user"></i> Calvin Carlo</small>
                        <small class="text-light date"><i class="uil uil-calendar-alt"></i> 13th August, 2019</small>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->

    <div class="container mt-100 mt-60">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title">
                    <h4 class="title mb-4">See everything about your employee at one place.</h4>
                    <p class="text-muted para-desc mx-auto mb-0">Start working with <span class="text-primary fw-bold">{{env('APP_NAME')}}</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>

                    <div class="mt-4">
                        <a href="javascript:void(0)" class="btn btn-primary mt-2 me-2">Get Started Now</a>
                        <a href="javascript:void(0)" class="btn btn-outline-primary mt-2">Free Trial</a>
                    </div>
                </div>

                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9360848754738617"
                        crossorigin="anonymous"></script>
                <!-- First Ad -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-9360848754738617"
                     data-ad-slot="8919442784"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>


            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- News End -->


<!-- Footer Start -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
                <a href="#" class="logo-footer">
                    <img src="images/logo-light.png" height="24" alt="">
                </a>
                <p class="mt-4">Start working with {{env('APP_NAME')}} that can provide everything you need to generate awareness, drive traffic, connect.</p>
                <ul class="list-unstyled social-icon foot-social-icon mb-0 mt-4">
                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
                </ul><!--end icon-->
            </div><!--end col-->

            <div class="col-lg-2 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <h5 class="text-light footer-head">Company</h5>
                <ul class="list-unstyled footer-list mt-4">
                    <li><a href="/" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> About us</a></li>
                    <li><a href="/" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Services</a></li>
                    <li><a href="/" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Team</a></li>
                    <li><a href="/" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Pricing</a></li>
                </ul>
            </div><!--end col-->

            <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <h5 class="text-light footer-head">Usefull Links</h5>
                <ul class="list-unstyled footer-list mt-4">
                    <li><a href="/" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Terms of Services</a></li>
                    <li><a href="/" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Privacy Policy</a></li>
                </ul>
            </div><!--end col-->

            <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <h5 class="text-light footer-head">Newsletter</h5>
                <p class="mt-4">Sign up and receive the latest tips via email.</p>
                <form>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="foot-subscribe mb-3">
                                <label class="form-label">Write your email <span class="text-danger">*</span></label>
                                <div class="form-icon position-relative">
                                    <i data-feather="mail" class="fea icon-sm icons"></i>
                                    <input type="email" name="email" id="emailsubscribe" class="form-control ps-5 rounded" placeholder="Your email : " required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="d-grid">
                                <input type="submit" id="submitsubscribe" name="send" class="btn btn-soft-primary" value="Subscribe">
                            </div>
                        </div>
                    </div>
                </form>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</footer><!--end footer-->
<footer class="footer footer-bar">
    <div class="container text-center">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="text-sm-start">
                    <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> {{env('APP_NAME')}}.</p>
                </div>
            </div><!--end col-->

            <div class="col-sm-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <ul class="list-unstyled text-sm-end mb-0">
                    <li class="list-inline-item"><a href="javascript:void(0)"><img src="{{asset('front/images/payments/american-ex.png')}}" class="avatar avatar-ex-sm" title="American Express" alt=""></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)"><img src="{{asset('front/images/payments/discover.png')}}" class="avatar avatar-ex-sm" title="Discover" alt=""></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)"><img src="{{asset('front/images/payments/master-card.png')}}" class="avatar avatar-ex-sm" title="Master Card" alt=""></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)"><img src="{{asset('front/images/payments/paypal.png')}}" class="avatar avatar-ex-sm" title="Paypal" alt=""></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)"><img src="{{asset('front/images/payments/visa.png')}}" class="avatar avatar-ex-sm" title="Visa" alt=""></a></li>
                </ul>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</footer><!--end footer-->
<!-- Footer End -->

<!-- Back to top -->
<a href="#" onclick="topFunction()" id="back-to-top" class="btn btn-icon btn-primary back-to-top"><i data-feather="arrow-up" class="icons"></i></a>
<!-- Back to top -->



<!-- javascript -->
<script src="{{asset('front/js/bootstrap.bundle.min.js')}}"></script>
<!-- tobii js -->
<script src="{{asset('front/js/tobii.min.js')}} "></script>
<!-- Parallax -->
<script src="{{asset('front/js/parallax.js')}} "></script>
<!-- Icons -->
<script src="{{asset('front/js/feather.min.js')}}"></script>
<!-- Main Js -->
<script src="{{asset('front/js/plugins.init.js')}}"></script><!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
<script src="{{asset('front/js/app.js')}}"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->
</body>
</html>

