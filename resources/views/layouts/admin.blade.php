<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="utf-8" />
    <title>Conquer | Admin Dashboard Template</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta name="MobileOptimized" content="320" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css" />
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <link
    href="{{
        asset(
            'conquer2/assets/plugins/simple-line-icons/simple-line-icons.min.css'
        )
    }}"
    rel="stylesheet"
    type="text/css"
/>
<link
    href="{{
        asset('conquer2/assets/plugins/bootstrap/css/bootstrap.min.css')
    }}"
    rel="stylesheet"
    type="text/css"
/>
<link
    href="{{
        asset('conquer2/assets/plugins/uniform/css/uniform.default.css')
    }}"
    rel="stylesheet"
    type="text/css"
/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link
    href="{{
        asset(
            'conquer2/assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css'
        )
    }}"
    rel="stylesheet"
    type="text/css"
/>
<link
    href="{{
        asset(
            'conquer2/assets/plugins/fullcalendar/fullcalendar/fullcalendar.css'
        )
    }}"
    rel="stylesheet"
    type="text/css"
/>
<link
    href="{{
        asset('conquer2/assets/plugins/jqvmap/jqvmap/jqvmap.css')
    }}"
    rel="stylesheet"
    type="text/css"
/>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN THEME STYLES -->
<link
    href="{{ asset('conquer2/assets/css/style-conquer.css') }}"
    rel="stylesheet"
    type="text/css"
/>
<link
    href="{{ asset('conquer2/assets/css/style.css') }}"
    rel="stylesheet"
    type="text/css"
/>
<link
    href="{{ asset('conquer2/assets/css/style-responsive.css') }}"
    rel="stylesheet"
    type="text/css"
/>
<link
    href="{{ asset('conquer2/assets/css/plugins.css') }}"
    rel="stylesheet"
    type="text/css"
/>
<link
    href="{{ asset('conquer2/assets/css/pages/tasks.css') }}"
    rel="stylesheet"
    type="text/css"
/>
<link
    href="{{ asset('conquer2/assets/css/themes/default.css') }}"
    rel="stylesheet"
    type="text/css"
    id="style_color"
/>
<link
    href="{{ asset('conquer2/assets/css/custom.css') }}"
    rel="stylesheet"
    type="text/css"
/>


    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />
    <style>
        .table-td-head {
            font-weight: bold;
            font-size: 1.8rem;
        }

        .table-td-content {
            font-size: 1.8rem;
        }

        .form-label {
            font-size: 1.6rem;
        }

        .form-select {
            width: 100%;
            height: 40px;
            padding: 0 1rem 0 1rem;
            background-color: #58585c;
            color: white;
        }

        .button-logout-dashboard-pegawai {
            margin-top: 45rem;
            position: fixed;
            margin-left: 5rem;
        }

        .button-logout-dashboard-admin {
            margin-top: 40rem;
            position: fixed;
            margin-left: 5rem;
        }

        .button-logout-dashboard-suspend {
            margin-top: 64rem;
            position: fixed;
            margin-left: 5rem;
        }

    </style>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->

