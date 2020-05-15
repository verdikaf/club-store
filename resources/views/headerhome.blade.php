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

	
	<link rel="shortcut icon" href="{{url('/assets/image/Icon/icon.png')}}">

	
	
</head>
<body class="js">
	
	<!-- Header -->
	<header class="header shop">
		<div class="middle-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-12">
						<!-- Logo -->
						<div class="logo">
              			<a class="navbar-brand font-weight-bold" href=""><img src="{{url('/assets/image/Icon/type_co.png')}}" alt=""></a>
						</div>
						<!--/ End Logo -->
						<!-- Search Form -->
						<div class="search-top">
							<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
							<!-- Search Form -->
							<div class="search-top">
								<form class="search-form">
									<input type="text" placeholder="Search here..." name="search">
									<button value="search" type="submit"><i class="ti-search"></i></button>
								</form>
							</div>
							<!--/ End Search Form -->
						</div>
						<!--/ End Search Form -->
						<div class="mobile-nav"></div>
					</div>
					<div class="col-lg-8 col-md-7 col-12">
						<div class="search-bar-top">
							<div class="search-bar">
								
								<select>
								<option>kategori</option>
									@foreach($kategori as $k)
									<option>{{$k->nama}}</option>
									@endforeach
								</select>
								<form action="/cari" method="GET">
									<input id="cari" name= "cari" placeholder="Cari produk disini....." type="text">
									<button  class="btnn"><i class="ti-search"></i></input>
								<form>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-3 col-12">
						<div class="right-bar"> <a href="{{url('/')}}">
							<!-- Search Form -->
							<!-- <div class="sinlge-bar">
								<a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
							</div> -->
							<div class="sinlge-bar">
                            @if(session()->has('s_id'))
								<a href="{{url('/profil')}}" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                            @elseif(session()->has('s_id')== false)
                            <a href="{{url('/login')}}" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                            @endif
							</div>

                            <div class="sinlge-bar shopping">
							@if(session()->has('s_id'))
								<a href="{{url('/keranjang/cart')}}" class="single-icon"><i class="ti-bag" aria-hidden="true"><span class="total-count">{{$cart->jumlah_keranjang}}</span></i></a>
                            @elseif(session()->has('s_id')== false)
                            <a href="{{url('/login')}}" class="single-icon"><i class="ti-bag" aria-hidden="true"></i></a>
                            @endif
                            </div>

                            <div class="sinlge-bar">
							@if(session()->has('s_id'))
								<a href="{{url('/logout')}}" class="single-icon"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                            @endif
								<!-- Shopping Item
								<div class="shopping-item">
									<div class="dropdown-cart-header">
										<span>2 Items</span>
										<a href="#">View Cart</a>
									</div>
									<ul class="shopping-list">
										<li>
											<a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
											<a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
											<h4><a href="#">Woman Ring</a></h4>
											<p class="quantity">1x - <span class="amount">$99.00</span></p>
										</li>
										<li>
											<a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
											<a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
											<h4><a href="#">Woman Necklace</a></h4>
											<p class="quantity">1x - <span class="amount">$35.00</span></p>
										</li>
									</ul>
									<div class="bottom">
										<div class="total">
											<span>Total</span>
											<span class="total-amount">$134.00</span>
										</div>
										<a href="checkout.html" class="btn animate">Checkout</a>
									</div>
								</div>
								/ End Shopping Item -->
							</div>
</a></div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!--/ End Header -->

            <!-- Menu Toggle Script -->
			<script src="{{url('/assets/js/search.js')}}"></script>
    <script>
        $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        });
    </script>