<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>{{$title}}</title>

    <!-- Icons font CSS-->
    <link href="{{url('/assets/library/loginlibrary/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('assets/library/loginlibrary/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{url('assets/library/loginlibrary/select2.min.css')}}" rel="stylesheet" media="all">
    <!-- <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all"> -->

    <!-- Main CSS-->
    <link href="{{url('assets/library/loginlibrary/main.css')}}" rel="stylesheet" media="all">
</head>

<body>
@include('flash-message')

@yield('content')
    <div class="page-wrapper bg-gra-03 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                <h2 class="title">Club Store Login</h2>
                    <form method="POST" action="{{url('/login/employee/action')}}">
                    @csrf
						<div class="input-group">
                            <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" id="email" type="email" name="email">
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="input-group">
                                    <label class="label">Password</label>
                                    <input class="input--style-4"id="password" type="password" name="password">
                            </div>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="{{url('assets/library/loginlibrary/jquery.min.js')}}"></script>
    <!-- Vendor JS-->
    <script src="{{url('loginlibrary/select2.min.js')}}"></script>
    <!-- <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script> -->

    <!-- Main JS-->
    <script src="{{url('assets/library/loginlibrary/global.js')}}"></script>

</body>
</html>
<!-- end document-->