<body class="page-header-fixed">
    <!-- BEGIN HEADER -->
    <div class="header navbar navbar-fixed-top">
        <!-- BEGIN TOP NAVIGATION BAR -->
        <div class="header-inner">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="/">
                    <h4 style="color: white;">ADA.SHOP</h4>
                </a>
            </div>
            <form class="search-form search-form-header" role="form" action="index.html">
                <div class="input-icon right">
                    <i class="icon-magnifier"></i>
                    <input type="text" class="form-control input-sm" name="query" placeholder="Search..." />
                </div>
            </form>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <img src="{{ asset('conquer2/assets/img/menu-toggler.png') }}"
                    alt="" />
            </a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <ul class="nav navbar-nav pull-right">
                <li class="devider">&nbsp;</li>
                <!-- BEGIN USER LOGIN DROPDOWN -->

                <li class="dropdown user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                        data-close-others="true">
                        <img alt="" src="{{ asset('assets/img/avatar3_small.jpg') }}" />
                        <span class="username username-hide-on-mobile">{{ Auth::user()->name }}
                        </span>

                    </a>

                </li>

                <li class="dropdown user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                        data-close-others="true">
                        <img alt="" src="{{ asset('assets/img/avatar3_small.jpg') }}" />
                        <span class="username username-hide-on-mobile">{{ Auth::user()->name }}
                        </span>

                    </a>

                </li>
                <!-- END USER LOGIN DROPDOWN -->
            </ul>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END TOP NAVIGATION BAR -->
    </div>
    <!-- END HEADER -->
    <div class="clearfix"></div>
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN SIDEBAR -->
        <div class="page-sidebar-wrapper">
            <div class="page-sidebar navbar-collapse collapse">
                <!-- BEGIN SIDEBAR MENU -->
                <!-- DOC: for circle icon style menu apply page-sidebar-menu-circle-icons class right after sidebar-toggler-wrapper -->
                <ul class="page-sidebar-menu text-start">
                    <li class="sidebar-toggler-wrapper">
                        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                        <div class="sidebar-toggler"></div>
                        <div class="clearfix"></div>
                        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    </li>

                    @if (Auth::user()->suspend == 0)

                        <li class="sidebar-search-wrapper">
                            <form class="search-form" role="form" action="index.html" method="get">
                                <div class="input-icon right">
                                    <i class="icon-magnifier"></i>
                                    <input type="text" class="form-control" name="query" placeholder="Search..." />
                                </div>
                            </form>
                        </li>
                        <li class="start">
                            <a href="/">
                                <i class="icon-home"></i>
                                <span class="title">Home</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        @if (Auth::user()->roles == 'administrator')
                            <li>
                                <a href="/mgpegawai">
                                    <i class="icon-puzzle"></i>
                                    <span class="title">Users</span>
                                    <span class="arrow"></span>
                                </a>
                            </li>
                        @endif

                        <li>
                            <a href="/mgproduct">
                                <i class="icon-present"></i>
                                <span class="title">Products</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                        <li>
                            <a href="/mgcate">
                                <i class="icon-list"></i>
                                <span class="title">Categories</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                        <li>
                            <a href="/mgbrand">
                                <i class="icon-present"></i>
                                <span class="title">Brands</span>
                                <span class="arrow"></span>
                            </a>
                        </li>

                        <li>
                            <a href="/mgorder">
                                <i class="icon-calendar"></i>
                                <span class="title">Transactions</span>
                                <span class="arrow"></span>
                            </a>
                        </li>

                        <li class="text-center pl-5 button-logout-dashboard mt-5">
                            <form style="left: 2rem" class="ml-5" id="logout-form"
                                action="{{ route('logout') }}" method="post">
                                @csrf

                                <a href="/login" style="margin: 0 auto">
                                    <button class="btn-danger btn btn-lg" style="">
                                        LOGOUT
                                    </button>
                                </a>
                            </form>
                        </li>

                </ul>

                @if (Auth::user()->roles == 'staff')
                    <div class="button-logout-dashboard-pegawai text-center pl-5">
                        <form style="left: 2rem" class="ml-5" id="logout-form"
                            action="{{ route('logout') }}" method="post">
                            @csrf

                            <a href="/login" style="margin: 0 auto">
                                <button class="btn-danger btn btn-lg" style="">
                                    LOGOUT
                                </button>
                            </a>
                        </form>
                    </div>
                    @endif @if (Auth::user()->roles == 'administrator')
                        <div class="button-logout-dashboard-admin text-center pl-5">
                            <form style="left: 2rem" class="ml-5" id="logout-form"
                                action="{{ route('logout') }}" method="post">
                                @csrf

                                <a href="/login" style="margin: 0 auto">
                                    <button class="btn-danger btn btn-lg" style="">
                                        LOGOUT
                                    </button>
                                </a>
                            </form>
                        </div>
                        @endif @endif @if (Auth::user()->suspend == 0)
                            <div class="button-logout-dashboard-suspend text-center pl-5">
                                <form style="left: 2rem" class="ml-5" id="logout-form"
                                    action="{{ route('logout') }}" method="post">
                                    @csrf

                                    <a href="/login" style="margin: 0 auto">
                                        <button class="btn-danger btn btn-lg" style="">
                                            LOGOUT
                                        </button>
                                    </a>
                                </form>
                            </div>
                        @endif
                        <!-- END SIDEBAR MENU -->
            </div>
        </div>
        <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true"></button>
                                <h4 class="modal-title">Modal title</h4>
                            </div>
                            <div class="modal-body">
                                Widget settings form goes here
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success">
                                    Save changes
                                </button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                    Close
                                </button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                <!-- BEGIN STYLE CUSTOMIZER -->

                <!-- END BEGIN STYLE CUSTOMIZER -->
                <!-- BEGIN PAGE HEADER-->

                @yield('header') {{-- <h3 class="page-title">
                        Dashboard <small>statistics and more</small>
                    </h3>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="index.html">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Dashboard</a>
                            </li>
                        </ul>
                        <div class="page-toolbar">
                            <div
                                id="dashboard-report-range"
                                class="pull-right tooltips btn btn-fit-height btn-primary"
                                data-container="body"
                                data-placement="bottom"
                                data-original-title="Change dashboard date range"
                            >
                                <i class="icon-calendar"></i>&nbsp;
                                <span
                                    class="thin uppercase visible-lg-inline-block"
                                ></span
                                >&nbsp; <i class="fa fa-angle-down"></i>
                            </div>
                        </div>
                    </div> --}}
                <!-- END PAGE HEADER-->

                @yield('content')
            </div>
        </div>
        <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <div class="footer">
        <div class="footer-inner">2013 &copy; Conquer by keenthemes.</div>
        <div class="footer-tools">
            <span class="go-top">
                <i class="fa fa-angle-up"></i>
            </span>
        </div>
    </div>
    <!-- END FOOTER -->
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->
    <script src="{{ asset('conquer2/assets/plugins/jquery-1.11.0.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('conquer2/assets/plugins/jquery-migrate-1.2.1.min.js') }}" type="text/javascript"></>
        
    <!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
    <script
        src="{{ asset('conquer2/assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js') }}"
        type="text/javascript"></script>
    <script src="{{     asset('conquer2/assets/plugins/bootstrap/js/bootstrap.min.js') }}"
        type="text/javascript"></script>
    <script
        src="{{    asset('conquer2/assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}"
        type="text/javascript"></script>
    <script
        src="{{         asset('conquer2/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('conquer2/assets/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
    <script src="{{     asset('conquer2/assets/plugins/uniform/jquery.uniform.min.js') }}"
        type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{     asset('conquer2/assets/plugins/jqvmap/jqvmap/jquery.vmap.js') }}"
        type="text/javascript"></script>
    <script
        src="{{         asset('conquer2/assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js') }}"
        type="text/javascript"></script>
    <script
        src="{{         asset('conquer2/assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js') }}"
        type="text/javascript"></script>
    <script
        src="{{         asset('conquer2/assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js') }}"
        type="text/javascript"></script>
    <script
        src="{{         asset('conquer2/assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js') }}"
        type="text/javascript"></script>
    <script
        src="{{         asset('conquer2/assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js') }}"
        type="text/javascript"></script>
    <script
        src="{{         asset('conquer2/assets/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('conquer2/assets/plugins/jquery.peity.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('conquer2/assets/plugins/jquery.pulsate.min.js') }}" type="text/javascript"></script>
    <script src="{{    asset('conquer2/assets/plugins/jquery-knob/js/jquery.knob.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('conquer2/assets/plugins/flot/jquery.flot.js') }}" type="text/javascript"></script>
    <script
        src="{{         asset('conquer2/assets/plugins/flot/jquery.flot.resize.js') }}assets/plugins/flot/jquery.flot.resize.js"
        type="text/javascript"></script>
    <script
        src="{{         asset('conquer2/assets/plugins/bootstrap-daterangepicker/moment.min.js') }}"
        type="text/javascript"></script>

    <script
        src="{{  asset('conquer2/assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"
        type="text/javascript"></script>
    <script src="{{  asset('conquer2/assets/plugins/gritter/js/jquery.gritter.js') }}"
        type="text/javascript"></script>
    <!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
    <script
        src="{{         asset('conquer2/assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js') }}"
        type="text/javascript"></script>
    <script
        src="{{         asset('conquer2/assets/plugins/jquery-easypiechart/jquery.easypiechart.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('conquer2/assets/plugins/jquery.sparkline.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('conquer2/assets/scripts/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('conquer2/assets/scripts/index.js') }}" type="text/javascript"></script>
    <script src="{{ asset('conquer2/assets/scripts/tasks.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
        jQuery(document).ready(function() {
            App.init(); // initlayout and core plugins
            Index.init();
            Index.initJQVMAP(); // init index page's custom scripts
            Index.initCalendar(); // init index page's custom scripts
            Index.initCharts(); // init index page's custom scripts
            Index.initChat();
            Index.initMiniCharts();
            Index.initPeityElements();
            Index.initKnowElements();
            Index.initDashboardDaterange();
            Tasks.initDashboardWidget();
        });
    </script>
    <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->

</html>
