<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{url('/assets/library/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('/assets/library/bootstrap/css/simple-sidebar.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

<!-- this is -->

</head>
<body>
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><img src="{{url('/assets/image/warehouse/warehouse logo small.png')}}" alt="WarehouseLogo" style="width: 200px;"></div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action bg-dark" style="color: White;"><img src="vendor/images/user8-128x128.jpg" alt="Users" style="width:30px; border-radius: 20px;"> Jackson D.</a>
        <a href="{{url('/dashboard')}}" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Produk</a>
        <a href="{{url('/supplier/')}}" class="list-group-item list-group-item-action bg-light">Supplier</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Rak</a>
        <a href="{{url('/kategori/')}}" class="list-group-item list-group-item-action bg-light">Kategori</a>
        <a href="{{url('/laporan/')}}" class="list-group-item list-group-item-action bg-light">Laporan</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">About</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

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
