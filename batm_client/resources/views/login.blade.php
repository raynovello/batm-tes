<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BATM | Login</title>

    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown" style="padding-top: 100px;">
        <div class="ibox-content">
            <h3>Sign in to start your session</h3>

            @if (Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>Login Success</strong>
            </div>
            @endif

            @if (Session::get('failed'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>Login Failed</strong>
            </div>
            @endif

            @if (Session::get('register'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>Registration Success</strong>
            </div>
            @endif

            @if (Session::get('logout'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>Logout Success</strong>
            </div>
            @endif

            @if (Session::get('warning'))
            <div class="alert alert-warning alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>You're not login</strong>
            </div>
            @endif

            <hr>
            <form action="{{ url('/auth') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Enter Email Address..." required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Sign In</button>
                <a type="button" href="{{ url('/register') }}" class="btn btn-success block full-width m-b">Register</a>
            </form>
            <hr/>
            <center><strong>Copyright</strong> BATM <small>© 2019</small></center>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('/js/jquery-2.1.1.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>

</body>

</html>
