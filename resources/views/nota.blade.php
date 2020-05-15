<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Warehouse - Produk</title>

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

      
        <div class="container-fluid" style="padding-top: 15px;">
            <div class="row">

            <div class="col-md-12">
                <div class="card text-white bg-light mb-4 shadow-sm h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="mb-2 text-dark"><h3>KATALOG PRODUK.</h3></strong>
                        <a href="{{url('/transaksi/cart')}}">
                            <span class="badge badge-danger" style="position: absolute; margin-left: -15px; margin-top: -15px">{{$cart->jumlah_keranjang}}</span>
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>

                    <table class="table">
                    <thead class="thead-light">
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">STOK</th>
                        <th scope="col">HARGA</th>
                        <th scope="col">FOTO</th>
                        <th scope="col">KATEGORI</th>
                        <th scope="col">OPSI</th>
                        </tr>
                    </thead>
                    <tbody> 
                
                    
                    @foreach($produk as $p)
                        <tr>
                        
                            <td >{{ $p->id }}</td>
                            <td >{{ $p->nama }}</td>
                            <td >{{ $p->stok }}</td>
                            <td >{{ $p->harga }}</td>
                            <td ><img src="{{$p->foto}}" height="50"></td>
                            <td >{{ $p->kategori }}</td>
                            <td >
                                <a href="{{url('/transaksi/cart?produkId=' . $p->id)}}" type="button" class="btn btn-warning btn-sm">RESTOCK</a>
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

	