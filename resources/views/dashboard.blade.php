<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Warehouse</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{url('/assets/library/bootstrap/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{url('/assets/library/fontawesome/css/fontawesome.css')}}">
  <link rel="stylesheet" href="{{url('/assets/css/sidebar.css')}}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />


</head>

<body>

  <div class="d-flex" id="wrapper">
    
    @include ('sidebar')

    <!-- Page Content -->
    <div id="page-content-wrapper" style="padding: 10px;">
      <div class="container-fluid">
        
        <div class="row">
          <div class="col-md-6">
             <div class="card text-white bg-success flex-md-row mb-4 shadow-sm h-md-250" >
                <div class="card-body d-flex flex-column align-items-start">
                   <strong class="d-inline-block mb-2 text-white"><h3>OREO RED VELVET 136gr</h3></strong>
                   <p class="card-text mb-auto"><h3>Produk Terlaris</h3></p>
                   <a class="btn btn-outline-light btn-sm" role="button" href="#">More Info <i class="fa fa-chevron-right "></i></a>
                </div>
                <img class="card-img-right flex-auto d-none d-lg-block" alt="Thumbnail [200x250]" src="{{url('/assets/image/warehouse/stok_terlaris.jpg')}}" style="width: 200px; height: 250px;">
             </div>
          </div>
          <div class="col-md-6">
          <div class="card text-white bg-danger flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-white"><h3>Sunlight Lemon Tea 600ml</h3></strong>
              <p class="card-text mb-auto"><h3>Stok Menipis</h3></p>
                <a class="btn btn-outline-light btn-sm" role="button" href="#">More Info <i class="fa fa-chevron-right "></i></a>
            </div>
            <img class="card-img-right flex-auto d-none d-lg-block" alt="Thumbnail [200x250]" src="{{url('/assets/image/warehouse/stok_menipis.jpg')}}" style="width: 200px; height: 250px;">
          </div>
          </div>
       </div>
      </div>

      <!-- ./card-body -->

      <div class="col-md-12">
        <div class="card text-white bg-dark mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
               <strong class="d-inline-block mb-2 text-white"><h3>Laporan</h3></strong>
               <a class="btn btn-outline-light btn-sm" role="button" href="#">More Info <i class="fa fa-chevron-right "></i></a>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-md-4 col-4">
                  <div class="description-block border-right">
                    <span class="description-percentage text-success"><i class="fa fa-caret-up"></i> 17%</span>
                    <h5 class="description-header">Rp.600.00.000</h5>
                    <span class="description-text">TOTAL REVENUE</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-warning"><i class="fa fa-caret-left"></i> 0%</span>
                    <h5 class="description-header">Rp.100.000.000</h5>
                    <span class="description-text">TOTAL COST</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-6">
                    <span class="description-percentage text-success"><i class="fa fa-caret-up"></i> 20%</span>
                    <h5 class="description-header">Rp.500.000.000</h5>
                    <span class="description-text">TOTAL PROFIT</span>
                  </div>
                  <!-- /.description-block -->
                </div>
              </div>
              <!-- /.row -->
            </div>
        </div>
     </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

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
