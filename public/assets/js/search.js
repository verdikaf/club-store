$(document).ready(function () {
    $("#search-product").keydown(function (e) {
        $.ajax({
            header: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "http://localhost:8000/transaksi/api/search-product",
            type: "POST",
            data: { keyword: $(this).val() },
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
                        "<a href='/transaksi/cart?produkId=" +
                        val.id +
                        "' type='button' class='btn btn-warning btn-sm'>RESTOCK</a>" +
                        "</td>" +
                        "</tr>";
                });

                $("#list-produk").html($theme);
            },
        });
    });
});
