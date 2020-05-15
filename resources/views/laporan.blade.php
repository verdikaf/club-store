<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Warehouse - Supplier</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{url('/assets/library/bootstrap/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{url('/assets/library/bootstrap/css/simple-sidebar.css')}}">
  <link rel="stylesheet" href="{{url('/assets/css/css-extras.css')}}">
  <link rel="stylesheet" href="{{url('https://code.highcharts.com/8.1.0/css/highcharts.css')}}">
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
                    <strong class="d-inline-block mb-2 text-dark">
                      <div class="title text-dark">Laporan.</div>
                    </strong>
                    </div>

                  <div class="col-md-12" style="margin:auto; margin-top:0px; padding-bottom:20px">
                      <div class="card">
                          <div class="card-header bg-dark" style="color:#fff;width:100%">
                              Jumlah Faktur
                          </div>
                          <div class="card-body">
                              <div id="grafikfaktur" style="height: 400px;"></div>
                          </div>
                      </div>
                  </div>
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
  <script src="{{url('/assets/library/bootstrap/js/bundle/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url('/assets/library/fontawesome/js/fontawesome.min.js')}}"></script>

  <script src="{{url('https://code.highcharts.com/highcharts.js')}}"></script>
  
  <script src="{{url('/assets/js/dashboard.js')}}"></script>




  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
