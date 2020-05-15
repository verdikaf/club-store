<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Warehouse - Employee</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{url('/assets/library/bootstrap/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{url('/assets/library/bootstrap/css/simple-sidebar.css')}}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

</head>

<body>

  <div class="d-flex" id="wrapper">
    
    
  @include('sidebar')

    <!-- Page Content -->
    <div id="page-content-wrapper">

      
        <div class="container-fluid" style="padding-top: 15px;">
            <div class="row">

            <div class="col-md-12">
                <div class="card text-white bg-light mb-4 shadow-sm h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-dark"><h3>USER - EMPLOYEE.</h3></strong>
                        <a class="btn btn-outline-dark btn-sm" role="button" href="{{url('user/employee/add')}}">Insert <i class="fa fa-plus "></i></a>
                    </div>

                    <table class="table">
                    <thead class="thead-light">
                        <tr>
                        <th scope="col">No</th>
                        <!-- <th scope="col">ID</th> -->
                        <th scope="col">NAMA</th>
                        <th scope="col">TELEPON</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">ALAMAT</th>
                        <th scope="col">OPSI</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    <?php $no = 0;?>
                    @foreach($data as $u)
                    <?php $no++ ;?>
                        <tr>
                            <td >{{ $no }}</td>
                            <!-- <td >{{ $u->id }}</td> -->
                            <td >{{ $u->nama }}</td>
                            <td >{{ $u->telp }}</td>
                            <td >{{ $u->email }}</td>
                            <td >{{ $u->alamat_lengkap }}, {{ $u->kecamatan }}, {{ $u->kota }}, {{ $u->provinsi }}, {{ $u->kode_pos }}</td>
                            <td >
                                <a href="/user/employee/edit/{{ $u->id }}" type="button" class="btn btn-warning btn-sm"><span class="fa fa-pencil" ></a>
                                <!-- <a href="/ecommerce/warehouse/supplier/delete/{{ $u->id }}" type="button" class="btn btn-danger btn-sm"><span class="fa fa-trash"></a> -->
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                </div>
                
                </div>
                    
            </div>

                
            </div>
        </div>
      </div>

  <!-- Bootstrap core JavaScript -->
  <!-- <link rel="stylesheet" href="{{url('/assets/library/jquery.min.js')}}">
  <link rel="stylesheet" href="{{url('/assets/library/fontawesome/css/fontawesome.css')}}">
  <link rel="stylesheet" href="{{url('/assets/library/fontawesome/css/fontawesome.css')}}"> -->
  <script src="{{url('/assets/library/jquery/jquery.js')}}"></script>
  <script src="{{url('/assets/library/jquery/jquery.min.js')}}"></script>
  <script src="{{url('/assets/library/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url('/assets/library/fontawesome/js/fontawesome.min.js')}}"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
