<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Wallet') }}</title>
    <link rel="icon" type="image/png" href="{{asset('assets/web_assets/img/favicon.ico')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />


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
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet' type='text/css'>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            background: #2E3740;
            color: #435160;
            font-family: "Open Sans", sans-serif;
        }

        h2 {
            color: #6D7781;
            font-family: "Sofia", cursive;
            font-size: 15px;
            font-weight: bold;
            font-size: 3.6em;
            text-align: center;
            margin-bottom: 20px;
        }

        a {
            color: #435160;
            text-decoration: none;
        }

        .login {
            width: 350px;
            position: absolute;
            top: 10%;
            left: 50%;
            margin-left: -175px;
        }

        input[type="text"], input[type="password"] {
            width: 350px;
            padding: 20px 0px;
            background: transparent;
            border: 0;
            border-bottom: 1px solid #435160;
            outline: none;
            color: #6D7781;
            font-size: 16px;
        }
        input[type=checkbox] {
            display: none;
        }

        label {
            display: block;
            position: absolute;
            margin-right: 10px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: transparent;
            content: "";
            transition: all 0.3s ease-in-out;
            cursor: pointer;
            border: 3px solid #435160;
        }

        #agree:checked ~ label[for=agree] {
            background: #435160;
        }

        input[type="submit"] {
            background: #1FCE6D;
            border: 0;
            width: 350px;
            height: 40px;
            border-radius: 3px;
            color: #fff;
            font-size: 12px;
            cursor: pointer;
            transition: background 0.3s ease-in-out;
        }
        input[type="submit"]:hover {
            background: #16aa56;
            animation-name: shake;
        }

        .forgot {
            margin-top: 30px;
            display: block;
            font-size: 11px;
            text-align: center;
            font-weight: bold;
        }
        .forgot:hover {
            margin-top: 30px;
            display: block;
            font-size: 11px;
            text-align: center;
            font-weight: bold;
            color: #6D7781;
        }

        .agree {
            padding: 30px 0px;
            font-size: 12px;
            text-indent: 25px;
            line-height: 15px;
        }

        ::-webkit-input-placeholder {
            color: #435160;
            font-size: 12px;
        }

        .animated {
            animation-fill-mode: both;
            animation-duration: 1s;
        }

        @keyframes shake {
            0%, 100% {
                transform: translateX(0);
            }
            10%, 30%, 50%, 70%, 90% {
                transform: translateX(-10px);
            }
            20%, 40%, 60%, 80% {
                transform: translateX(10px);
            }
        }
        .invalid-feedback{
            color:coral !important;
        }

    </style>
</head>
<body>
    <div id="app">

            <main class="py-4">
                @yield('content')
            </main>
    </div>




</body>

    @yield('modal')

<!--   Core JS Files   -->
<script src="{{asset('assets/web_assets/js/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/web_assets/js/bootstrap.min.js')}}" type="text/javascript"></script>

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
