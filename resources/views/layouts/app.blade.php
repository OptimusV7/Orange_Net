<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{env('APP_NAME')}} | Dashboard</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">

    <!-- vector map CSS -->
    <link href="{{ asset('vendors/vectormap/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('vendors/apexcharts/dist/apexcharts.css')}}" rel="stylesheet" type="text/css" />

    <!-- Data Table CSS -->
    <link href="{{ asset('vendors/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Toggles CSS -->
    <link href="{{ asset('vendors/jquery-toggles/css/toggles.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendors/jquery-toggles/css/themes/toggles-light.css')}}" rel="stylesheet" type="text/css">

    <!-- Toastr CSS -->
    <link href="{{ asset('vendors/jquery-toast-plugin/dist/jquery.toast.min.css')}}" rel="stylesheet" type="text/css">


    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.css')}}" rel="stylesheet" type="text/css">


</head>

<body>
<!-- Preloader -->
{{--    <div class="preloader-it">--}}
{{--        <div class="loader-pendulums"></div>--}}
{{--    </div>--}}

<!-- /Preloader -->

<!-- HK Wrapper -->
<div class="hk-wrapper hk-vertical-nav">

    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-xl navbar-light fixed-top hk-navbar">
        <a id="navbar_toggle_btn" class="navbar-toggle-btn nav-link-hover" href="javascript:void(0);"><span class="feather-icon"><i data-feather="menu"></i></span></a>
        <a class="navbar-brand font-weight-700" href="{{url('/')}}">
            {{env('APP_NAME')}}
        </a>
        <ul class="navbar-nav hk-navbar-content">

            <li class="nav-item dropdown dropdown-authentication">
                <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media">
                        <div class="media-img-wrap">
                            <div class="avatar">
                                <img src="{{asset('dist/img/avatar12.jpg')}}" alt="user" class="avatar-img rounded-circle">
                            </div>
                            <span class="badge badge-success badge-indicator"></span>
                        </div>
                        <div class="media-body">
                            <span>{{ Auth::user()->name }}<i class="zmdi zmdi-chevron-down"></i></span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                    <a class="dropdown-item" href="{{url('/')}}"><i class="dropdown-icon zmdi zmdi-globe"></i><span>Website</span></a>
                    <a class="dropdown-item" href=""><i class="dropdown-icon zmdi zmdi-account"></i><span>Profile</span></a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="dropdown-icon zmdi zmdi-power"></i>
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>

    <!-- /Top Navbar -->

    <!-- Vertical Nav -->
    <nav class="hk-nav hk-nav-dark">
        <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i data-feather="x"></i></span></a>
        <div class="nicescroll-bar">
            <div class="navbar-nav-wrap">
                @hasrole('customer')
                <ul class="navbar-nav flex-column">

                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('home')}}" >
                            <span class="feather-icon"><i data-feather="activity"></i></span>
                            <span class="nav-link-text">Dashboard</span>
                        </a>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link link-with-badge" href="{{route('packages')}}">
                            <span class="feather-icon"><i data-feather="package"></i></span>
                            <span class="nav-link-text">Packages</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('subscriptions')}}">
                            <span class="feather-icon"><i data-feather="pocket"></i></span>
                            <span class="nav-link-text">Subscriptions</span>
                        </a>
                    </li>
                </ul>
                <hr class="nav-separator">
                <div class="nav-header">
                    <span>History Info</span>
                    <span>UI</span>
                </div>
                <ul class="navbar-nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('payments')}}" >
                            <span class="feather-icon"><i data-feather="credit-card"></i></span>
                            <span class="nav-link-text">Payment History</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('invoices')}}" >
                            <span class="feather-icon"><i data-feather="file"></i></span>
                            <span class="nav-link-text">Invoice</span>
                        </a>
                    </li>

                </ul>
                <hr class="nav-separator">
                @endhasrole
                @hasrole('admin')
                <ul class="navbar-nav flex-column">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('admin.index')}}" >
                            <span class="feather-icon"><i data-feather="activity"></i></span>
                            <span class="nav-link-text">Dashboard</span>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-with-badge" href="{{route('subscribers.index')}}">
                            <span class="feather-icon"><i data-feather="user"></i></span>
                            <span class="nav-link-text">Subscribers</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('sites.index')}}">
                            <span class="feather-icon"><i data-feather="home"></i></span>
                            <span class="nav-link-text">Sites Activation</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('router.index')}}">
                            <span class="feather-icon"><i data-feather="hard-drive"></i></span>
                            <span class="nav-link-text">Routers Management</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('router.index')}}">
                            <span class="feather-icon"><i data-feather="user-plus"></i></span>
                            <span class="nav-link-text">Connection Requests</span>
                        </a>
                    </li>
                </ul>
                <hr class="nav-separator">
                <ul class="navbar-nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('package.index')}}" >
                            <span class="feather-icon"><i data-feather="package"></i></span>
                            <span class="nav-link-text">Services Plan</span>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-with-badge" href="{{route('payment.index')}}">
                            <span class="feather-icon"><i data-feather="credit-card"></i></span>
                            <span class="nav-link-text">All Payments</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('bandwidth.index')}}">
                            <span class="feather-icon"><i data-feather="git-commit"></i></span>
                            <span class="nav-link-text">Bandwidth Configuration</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#pages_drp">
                            <span class="feather-icon"><i data-feather="user"></i></span>
                            <span class="nav-link-text">User Management</span>
                        </a>
                        <ul id="pages_drp" class="nav flex-column collapse collapse-level-1">
                            <li class="nav-item">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('users.index') }}">Manage Users</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('roles.index') }}">Manage Roles</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
                <hr class="nav-separator">
                <ul class="navbar-nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}" >
                            <span class="feather-icon"><i data-feather="mail"></i></span>
                            <span class="nav-link-text">Bulk SMS</span>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('subscriptions')}}">
                            <span class="feather-icon"><i data-feather="settings"></i></span>
                            <span class="nav-link-text">Settings</span>
                        </a>
                    </li>

                </ul>
                @endhasrole
            </div>
        </div>
    </nav>
    <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
    <!-- /Vertical Nav -->

    <!-- Setting Panel -->
    <div class="hk-settings-panel">
        <div class="nicescroll-bar position-relative">
            <div class="settings-panel-wrap">
                <div class="settings-panel-head">
                    <a href="javascript:void(0);" id="settings_panel_close" class="settings-panel-close"><span class="feather-icon"><i data-feather="x"></i></span></a>
                </div>
                <hr>

                <h6 class="mb-5">Navigation</h6>
                <p class="font-14">Menu comes in two modes: dark & light</p>
                <div class="button-list hk-nav-select mb-10">
                    <button type="button" id="nav_light_select" class="btn btn-outline-light btn-sm btn-wth-icon icon-wthot-bg"><span class="icon-label"><i class="fa fa-sun-o"></i> </span><span class="btn-text">Light Mode</span></button>
                    <button type="button" id="nav_dark_select" class="btn btn-outline-primary btn-sm btn-wth-icon icon-wthot-bg"><span class="icon-label"><i class="fa fa-moon-o"></i> </span><span class="btn-text">Dark Mode</span></button>
                </div>
                <hr>
                <h6 class="mb-5">Top Nav</h6>
                <p class="font-14">Choose your liked color mode</p>
                <div class="button-list hk-navbar-select mb-10">
                    <button type="button" id="navtop_light_select" class="btn btn-outline-light btn-sm btn-wth-icon icon-wthot-bg"><span class="icon-label"><i class="fa fa-sun-o"></i> </span><span class="btn-text">Light Mode</span></button>
                    <button type="button" id="navtop_dark_select" class="btn btn-outline-primary btn-sm btn-wth-icon icon-wthot-bg"><span class="icon-label"><i class="fa fa-moon-o"></i> </span><span class="btn-text">Dark Mode</span></button>
                </div>
                <hr>
                <div class="d-flex justify-content-between align-items-center">
                    <h6>Scrollable Header</h6>
                    <div class="toggle toggle-sm toggle-simple toggle-light toggle-bg-primary scroll-nav-switch"></div>
                </div>
                <button id="reset_settings" class="btn btn-primary btn-block btn-reset mt-30">Reset</button>
            </div>
        </div>
        <img class="d-none" src="dist/img/logo-light.png" alt="brand" />
        <img class="d-none" src="dist/img/logo-dark.png" alt="brand" />
    </div>
    <!-- /Setting Panel -->


    <!-- Main Content -->
