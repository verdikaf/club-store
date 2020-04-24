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
    <div class="page-wrapper bg-gra-03 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
        @include('flash-message')

        @yield('content')
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Club Store Register</h2>
                    <form method="POST" action="{{url('/register/action')}}">
                    @csrf
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Nama</label>
                                    <input class="input--style-4" type="text" name="nama">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Telepon</label>
                                    <input class="input--style-4" type="text" name="telp">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Provinsi</label>
                                    <input class="input--style-4" type="text" name="provinsi">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Kota</label>
                                    <input class="input--style-4" type="text" name="kota">
                                </div>
                            </div>
                        </div>
						  <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Kecamatan</label>
                                    <input class="input--style-4" type="text" name="kecamatan">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Kode Pos</label>
                                    <input class="input--style-4" type="text" name="kode_pos">
                                </div>
                            </div>
                        </div>
						<div class="input-group">
                            <div class="input-group">
                                    <label class="label">Alamat Lengkap</label>
                                    <input class="input--style-4" type="text" name="alamat_lengkap">
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Password</label>
                                    <input class="input--style-4" type="password" name="password">
                                </div>
                            </div>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Register</button>
                            <a class="text-right" href="{{url('/login')}}">Login Here</a>
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
