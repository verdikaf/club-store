<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Warehouse - Update Employee</title>

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

      

    @foreach($user as $u)
    <form action="/user/employee/edit/save" method="post">
    {{ csrf_field() }}
        <div class="container-fluid" style="padding-top: 15px;">
            <div class="row">
            <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Employee</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                <div class="form-group">
                <input type="hidden" name="id" value="{{ $u->id }}">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Employee" value="{{ $u->nama }}"> 
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ $u->email }}">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="{{ $u->password }}"> 
                    <label for="provinsi">Provinsi</label>
                    <input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi" value="{{ $u->provinsi }}">
                    <label for="kota">Kota</label>
                    <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota/Kabupaten" value="{{ $u->kota }}">
                    <label for="kecamatan">Kecamatan</label>
                    <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="{{ $u->kecamatan }}">
                    <label for="kode_pos">Kode Pos</label>
                    <input type="number" class="form-control" name="kode_pos" id="kode_pos" placeholder="kode_pos" value="{{ $u->kode_pos }}">
                    <label for="alamat_lengkap">Alamat</label>
                    <input type="text" class="form-control" name="alamat_lengkap" id="alamat_lengkap" placeholder="Alamat Lengkap" value="{{ $u->alamat_lengkap }}">
                    <!-- <label for="role_id">Role</label>
                    <input type="text" class="form-control" name="role_id" id="role_id" placeholder="Role Employee" value="{{ $u->role_id }}"> -->

                    <label for="role_id">Role</label>
                      <select id="role_id" class="form-control" name="role_id">
                        @foreach($role as $r)
                          <option value="{{$r->id}}">{{$r->nama}}</option>
                        @endforeach
                      </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
        </div>
    </form>
    </div>
    @endforeach

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