@yield('content')
<!-- /Main Content -->


</div>
<!-- /HK Wrapper -->

<!-- jQuery -->
<script src="{{ asset('vendors/jquery/dist/jquery.min.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('vendors/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- Slimscroll JavaScript -->
<script src="{{ asset('dist/js/jquery.slimscroll.js')}}"></script>

<!-- Data Table JavaScript -->
<script src="{{asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-dt/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('vendors/jszip/dist/jszip.min.js')}}"></script>
<script src="{{asset('vendors/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('vendors/pdfmake/build/vfs_fonts.js')}}"></script>
<script src="{{asset('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('dist/js/dataTables-data.js')}}"></script>

<!-- Fancy Dropdown JS -->
<script src="{{ asset('dist/js/dropdown-bootstrap-extended.js')}}"></script>

<!-- FeatherIcons JavaScript -->
<script src="{{ asset('dist/js/feather.min.js')}}"></script>

<!-- Toggles JavaScript -->
<script src="{{ asset('vendors/jquery-toggles/toggles.min.js')}}"></script>
<script src="{{ asset('dist/js/toggle-data.js')}}"></script>

<!-- Counter Animation JavaScript -->
<script src="{{ asset('vendors/waypoints/lib/jquery.waypoints.min.js')}}"></script>
<script src="{{ asset('vendors/jquery.counterup/jquery.counterup.min.js')}}"></script>

