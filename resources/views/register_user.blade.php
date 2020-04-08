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

    <div id="register">
    @include('flash-message')

    @yield('content')

        <h3 class="text-center text-white pt-5">CLUB STORE REGISTER</h3>
        <div class="container">
            <div id="register-row" class="row justify-content-center align-items-center">
                <div id="register-column" class="col-md-6">
                    <div id="register-box" class="col-md-12">
                        <form id="register-form" class="form" action="{{url('/register/action')}}" method="post">
                        @csrf
                            <h3 class="text-center text-info">Register</h3>
                            <div class="form-group">
                                <label for="nama" class="text-info">Nama:</label><br>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama disini" required>
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="mail" name="email" id="email" class="form-control" placeholder="Masukkan Email disini" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password disini" requaired>
                            </div>
                            <div class="form-group">
                                <!-- <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br> -->
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Register">
                            </div>
                            <div id="register-link" class="text-right">
                                <br><h1></h1>
                                <a href="{{url('/login')}}" class="text-info">Sudah punya akun?.Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
