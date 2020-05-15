<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{public_path()}}/assets/library/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="{{public_path()}}/assets/style.css">
    <link rel="stylesheet" href="{{public_path()}}/assets/library/fontawesome/css/fontawesome.css">
  <link rel="stylesheet" href="{{public_path()}}/assets/library/bootstrap/css/simple-sidebar.css}">
</head>
<body>
<section class="bg-color-0">
        <div class="container">
            <div class="row align-items-center half-screen space">
                <div class="container">
                    <div class="row mb-4">
                        <div class="col-md-10">
                            <h4 class="mb-3 text-capitalize">Nota {{$nota->jenis_faktur}}</h4>
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

                    <div class="row mt-4">
                        <div class="col-md-12">
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
                                        <td class="text-center">Rp.{{$c->sub_total}}</td>
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
                                        <td colspan="4" class="text-right pr-2">Total Tagihan</td>
                                        <td class="text-right">Rp.{{$nota->tagihan}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-12">
                            <p>Pembayaran jatuh tempo dalam 30 hari sejak tanggal faktur.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>