<!DOCTYPE html>
<html lang="zxx">
<head>
</head>
<body class="js" id="wrapper">

		<!-- Start Profil -->
		<section class="shop checkout section">
			<div class="container">
				<div class="row"> 
					<div class="col-lg-8 col-12">
						<div class="checkout-form">
							<h2>Nota</h2>
							
							<!-- Form -->
							<!-- <form  class="form">
							<div class="row">
									<div class="col-lg-12 col-md-6 col-12">
										<div class="form-group">
											<label>Name</label>
											<input type="text" value="{{$user->nama}}" name="nama" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Kecamatan</label>
											<input type="text" name="kecamatan" value="{{$user->kecamatan}}" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Kota</label>
											<input type="text" name="kota" value="{{$user->kota}}" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Provinsi<span>*</span></label>
											<input type="text" name="provinsi" value="{{$user->provinsi}}" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Kode Pos<span>*</span></label>
											<input type="text" name="kode_pos" value="{{$user->kode_pos}}" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-12 col-md-6 col-12">
										<div class="form-group">
											<label>Nomer Telepon</label>
											<input type="text" name="telp" value="{{$user->telp}}" placeholder="" required="required">
										</div>
									</div>
								</div>
							</form> -->
							<!--/ End Form -->
						</div>
					</div>
					<div class="col-lg-4 col-12">
						<div class="order-details">
							<!-- Order Widget -->
							<div class="single-widget">
								<h2>Total</h2>
								<div class="content">
									<ul>
										<li>Sub Total<span>$330.00</span></li>
										<li>(+) Ongkos Kirim<span>$10.00</span></li>
										<li class="last">Total<span>$340.00</span></li>
									</ul>
								</div>
							</div>
							<!--/ End Order Widget -->
							<!-- Payment Method Widget -->
							<div class="single-widget payement">
								<div class="content">
									<img src="{{url('/assets/usertemplate/images/payment-method.png')}}" alt="#">
								</div>
							</div>
							<!--/ End Payment Method Widget -->
							<!-- Button Widget -->
							<div class="single-widget get-button">
								<div class="content">
									<div class="button">
										<a href="{{url('/invoice/preview')}}" class="btn">Pembayaran Sukses</a>
									</div>
								</div>
							</div>
							<!--/ End Button Widget -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Checkout -->
</body>
</html>