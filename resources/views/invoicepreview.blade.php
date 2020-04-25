<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
	Nota
	<br>
<table class="table" style="width:100%; border:1px solid gold;">
						<thead>
							<tr>
								<th>Produk </th>
								<th>Nama Produk </th>
								<th>Harga Satuan </th>
								<th>Jumlah </th>
								<th>Total </th> 
							</tr>
						</thead>
						<tbody>
						@foreach ($keranjang as $k)
							<tr>
								<td><img src="https://via.placeholder.com/100x100" alt="#"></td>
								<td>
									<p>{{$k->nama_produk}}</p>
									<p>Maboriosam in a tonto nesciung eget  distingy magndapibus.</p>
								</td>
								<td><span>{{$k->harga_satuan}}</span></td>
								<td>
								1
								</td>
								<td><span>{{$k->sub_total}}</span></td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<div style="float: right;" >
									<ul>
										<li>Sub Total 	 :<span style="font-weight: bold;"> $330.00</span></li>
										<li>Ongkos Kirim :<span style="font-weight: bold;">Free</span></li>
										<li>Pembayaran   :<span style="font-weight: bold;">$310.00</span></li>
									</ul>
									<div>
										<button>Pembayaran Sukses</button>
									</div>
								</div>
</body>
</html>