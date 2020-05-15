<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Warehouse - Nota</title>

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
                        <strong class="mb-2 text-dark"><h3>Nota {{$nota->jenis_faktur}}</h3></strong>
                        <div class="input-group">
                          <div class="button-group">
                            <a class="btn btn-outline-dark" role="button" href="{{url('produk')}}"><i class="fa fa-plus "></i> Produk</a>
                            <a class="btn btn-success" href="{{url('/invoice/admin/preview/' . $nota->id)}}" target="_blank">Preview</a>
                            <a class="btn btn-warning" href="{{url('/invoice/admin/print/'  . $nota->id)}}" target="_blank">Print</a>
                          </div>
                        </div>
                    </div>

                    <table class="table">
                      <tr>
                          <th>Nomor</th>
                          <td>{{$nota->id}}</td>
                      </tr>
                      <tr>
                          <th>Tanggal</th>
                          <td>{{$nota->tgl_nota}}</td>
                      </tr>
                      <tr>
                          <th>Customer</th>
                          <td>{{session('s_id')}} | {{session('s_nama')}}</td>
                      </tr>
                    </table>
                </div>
            </div>

            <hr class="m-0">

            <div class="col-md-12">
                <div class="card bg-light mb-4 shadow-sm h-md-250">
                  <table style="width: 100%" class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $c)
                        <tr>
                            <td>{{$c->produk_id}}</td>
                            <td>{{$c->nama_produk}}</td>
                            <td>Rp.{{$c->harga_satuan}}</td>
                            <td class="text-center">{{$c->kuantitas}}</td>
                            <td class="text-center">{{$c->sub_total}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="4" class="text-right pr-2" style="background: #efefef">Sub Total</td>
                            <td class="text-right" style="background: #efefef">Rp.{{$nota->total}}</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right pr-2">PPN 10%</td>
                            <td class="text-right">Rp.{{$nota->ppn / 100 * $nota->total}}.00</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right pr-2">DISKON 10%</td>
                            <td class="text-right">Rp.{{$nota->diskon / 100 * $nota->total}}.00</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right pr-2">Total Tagihan</td>
                            <td class="text-right">Rp.{{$nota->tagihan}}</td>
                        </tr>
                    </tbody>
                  </table>
                </div>
            </div>

            <div class="col-md-12">
                <p>Pembayaran jatuh tempo dalam 30 hari sejak tanggal faktur.</p>
            </div>

          </div>
      </div>
    </div>
  </div>

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

	