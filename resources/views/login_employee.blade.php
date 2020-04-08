<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
  


    <link rel="stylesheet" href="{{url('/assets/library/loginlibrary/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('/assets/library/loginlibrary/style.css')}}">
    <script type="text/javascript" src="{{'/assets/library/loginlibrary/bootstrap.min.js' }}"></script>
    <script type="text/javascript" src="{{'/assets/library/loginlibrary/jquery.min.js' }}"></script>
  
    
</head>

<body>

    <div id="login">
    @include('flash-message')

    @yield('content')

        <h3 class="text-center text-white pt-5">CLUB STORE LOGIN</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="{{url('/login/employee/action')}}" method="post">
                        @csrf
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="mail" name="email" id="email" class="form-control" placeholder="Masukkan Email disini" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password disini" requaired>
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="{{url('/register/employee')}}" class="text-info">Register here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
