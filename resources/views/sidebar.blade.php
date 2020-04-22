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
    <div class="bg-extras1 border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><img src="{{url('/assets/image/warehouse/warehouse logo small.png')}}" alt="WarehouseLogo" style="width: 200px;"></div>
      <a href="#" style="text-decoration:none; color: white;"> <div class="sidebar-heading"> Jackson D.</div></a>
      <div class="list-group list-group-flush">
        <!-- <a href="#" class="list-group-item list-group-item-action bg-dark" style="color: White;"><img src="#" alt="Users" style="width:30px; border-radius: 20px;"> Jackson D.</a> -->
        <a href="{{url('/dashboard')}}" class="list-group-item list-group-item-action bg-extras1">Dashboard</a>
        <a href="{{url('/produk/')}}" class="list-group-item list-group-item-action bg-extras1">Produk</a>
        <a href="{{url('/supplier/')}}" class="list-group-item list-group-item-action bg-extras1">Supplier</a>
        <a href="{{url('/kategori/')}}" class="list-group-item list-group-item-action bg-extras1">Kategori</a>
        <a href="{{url('/laporan/')}}" class="list-group-item list-group-item-action bg-extras1">Laporan</a>
        <button class="dropdown-btn">Users
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="/user/employee/" class="list-group-item list-group-item-action bg-extras1" >Employee</a>
            <a href="#" class="list-group-item list-group-item-action bg-extras1">Customer</a>
        </div>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <script src="{{url('/assets/library/jquery/jquery.js')}}"></script>
    <script src="{{url('/assets/library/jquery/jquery.min.js')}}"></script>
    <script src="{{url('/assets/library/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('/assets/library/fontawesome/js/fontawesome.min.js')}}"></script>
    <script src="{{url('/assets/library/bootstrap/js/bundle/simple-sidebar.js')}}"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        });
    </script>

</body>
</html>
