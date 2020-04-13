<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Warehouse - Input Product</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{url('/assets/library/bootstrap/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{url('/assets/library/bootstrap/css/simple-sidebar.css')}}">

  <link rel="stylesheet" href="{{url('/assets/library/dropzone-5.7.0/dropzone.min.css')}}">
  <meta name="_token" content="{{csrf_token()}}" />
</head>

<body>
 

  <div class="d-flex" id="wrapper">
   @include('sidebar')
    <!-- Page Content -->
    <div class="container-fluid" style="padding-top: 15px;">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Gambar Produk</h3>
              </div>
              <!-- /.card-header -->
              
              <!-- form start -->
                <div class="card-body">

                @foreach($produk as $p)
                <h4>Nama Produk : {{$p->nama}}</h4>
                <form method="post" action="{{url('/produk/gambar/action')}}" enctype="multipart/form-data" class="dropzone" id="dropzone">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" id="id" name="id" value="{{$p->id}}"><br>
                            </form>
                @endforeach
       
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <a class="btn btn-success" href="/produk">Add Gambar</a>
                </div>
            </div>
  </div>
  
</body>

  <!-- Bootstrap core JavaScript -->
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
  <!-- <script src="{{url('/assets/library/jquery/jquery.js')}}"></script>
  <script src="{{url('/assets/library/bootstrap/js/bundle/bootstrap.js')}}"></script> -->
  <script src="{{url('/assets/library/dropzone-5.7.0/dropzone.min.js')}}"></script>

  <!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
    Dropzone.options.dropzone = {
        maxFilesize: 5,
        renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
            return time + file.name;
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        timeout: 50000,
        addRemoveLinks: true,
        removedfile: function(file) {
            var name = file.upload.filename;
            console.log(name);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                type: 'POST',
                url: '{{ url("produk/gambar/delete") }}',
                data: {
                    filename: name
                },
                success: function(data) {
                    console.log("File has been successfully removed!!");
                },
                error: function(e) {
                    console.log(e);
                }
            });
            var fileRef;
            return (fileRef = file.previewElement) != null ?
                fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },
        success: function(file, response) {
            console.log(response);
        },
        error: function(file, response) {
            return false;
        }
    };
</script>
</html>