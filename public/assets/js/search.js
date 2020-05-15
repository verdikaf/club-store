<<<<<<< HEAD
<<<<<<< HEAD
$(document).ready(function(){

    $('#cari').keydown(function(e) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : "http://localhost:8000/cari",
            type : "POST",
            data : {
                'keyword' : $(this).val()
            },
            success : function(response){
=======
=======
>>>>>>> 1e038de6e9d93ec3685de7a89b57f2b339587cd3
$(document).ready(function () {
    $("#search_produk").keydown(function (e) {
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="_token"]').attr("content"),
            },
            url: "/produk/api/search_produk",
            type: "POST",
            data: {
                keyword: $(this).val(),
            },
            success: function (response) {
<<<<<<< HEAD
>>>>>>> 1e038de6e9d93ec3685de7a89b57f2b339587cd3
=======
>>>>>>> 1e038de6e9d93ec3685de7a89b57f2b339587cd3
                console.log(response);

                $theme = "";

<<<<<<< HEAD
<<<<<<< HEAD
                $.each(response, function(key, val){
                    $theme += "<div class='col-xl-3 col-lg-4 col-md-4 col-12'>" +
                                "<div class='single-product'>" +
                                    "<div class='product-img'>" +
                                    "<a>" +
                                        "<img class='default-img' src='"+ val.thumbnail + "' alt='Card image cap' style='width: 150px; height: 150px;'>" +
                                        "<img class='hover-img' src='"+ val.thumbnail + "' alt='Card image cap' style='width: 150px; height: 150px;'>" +
                                    "</a>" +
                                "<div class='button-head'>"
                            "<div class='product-action'>"
                                "<a title='Quick View' href='/detail/" + val.id + "'><i class=' ti-eye'></i><span>Details</span></a>" +
                            "</div>" +
                            "<div class='product-action-2'>" +
                                "@if(session()->has('s_id'))" +
                                    "<a title='Add to cart' href='/keranjang/cart?produkId=" + val.id + "'>Masukkan keranjang</a>" +
                                "@elseif(session()->has('s_id')== false)" +
                                "<a title='Add to cart' href='/login'>Masukkan keranjang</a>" +
                                "@endif" +
                                "</div>" +
                        "</div>" +
                    "</div>" +
                        "<div class='product-content'>" +
                            "<h3><a href='#'>" + val.nama +"</a></h3>" +
                            "<div class='product-price'>" +
                                "<span>Rp. "+ val.harga + "</span>" +
                            "</div>" +
                        "</div>" +
                    "</div>" +
                "</div> "
                });

                $('#produk_list').html(
                    $theme
                );
            }
        });
    });
});
=======
=======
>>>>>>> 1e038de6e9d93ec3685de7a89b57f2b339587cd3
                $.each(response, function (key, val) {
                    $theme +=
                        "<tr>" +
                        "<td >" +
                        val.id +
                        "</td>" +
                        "<td >" +
                        val.nama +
                        "</td>" +
                        "<td >" +
                        val.deskripsi +
                        "</td>" +
                        "<td >" +
                        val.stok +
                        "</td>" +
                        "<td >" +
                        val.harga +
                        "</td>" +
                        "<td ><img src='" +
                        val.foto +
                        "' height='50'></td>" +
                        "<td >" +
                        val.kategori +
                        "</td>" +
                        "<td >" +
                        "<a href='/produk/edit/" +
                        val.id +
                        "' type='button' class='btn btn-warning btn-sm'><span class='fa fa-pencil' ></a> " +
                        "<a href='/transaksi/cart?produkId=" +
                        val.id +
                        "' type='button' class='btn btn-success btn-sm'><span class='fa fa-cart-plus' ></a>" +
                        "</td>" +
                        "</tr>";
                });

                $("#list_produk").html($theme);
            },
        });
    });
});
<<<<<<< HEAD
>>>>>>> 1e038de6e9d93ec3685de7a89b57f2b339587cd3
=======
>>>>>>> 1e038de6e9d93ec3685de7a89b57f2b339587cd3
