$(document).ready(function () {
    $("#search_produk").keydown(function (e) {
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="_token"]').attr("content"),
            },
            url: "/produk/api/search",
            type: "POST",
            data: {
                keyword: $(this).val(),
            },
            success: function (response) {
                console.log(response);

                $theme = "";

                $.each(response, function (key, val) {
                    $theme +=
                        "<div class='col-xl-3 col-lg-4 col-md-4 col-12'>" +
                        "<div class='single-product'>" +
                        "<div class='product-img'>" +
                        "<a>" +
                        "<img class='default-img' src='" +
                        val.foto +
                        "' alt='Card image cap' style='width: 150px; height: 150px;'>" +
                        "<img class='hover-img' src='" +
                        val.foto +
                        "' alt='Card image cap' style='width: 150px; height: 150px;'>" +
                        "</a>" +
                        "<div class='button-head'>" +
                        "<div class='product-action'>" +
                        "<a title='Quick View' href='/detail/'" +
                        val.id +
                        "'><i class='ti-eye'></i><span>Details</span></a>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "<div class='product-content'>" +
                        "<h3><a href='/detail/'" +
                        val.id +
                        "'>" +
                        val.nama +
                        "</a></h3>" +
                        "<div class='product-price'>" +
                        "<span>Rp. " +
                        val.harga +
                        "</span>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "</div>";
                });

                $("#list_produk").html($theme);
            },
        });
    });
});
