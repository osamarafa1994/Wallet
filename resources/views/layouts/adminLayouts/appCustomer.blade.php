<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{asset('assets/web_assets/img/favicon.ico')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Light Bootstrap Dashboard by Creative Tim</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{asset('assets/web_assets/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{asset('assets/web_assets/css/animate.min.css')}}" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{asset('assets/web_assets/css/light-bootstrap-dashboard.css?v=1.4.0')}}" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{asset('assets/web_assets/css/demo.css')}}" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{asset('assets/web_assets/css/pe-icon-7-stroke.css')}}" rel="stylesheet" />
    <style>
        .trans-form{
            background-color: white;
            margin: 6%;
            padding: 5%;
        }
        .prov-pho{
            width: 7%;
        }
    </style>

</head>
<body  dir="rtl" style="text-align: right">

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="{{asset('assets/web_assets/img/sidebar-5.jpg')}}">

        <!--
    
            Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
            Tip 2: you can also add an image using data-image tag
    
        -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Creative Tim
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="{{asset('admin/customer')}}">
                        <i class="pe-7s-graph"></i>
                        <p>الرئيسية</p>
                    </a>
                </li>
                <li >
                    <a href="{{asset('admin/transform')}}">
                        <i class="pe-7s-user"></i>
                        <p>تحويل الرصيد</p>
                    </a>
                </li>
                <li>
                    <a href="report.html">
                        <i class="pe-7s-note2"></i>
                        <p>التقارير</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">الرئيسية</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                                <p class="hidden-lg hidden-md">الرئيسية</p>
                            </a>
                        </li>

                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="">
                                <p>الحساب</p>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <p>
                                    الاعدادات
                                    <b class="caret"></b>
                                </p>

                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">تغير الرقم السري</a></li>

                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                            >
                                <p>الخروج</p>

                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        <li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div id="app">

            <main class="">
                @yield('content')
            </main>
        </div>
    </div>
</div>

</body>

<!--   Core JS Files   -->
<script src="{{asset('assets/web_assets/js/jquery.3.2.1.min.js" type="text/javascript')}}"></script>
<script src="{{asset('assets/web_assets/js/bootstrap.min.js" type="text/javascript')}}"></script>

<!--  Charts Plugin -->
<script src="{{asset('assets/web_assets/js/chartist.min.js')}}"></script>

<!--  Notifications Plugin    -->
<script src="{{asset('assets/web_assets/js/bootstrap-notify.js')}}"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="{{asset('assets/web_assets/js/light-bootstrap-dashboard.js?v=1.4.0')}}"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="{{asset('assets/web_assets/js/demo.js')}}"></script>


</html>
