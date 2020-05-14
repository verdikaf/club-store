<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="_token" content="{{ csrf_token() }}">

  <title>Warehouse - Produk</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{url('/assets/library/bootstrap/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{url('/assets/library/fontawesome/css/fontawesome.css')}}">
  <link rel="stylesheet" href="{{url('/assets/library/bootstrap/css/simple-sidebar.css')}}">
  <link rel="stylesheet" href="{{url('/assets/css/css-extras.css')}}">
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
                    <strong class="d-inline-block mb-2 text-dark"><h3>PRODUK.</h3></strong>
                        

                        
                        <div class="input-group">

                          <div class="button-group">
                            <a class="btn btn-outline-dark btn-sm" role="button" href="{{url('produk/add')}}"><i class="fa fa-plus "></i> Insert</a>
                            <a class="btn btn-primary btn-sm" role="button" href="{{url('transaksi/cart')}}"><i class="fa fa-shopping-cart"></i> Pembelian <span class="badge badge-light">4</span></a>
                          </div>
                          <div class="input-group-prepend">
                          <div class="input-group-text"><i class="fa fa-search"></i></div>
                          </div>
                          <input id="search_produk" class="form-control" type="text" name="search-product" placeholder="Search">
                        </div>
                    </div>

                    <table class="table">
                      <thead class="thead-light">
                          <tr>
                          <th scope="col">ID</th>
                          <th scope="col">NAMA</th>
                          <th scope="col">DESKRIPSI</th>
                          <th scope="col">STOK</th>
                          <th scope="col">HARGA</th>
                          <th scope="col">FOTO</th>
                          <th scope="col">KATEGORI</th>
                          <th scope="col">OPSI</th>
                          </tr>
                      </thead>
                      <tbody id="list_produk">
                        @foreach($data as $p)
                          <tr>
                              <td >{{ $p->id }}</td>
                              <td >{{ $p->nama }}</td>
                              <td >{{ $p->deskripsi }}</td>
                              <td >{{ $p->stok }}</td>
                              <td >{{ $p->harga }}</td>
                              <td ><img src="{{$p->foto}}" height="50"></td>
                              <td >{{ $p->kategori }}</td>
                              <td >
                                  <a href="/produk/edit/{{ $p->id }}" type="button" class="btn btn-warning btn-sm"><span class="fa fa-pencil" ></a>
                                  <a href="{{url('/transaksi/cart?produkId=' . $p->id)}}" type="button" class="btn btn-success btn-sm"><span class="fa fa-cart-plus" ></a>
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

  <script src="{{url('/assets/library/jquery/jquery.js')}}"></script>
  <script src="{{url('/assets/library/jquery/jquery.min.js')}}"></script>
  <script src="{{url('/assets/library/fontawesome/js/fontawesome.min.js')}}"></script>
  <script src="{{url('/assets/js/search.js')}}"></script>
  <script src="{{url('/assets/library/bootstrap/js/bundle/bootstrap.bundle.min.js')}}"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>

	