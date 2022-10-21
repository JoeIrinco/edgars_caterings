<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Admin | Dashboard</title>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

    {{-- <link rel="stylesheet" href="{{ URL::asset('/backend/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}"> --}}
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" type="text/javascript"></script>
 
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">

    <link href="{{url('local/public/admin_assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <script src="{{url('local/public/js/HoldOn.min.js')}}" type="text/javascript"></script>

    <link href="{{url('local/public/css/HoldOn.min.css')}}" rel="stylesheet">


    <link href="{{url('local/public/admin_assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{url('local/public/admin_assets/css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">

    <!-- Gritter -->
    <link href="{{url('local/public/admin_assets/js/plugins/gritter/jquery.gritter.css')}}" rel="stylesheet">

    <link href="{{url('local/public/admin_assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{url('local/public/admin_assets/css/style.css')}}" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <img alt="image" class="rounded-circle" src="{{url('local/public/admin_assets/img/profile_small.jpg')}}"/>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="block m-t-xs font-bold"> Admin</span>
                               
                            </a>
                         
                        </div>
                        <div class="logo-element">
                            A+
                        </div>
                    </li>

                    <li>
                        <a href=""><i class="fa fa-dashboard"></i> <span class="nav-label">Home </span></a>
                    </li>

                    {{-- <li>
                        <a href="#"><i class="fa fa-file"></i> <span class="nav-label">Reservation Request</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="">Catering Services</a></li>
                            <li><a href="">Gown Reservation</a></li>
                        </ul>
                    </li> --}}

                    <li>
                        <a href="{{url('admin/reservation')}}"><i class="fa fa-calendar-check-o "></i> <span class="nav-label">Reservation Request </span></a>
                    </li>
                    <li>
                        <a href="{{url('admin/customers')}}"><i class="fa fa-users"></i> <span class="nav-label">Customer Management </span></a>
                    </li>
                    
                    <li>
                        <a href="{{url('/admin/events/additional')}}"><i class="fa fa-cart-plus"></i> <span class="nav-label">Events Add Ons</span></a>
                    </li>
                    <li>
                        <a href="{{url('/admin/package')}}"><i class="fa fa-bars"></i> <span class="nav-label">Package Menu </span></a>
                    </li>
                  
                    
                           
                        </ul>

                    </div>
                </nav>

                <div id="page-wrapper" class="gray-bg dashbard-1">
                    <div class="row border-bottom">
                        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                            <div class="navbar-header">
                                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                              
                            </div>
                            <ul class="nav navbar-top-links navbar-right">
                                <li style="padding: 20px">
                                    <span class="m-r-sm text-muted welcome-message">Welcome Admin.</span>
                                </li>
                               


                                <li>
                                    <a href="{{url('logout')}}">
                                        <i class="fa fa-sign-out"></i> Log out
                                    </a>
                                </li>
                                <li>
                                    <a class="right-sidebar-toggle">
                                        <i class="fa fa-gears"></i>
                                    </a>
                                </li>
                            </ul>

                        </nav>
                    </div>