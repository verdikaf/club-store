<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Warehouse - Input Product</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{url('/assets/library/bootstrap/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{url('/assets/library/fontawesome/css/fontawesome.css')}}">
  <link rel="stylesheet" href="{{url('/assets/library/bootstrap/css/simple-sidebar.css')}}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

</head>

<body>
 

  <div class="d-flex" id="wrapper">
    
    
  @include('sidebar')

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <i class="fa fa-bars" id="menu-toggle"></i>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

    <form action="/produk/add/save" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="container-fluid" style="padding-top: 15px;">
            <div class="row">
            <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Insert Produk</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama_produk">Nama</label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" name="nama" id="nama" placeholder="Nama Produk">
                    <label for="stok">Stok</label>
                    <input type="number" class="form-control {{ $errors->has('stok') ? 'is-invalid':'' }}" name="stok" id="stok" placeholder="Stok Produk">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control {{ $errors->has('harga') ? 'is-invalid':'' }}" name="harga" id="harga" placeholder="Harga Produk">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control {{ $errors->has('foto') }}" name="foto" id="foto" placeholder="Foto Produk">

                    <label for="kategori_id">Kategori</label>
                    <!-- <input type="text" class="form-control" name="kategori_id" id="kategori_id" placeholder="Kategori Produk"> -->
                        <select id="kategori_id" class="form-control" name="kategori_id">
                            @foreach($kategori as $k)
                            <option value="{{$k->id}}">{{$k->nama}}</option>
                            @endforeach
                        </select>

                    <label for="supplier_id">Supplier</label>
                    <!-- <input type="text" class="form-control" name="supplier_id" id="supplier_id" placeholder="Supplier Produk"> -->
                    <select id="supplier_id" class="form-control" name="supplier_id">
                            @foreach($supplier as $s)
                            <option value="{{$s->id}}">{{$s->nama}}</option>
                            @endforeach
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Insert</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
        </div>
    </form>
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
