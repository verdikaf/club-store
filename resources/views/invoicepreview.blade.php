<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
	Nota : 
	<form >
											<label>Name</label>
											<input type="text" value="{{$user->nama}}" name="nama" placeholder="" required="required">
											<br>
											<label>Kecamatan</label>
											<input type="text" name="kecamatan" value="{{$user->kecamatan}}" placeholder="" required="required">
											<br>
											<label>Kota</label>
											<input type="text" name="kota" value="{{$user->kota}}" placeholder="" required="required">
											<br>
											<label>Provinsi</label>
											<input type="text" name="provinsi" value="{{$user->provinsi}}" placeholder="" required="required">
											<br>
											<label>Kode Pos</label>
											<input type="text" name="kode_pos" value="{{$user->kode_pos}}" placeholder="" required="required">
											<br>
											<label>Nomer Telepon</label>
											<input type="text" name="telp" value="{{$user->telp}}" placeholder="" required="required">
											<br>
											<label>Alamat Lengkap</label>
											<input type="text" name="alamat_lengkap" value="{{$user->alamat_lengkap}}" placeholder="" required="required">
											<br>
							</form>
	<br>
<table class="table" style="width:100%; border:1px solid gold;">
						<thead>
							<tr>
								<th>Nama Produk </th>
								<th>Harga Satuan </th>
								<th>Jumlah </th>
								<th>Total </th> 
							</tr>
						</thead>
						<tbody>
						@foreach ($nota->cart as $c)
							<tr>
								<td>
									<p>{{$c->nama_produk}}</p>
								</td>
								<td><span>{{$c->harga_satuan}}</span></td>
								<td>
								{{$c->kuantitas}}
								</td>
								<td><span>{{$c->sub_total}}</span></td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<div style="float: right;" >
					<ul>
										<li>Sub Total : <span>Rp. {{$nota_tag->total}}</span></li>		
										<li>Ongkos Kirim : <span>Free</span></li>
										<li>Diskon : <span>Rp. {{$nota_tag->diskon * $nota_tag->total}}.00</span></li>
										<li class="last">Pembayaran : <span>Rp.{{$nota_tag->tagihan}}</span></li>
									</ul>
									<div>
										<button>Pembayaran Sukses</button>
									</div>
								</div>
</body>
</html>