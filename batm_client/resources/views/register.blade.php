<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BATM | Register</title>

    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box loginscreen animated fadeInDown" style="padding-top: 100px;max-width: 1000px; width: 400px;">
        <div class="ibox-content">
           <form action="{{ url('/register_form') }}" method="POST">
                {{ csrf_field() }}
                <h3 class="text-center">Register</h3>

                @if (Session::get('register'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>Register Failed</strong>
                </div>
                @endif

                <hr>
                <div class="form-group">
                    <label>Name :</label>
                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label>Email :</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label>Password :</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label>Confirm Password :</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation" required>
                </div>
                <hr>
                <button type="submit" class="btn btn-primary block full-width m-b">Register</button>
            </form>
            <hr>
            <center><strong>Copyright</strong> BATM <small>© 2019</small></center>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('/js/jquery-2.1.1.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>

</body>

</html>
