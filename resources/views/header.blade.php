<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>資訊系統後臺</title>
    <!-- Bootstrap Styles-->
    <link href="{{ asset('public/backstage/css/bootstrap.css') }}" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="{{ asset('public/backstage/css/font-awesome.css') }}" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="{{ asset('public/backstage/js/morris/morris-0.4.3.min.css') }}" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="{{ asset('public/backstage/css/custom-styles.css') }}" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.useso.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
        <div class="navbar-header">               
                <a class="navbar-brand" href="index.html">資訊系統</a>
            </div>
            <ul class="nav navbar-top-links navbar-right">        
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> 登出</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    @foreach ($Memnu as $rolelist)                         
                        @if ((int)$rolelist[0]['nav'] == 0 && (int)$rolelist[0]['sort'] == 0)                            
                            <li>
                                <a class="active-menu" href="{{ $rolelist[0]['item'] }}"><i class="{{ $rolelist[0]['icon'] }}"></i> {{ $rolelist[0]['name'] }}</a>
                            </li>
                        @elseif ((int)$rolelist[0]['nav'] == 0 && (int)$rolelist[0]['sort'] == 1)
                            <li>
                                <a href="{{ $rolelist[0]['item'] }}"><i class="{{ $rolelist[0]['icon'] }}"></i> {{ $rolelist[0]['name'] }}<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                        @elseif ((int)$rolelist[0]['nav'] != 0 &&(int) $rolelist[0]['sort'] == 0)
                            <li>
                                <a href="{{ $rolelist[0]['item'] }}">{{ $rolelist[0]['name'] }}</a>
                            </li>
                        @elseif ((int)$rolelist[0]['nav'] != 0 && (int)$rolelist[0]['sort'] == 1)
                             <li>
                                <a href="{{ $rolelist[0]['item'] }}">{{ $rolelist[0]['name'] }}</a>
                            </li>
                            </ul> </li>
                        @endif                             
                    @endforeach
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            @yield('content')
        </div> <!--內容 End -->
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="{{ asset('public/backstage/js/jquery-1.10.2.js') }}"></script>
    <!-- Bootstrap Js -->
    <script src="{{ asset('public/backstage/js/bootstrap.min.js') }}"></script>
    <!-- Metis Menu Js -->
    <script src="{{ asset('public/backstage/js/jquery.metisMenu.js') }}"></script>
    <!-- Morris Chart Js -->
    <script src="{{ asset('public/backstage/js/morris/raphael-2.1.0.min.js') }}"></script>
    <script src="{{ asset('public/backstage/js/morris/morris.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('public/backstage/js/custom-scripts.js') }}"></script>


</body>

</html>