<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSS -->
        <link href="{{ asset('css/bootstrap-theme.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">


        <!-- Custom CSS -->
        <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">
        {{--<link href="{{ asset('css/customer/main.css') }}" rel="stylesheet">--}}

    </head>
    <body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        ADA Dental Clinic
                    </a>
                </li>
                <li>
                    <a href="#"><i class="glyphicon glyphicon-dashboard"></i>&nbsp Dashboard</a>
                </li>
                <li>
                    <a href="#"><i class="glyphicon glyphicon-calendar"></i>&nbsp Appointments</a>
                </li>
                <li>
                    <a href="#"><i class="glyphicon glyphicon-user"></i>&nbsp Doctors</a>
                    <a href="#">
                        <ul>
                            <li>
                                <i class="glyphicon glyphicon-time"></i>&nbsp Doctor Schedules
                            </li>
                        </ul>
                    </a>
                </li>
                <li>
                    <a href="#"><i class="glyphicon glyphicon-heart-empty"></i>&nbsp Nurses</a>
                </li>
                <li>
                    <a href="#"><i class="glyphicon glyphicon-log-out"></i>&nbsp Logout</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->


    <!-- JAVASCRIPT -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

    </body>

    {{--<body>--}}
        {{--@yield('header')--}}

        {{--<div class="container">--}}
            {{--@yield('sidebar')--}}
            {{--@if($error = session('error'))--}}
                {{--<div class="alert alert-danger alert-dismissible fade in" role="alert">--}}
                    {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
                        {{--<span aria-hidden="true">×</span>--}}
                    {{--</button>--}}
                    {{--<strong>{{ $error }}</strong>--}}
                {{--</div>--}}
            {{--@elseif($success = session('success'))--}}
                {{--<div class="alert alert-success alert-dismissible fade in" role="alert">--}}
                    {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
                        {{--<span aria-hidden="true">×</span>--}}
                    {{--</button>--}}
                    {{--<strong>{{ $success }}</strong>--}}
                {{--</div>--}}
            {{--@endif--}}
            {{--@yield('content')--}}
        {{--</div>--}}

        {{--@yield('footer')--}}
        {{--@yield('modal')--}}
        {{--<script src="{{ asset('js/main.js') }}"></script>--}}

        {{--@yield('generalCustomJs')--}}
        {{--@yield('specificCustomJs')--}}
    {{--</body>--}}
</html>