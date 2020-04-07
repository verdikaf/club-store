<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Warehouse - Update Product</title>

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

      

    @foreach($produk as $p)
    <form action="/produk/edit/save" method="post">
    {{ csrf_field() }}
        <div class="container-fluid" style="padding-top: 15px;">
            <div class="row">
            <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Produk</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                <div class="form-group">
                @foreach ($produk as $p)
                <input type="hidden" name="id" value="{{$p->id}}">
                @endforeach
                    <label for="nama_produk">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Produk" value="{{ $p->nama }}"> 
                    <label for="stok">Stok</label>
                    <input type="number" class="form-control" name="stok" id="stok" placeholder="Stok Produk" value="{{ $p->stok }}">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga Produk" value="{{ $p->harga }}">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control" name="foto" id="foto" placeholder="Foto Produk" value="{{ $p->foto }}">
                  
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
