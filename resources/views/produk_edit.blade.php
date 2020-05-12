<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Warehouse - Update Product</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{url('/assets/library/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('/assets/library/fontawesome/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{url('/assets/library/bootstrap/css/simple-sidebar.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{url('/assets/library/dropzone/dropzone.min.css')}}">
  <meta name="_token" content="{{csrf_token()}}" />
</head>

<body>

    <div class="d-flex" id="wrapper">
        @include('sidebar')

        <!-- Page Content -->
        <div id="page-content-wrapper">
            
            <div class="container" style="padding-top: 15px;">
                <div class="row" style=>
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card">
                            @foreach($produk as $p)
                            <form action="/produk/edit/save" method="POST">
                                {{ csrf_field() }}
                                <div class="card-header">
                                    <h3 class="card-title">Update Produk</h3>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                            <input type="hidden" name="id" value="{{$p->id}}">
                                            <label for="nama_produk">Nama</label>
                                            <input type="text" class="form-control" name="nama" id="nama"
                                                placeholder="Nama Produk" value="{{ $p->nama }}">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10" 
                                            placeholder="Deskripsi">{{ $p->deskripsi }}</textarea>
                                            <label for="harga">Harga</label>
                                            <input type="text" class="form-control" name="harga" id="harga"
                                                placeholder="Harga Produk" value="{{ $p->harga }}">


                                            <label for="kategori_id">Kategori</label>
                                            <!-- <input type="text" class="form-control" name="kategori_id" id="kategori_id" placeholder="Kategori Produk"> -->
                                            <select id="kategori_id" class="form-control" name="kategori_id">
                                                @foreach($kategori as $k)
                                                <option value="{{$k->id}}">{{$k->nama}}</option>
                                                @endforeach
                                            </select><br>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                            @endforeach
                        </div><br>
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Preview Foto</h3>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th width="700px" scope="col" style="text-align:center">FOTO</th>
                                                <th scope="col">OPSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($preview as $fp)
                                            <tr>
                                                <form action="/produk/gambar/edit/delete" method="POST" id="delete">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <input type="hidden" name="produk_id" value="{{$fp->produk_id}}">
                                                    <input type="hidden" name="id" value="{{$fp->id}}">
                                                    <input type="hidden" name="path" value="{{$fp->foto}}">

                                                    <td width="650px" scope="col" style="text-align:center">
                                                        <img src="{{$fp->foto}}" height="50">
                                                    </td>

                                                    <td>
                                                        <a href="/produk/gambar/edit/delete/{{$fp->id}}" type="button" form="delete" class="btn btn-danger"><span class="fa fa-trash"></a>
                                                    </td>
                                                </form>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                @foreach($produk as $p)
                                
                                <form method="post" action="{{url('/produk/gambar/action')}}" enctype="multipart/form-data" class="dropzone" id="dropzone">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" id="id" name="id" value="{{$p->id}}"><br>
                                </form>
                                @endforeach
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
        <script src="{{url('/assets/library/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{url('/assets/library/fontawesome/js/fontawesome.min.js')}}"></script>
        <script src="{{url('/assets/library/dropzone/dropzone.min.js')}}"></script>
        <!-- Menu Toggle Script -->
         {{-- <script>
            $("#menu-toggle").click(function (e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
            Dropzone.options.dropzone = {
                maxFilesize: 5,
                renameFile: function (file) {
                    var dt = new Date();
                    var time = dt.getTime();
                    return time + file.name;
                },
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                timeout: 50000,
                addRemoveLinks: true,
                removedfile: function (file) {
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
                        success: function (data) {
                            console.log("File has been successfully removed!!");
                        },
                        error: function (e) {
                            console.log(e);
                        }
                    });
                    var fileRef;
                    return (fileRef = file.previewElement) != null ?
                        fileRef.parentNode.removeChild(file.previewElement) : void 0;
                },
                success: function (file, response) {
                    console.log(response);
                },
                error: function (file, response) {
                    return false;
                }
            };

        </script> --}}

</body>

</html>