<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BATM | Customer</title>

    <link href="{{ asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{ asset('/css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('/css/style.css')}}" rel="stylesheet">
    <!-- Icon -->

</head>

<body >

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" width="48" height="48" src="{{ asset('/img/profil/default.jpg')}}" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Session::get('name') }}</strong></span><span class="text-muted text-xs block">{{ Session::get('email') }}</span></span>
                        </a>
                    </div>
                    <div class="logo-element">
                        <i class="fa fa-globe"></i>
                    </div>
                </li>
                <li class="active">
                    <a href="{{ url('/customer') }}"><i class="fa fa-cubes"></i> <span class="nav-label">Add Customer</span></a>
                </li>
                <li>
                    <a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i> <span class="nav-label">Log out</span></a>
                </li>
            </ul>

        </div>
    </nav>
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Selamat Datang, {{ Session::get('name') }} </span>
                        </li>
                        <li>
                            <a href="{{ url('/logout') }}">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-md-12">                        
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5>Add Customer Form</h5>
                            </div>
                            <div class="ibox-content">
                                @if (Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button> 
                                    <strong>Add Customer Success!</strong>
                                </div>
                                @endif

                                @if (Session::get('email_format'))
                                <div class="alert alert-warning alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button> 
                                    <strong>Email format is invalid!</strong>
                                </div>
                                @endif

                                @if (Session::get('failed'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button> 
                                    <strong>Add Customer Failed!</strong>
                                </div>
                                @endif
                                    
                                <form action="{{ url('/customer_form') }}" method="POST" class="form-horizontal">
                                    <div class="form-group"><label class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-10"><input type="text" name="name" class="form-control" placeholder="Name" required></div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10"><input type="text" name="email" class="form-control" placeholder="Email" required></div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-2 control-label">Phone Number</label>
                                        <div class="col-sm-10"><input type="text" name="phone" class="form-control" placeholder="Phone Number" required></div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-2 control-label">Address</label>
                                        <div class="col-sm-10"><input type="text" name="address" class="form-control" placeholder="Address" required></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <button class="btn btn-white" type="submit">Cancel</button>
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer">
                <div class="pull-right">
                    <strong>{{ (microtime(true) - LARAVEL_START) }} seconds</strong>
                </div>
                <div>
                    <strong>Copyright</strong> BATM &copy; {{ date('Y') }}
                </div>
            </div>

        </div>
    </div>



    <!-- Mainly scripts -->
    <script src="{{ asset('/js/jquery-2.1.1.js')}}"></script>
    <script src="{{ asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{ asset('/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('/js/inspinia.js')}}"></script>
    <script src="{{ asset('/js/plugins/pace/pace.min.js')}}"></script>
    <script src="{{ asset('/js/custom.js')}}"></script>

</body>

</html>