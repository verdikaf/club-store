<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title>ClubStore.com</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="assets/image/supermarket.png">
	<!-- Web Font -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="{{url('/assets/library/fontawesome/css/all.min.css')}}">
	
	<!-- StyleSheet -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="{{url('/assets/usertemplate/css/bootstrap.css')}}">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="{{url('/assets/usertemplate/css/magnific-popup.min.css')}}">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('/assets/usertemplate/css/font-awesome.css')}}">
	<!-- Fancybox -->
	<link rel="stylesheet" href="{{url('/assets/usertemplate/css/jquery.fancybox.min.css')}}">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="{{url('/assets/usertemplate/css/themify-icons.css')}}">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{url('/assets/usertemplate/css/niceselect.css')}}">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="{{url('/assets/usertemplate/css/animate.css')}}">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="{{url('/assets/usertemplate/css/flex-slider.min.css')}}">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="{{url('/assets/usertemplate/css/owl-carousel.css')}}">
	<!-- Slicknav -->
    <link rel="stylesheet" href="{{url('/assets/usertemplate/css/slicknav.min.css')}}">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="{{url('/assets/usertemplate/css/reset.css')}}">
	<link rel="stylesheet" href="{{url('/assets/usertemplate/style.css')}}">
    <link rel="stylesheet" href="{{url('/assets/usertemplate/css/responsive.css')}}">

	
	
</head>
<body class="js" id="wrapper">
@include('headerhome')

	

<!-- Start Trending -->
<div class="product-area section">
            <div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section-title">
							<h2>Produk Item</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="product-info">
							<div class="tab-content" id="myTabContent">
								<!-- Start Single Tab -->
								<div class="tab-pane fade show active" id="man" role="tabpanel">
									<div class="tab-single">
										<div class="row">
											@foreach ($produk as $p)
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
												<div class="product-img">
													<a>
														<img class="default-img" src="{{$p->foto}}" alt="Card image cap" style="width: 150px; height: 150px;">
																			<img class="hover-img" src="{{$p->foto}}" alt="Card image cap" style="width: 150px; height: 150px;">
													</a>
													<div class="button-head">
														<div class="product-action">
															<a title="Quick View" href="{{url('/detail/'.$p->id)}}"><i class=" ti-eye"></i><span>Details</span></a>
														</div>
														<div class="product-action-2">
															@if(session()->has('s_id'))
																<a title="Add to cart" href="{{url('/keranjang/cart?produkId='.$p->id)}}">Masukkan keranjang</a>
															@elseif(session()->has('s_id')== false)
																<a title="Add to cart" href="{{url('/login')}}">Masukkan keranjang</a>
															@endif
															</div>
													</div>
												</div>
													<div class="product-content">
														<h3><a href="{{url('/detail')}}">{{$p->nama}}</a></h3>
														<div class="product-price">
															<span>Rp. {{$p->harga}}</span>
														</div>
													</div>
												</div>
											</div>
											@endforeach
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->
							</div>
						</div>
					</div>
				</div>
            </div>
    </div>
	<!-- End Trending -->
	
	<!-- Start Shop Services Area -->
	<section class="shop-services section home">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>Free shiping</h4>
						<p>Orders over $100</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Free Return</h4>
						<p>Within 30 days returns</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Sucure Payment</h4>
						<p>100% secure payment</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Best Peice</h4>
						<p>Guaranteed price</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Services Area -->


	<!-- Start Footer Area -->
	<footer class="footer">
		<!-- Footer Top -->
		<div class="footer-top section">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer about">
							<div class="logo">
								<h4>ClubStore.com</h4>
							</div>
							<p class="text">Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue,  magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</p>
							<p class="call">Got Question? Call us 24/7<span><a href="tel:123456789">+0123 456 789</a></span></p>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4>Information</h4>
							<ul>
								<li><a href="#">About Us</a></li>
								<li><a href="#">Faq</a></li>
								<li><a href="#">Terms & Conditions</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Help</a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4>Customer Service</h4>
							<ul>
								<li><a href="#">Payment Methods</a></li>
								<li><a href="#">Money-back</a></li>
								<li><a href="#">Returns</a></li>
								<li><a href="#">Shipping</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer social">
							<h4>Get In Tuch</h4>
							<!-- Single Widget -->
							<div class="contact">
								<ul>
									<li>NO. 342 - London Oxford Street.</li>
									<li>012 United Kingdom.</li>
									<li>info@eshop.com</li>
									<li>+032 3456 7890</li>
								</ul>
							</div>
							<!-- End Single Widget -->
							<ul>
								<li><a href="#"><i class="ti-facebook"></i></a></li>
								<li><a href="#"><i class="ti-twitter"></i></a></li>
								<li><a href="#"><i class="ti-flickr"></i></a></li>
								<li><a href="#"><i class="ti-instagram"></i></a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Footer Top -->
		<div class="copyright">
			<div class="container">
				<div class="inner">
					<div class="row">
						<div class="col-lg-6 col-12">
							<div class="left">
								<p>Copyright © 2020 <a href="http://www.wpthemesgrid.com" target="_blank">Wpthemesgrid</a>  -  All Rights Reserved.</p>
							</div>
						</div>
						<div class="col-lg-6 col-12">
							<div class="right">
								<img src="{{url('/assets/usertemplate/images/Payments.png')}}" alt="#">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- /End Footer Area -->
 
	<!-- Jquery -->
    <script src="{{url('/assets/usertemplate/js/jquery.min.js')}}"></script>
    <script src="{{url('/assets/usertemplate/js/jquery-migrate-3.0.0.js')}}"></script>
	<script src="{{url('/assets/usertemplate/js/jquery-ui.min.js')}}"></script>
	<!-- Popper JS -->
	<script src="{{url('/assets/usertemplate/js/popper.min.js')}}"></script>
	<!-- Bootstrap JS -->
	<script src="{{url('/assets/usertemplate/js/bootstrap.min.js')}}"></script>
	<!-- Color JS -->
	<script src="{{url('/assets/usertemplate/js/colors.js')}}"></script>
	<!-- Slicknav JS -->
	<script src="{{url('/assets/usertemplate/js/slicknav.min.js')}}"></script>
	<!-- Owl Carousel JS -->
	<script src="{{url('/assets/usertemplate/js/owl-carousel.js')}}"></script>
	<!-- Magnific Popup JS -->
	<script src="{{url('/assets/usertemplate/js/magnific-popup.js')}}"></script>
	<!-- Waypoints JS -->
	<script src="{{url('/assets/usertemplate/js/waypoints.min.js')}}"></script>
	<!-- Countdown JS -->
	<script src="{{url('/assets/usertemplate/js/finalcountdown.min.js')}}"></script>
	<!-- Nice Select JS -->
	<script src="{{url('/assets/usertemplate/js/nicesellect.js')}}"></script>
	<!-- Flex Slider JS -->
	<script src="{{url('/assets/usertemplate/js/flex-slider.js')}}"></script>
	<!-- ScrollUp JS -->
	<script src="{{url('/assets/usertemplate/js/scrollup.js')}}"></script>
	<!-- Onepage Nav JS -->
	<script src="{{url('/assets/usertemplate/js/onepage-nav.min.js')}}"></script>
	<!-- Easing JS -->
	<script src="{{url('/assets/usertemplate/js/easing.js')}}"></script>
	<!-- Active JS -->
	<script src="{{url('/assets/usertemplate/js/active.js')}}"></script>

	<!-- Menu Toggle Script -->
	<script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
</body>
</html>