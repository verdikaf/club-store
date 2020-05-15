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
                console.log(response);

                $theme = "";

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
