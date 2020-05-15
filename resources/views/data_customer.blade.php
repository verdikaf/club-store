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
 
      <!-- ./card-body -->

      <?php $no = 0;?>
            @foreach($data as $u)

      <div class="col-md-12">
        <div class="card text-white bg-dark mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
                <?php $no++ ;?>
               <strong class="d-inline-block mb-2 text-white"><h3>{{ $no }}</h3></strong>
            </div>

            <div class="card-footer">
              <div class="row">
                <div class="col-md-6 col-6">
                  <div class="row mb-4">
                    <div class="col-md-12">
                    
                            <ul>
                                 <li>
                                      <th>Nama : </th> &nbsp;
                                      <td>{{ $u->nama }}</td>
                                  </li>
                                  <li>
                                      <th>Telepon : </th>
                                      <td>{{ $u->telp }}</td>
                                  </li>
                                  <li>
                                      <th>Email : </th>
                                      <td>{{ $u->email }}</td>
                                  </li>  
                                  <li>
                                      <th>Alamat : </th>
                                      <td>{{ $u->alamat_lengkap }},</td>
                                      <td>{{ $u->kecamatan }},</td>
                                      <td>{{ $u->kota }}</td>
                                  </li> 
                                  <li>
                                      <th>KodePos : </th>
                                      <td>{{ $u->kode_pos }}</td>
                                  </li>                                                    
                              </ul>    
                      </div>
                    
                  </div>
                </div>
              </div>
              
            </div>
          </div>  
      </div>
      @endforeach
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