<!-- Morris Charts JavaScript -->
<script src="{{ asset('vendors/raphael/raphael.min.js')}}"></script>
<script src="{{ asset('vendors/morris.js/morris.min.js')}}"></script>

<!-- EChartJS JavaScript -->
<script src="{{ asset('vendors/echarts/dist/echarts-en.min.js')}}"></script>

<!-- Sparkline JavaScript -->
<script src="{{ asset('vendors/jquery.sparkline/dist/jquery.sparkline.min.js')}}"></script>

<!-- Vector Maps JavaScript -->
<script src="{{ asset('vendors/vectormap/jquery-jvectormap-2.0.3.min.js')}}"></script>
<script src="{{ asset('vendors/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{ asset('dist/js/vectormap-data.js')}}"></script>



<!-- Owl JavaScript -->
<script src="{{ asset('vendors/owl.carousel/dist/owl.carousel.min.js')}}"></script>

<!-- Toastr JS -->
<script src="{{asset('vendors/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>
<script src="{{asset('dist/js/toast-data.js')}}"></script>


<!-- Init JavaScript -->
<script src="{{ asset('dist/js/init.js')}}"></script>
<script src="{{ asset('dist/js/dashboard-data.js')}}"></script>

<script>
    @if(Session::has('Login'))
    $.toast({
        heading: 'Welcome to your Portal!',
        text: '<p>You have successfully Logged In</p>',
        position: 'top-right',
        loaderBg:'#7a5449',
        class: 'jq-toast-success',
        hideAfter: 3600,
        stack: 6,
        showHideTransition: 'fade'
    });
    {{Session::forget('Login')}}
    @endif
</script>
<script>
    @if(Session::has('insufficient_Funds'))
    $.toast({
        heading: 'Payment!',
        text: '<p>You have insufficient Funds in for this payment</p>',
        position: 'top-right',
        loaderBg:'#7a5449',
        class: 'jq-toast-danger',
        hideAfter: 3600,
        stack: 6,
        showHideTransition: 'fade'
    });
    {{Session::forget('insufficient_Funds')}}
    @endif
</script>


{{--<script>--}}
{{--    var processing = true;--}}
{{--    var processingError = true;--}}
{{--    function sample() {--}}
{{--        if (processing){--}}
{{--            $.toast().reset('all');--}}
{{--            $("body").removeAttr('class');--}}
{{--            $.toast({--}}
{{--                text: '<i class="jq-toast-icon ti-shift-right"></i><p>Success. Request accepted for processing</p> <b>Enter Safaricom Mpesa Pin when prompted</b>',--}}
{{--                position: 'top-left',--}}
{{--                loaderBg:'#21cf15',--}}
{{--                class: 'jq-has-icon jq-toast-success',--}}
{{--                hideAfter: 4500,--}}
{{--                stack: 6,--}}
{{--                showHideTransition: 'fade'--}}
{{--            });--}}

{{--            {{Session::forget('PayProcessing')}}--}}

{{--            // setTimeout(paymentResponse, 9000);--}}
{{--        }--}}
{{--        if (processingError){--}}
{{--            @if(Session::get('PayProcessingError'))--}}
{{--            $.toast().reset('all');--}}
{{--            $("body").removeAttr('class');--}}
{{--            $.toast({--}}
{{--                text: '<i class="jq-toast-icon ti-face-sad"></i><p>A transaction is already in process for the current subscriber</p>',--}}
{{--                position: 'top-left',--}}
{{--                loaderBg:'#7a5449',--}}
{{--                class: 'jq-has-icon jq-toast-warning',--}}
{{--                hideAfter: 4500,--}}
{{--                stack: 6,--}}
{{--                showHideTransition: 'fade'--}}
{{--            });--}}
{{--            {{Session::forget('PayProcessingError')}}--}}
{{--            // setTimeout(paymentResponse, 9000);--}}
{{--            @endif--}}
{{--        }--}}
{{--        setTimeout(paymentResponse, 9000);--}}
{{--        //paymentResponse();--}}
{{--    }--}}

{{--    var responseArrived  = true;--}}
{{--    function paymentResponse() {--}}
{{--        if (responseArrived){--}}
{{--            $.toast().reset('all');--}}
{{--            $("body").removeAttr('class');--}}
{{--            $.toast({--}}
{{--                text: '<i class="jq-toast-icon ti-import"></i><p>Success. Request received</p>',--}}
{{--                position: 'top-left',--}}
{{--                loaderBg:'#7a5449',--}}
{{--                class: 'jq-has-icon jq-toast-success',--}}
{{--                hideAfter: 4500,--}}
{{--                stack: 6,--}}
{{--                showHideTransition: 'fade'--}}
{{--            });--}}

{{--        }--}}

{{--    }--}}

{{--    $(function() {--}}
{{--        $(".tst1").click(function() {--}}
{{--            sample();--}}
{{--            //setTimeout(paymentResponse, 8000);--}}
{{--        });--}}

{{--    });--}}
{{--</script>--}}


</body>

</html>
