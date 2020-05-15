$(document).ready(function() {

    $.ajax({
        url:"/api/laporan/laporanTransaksi",
        type:"GET",
        dataType:"JSON",
        success : function(result){

            console.log(result);

            var data=[];
                for(var i=0; i<result.length; i++){
                    data[i] = parseInt(result[i]['jumlah']);
                }

            // if($('#grafikfaktur').lenght){
                $("#grafikfaktur").length;
                var date = new Date();
                Highcharts.chart('grafikfaktur',{
                    chart: {
                        type: "column"
                    },
                    title: {
                        text: "Grafik Jumlah Faktur Tahun " +date.getFullYear()
                    },
                    subtitle: {
                        text:"ClubStore"
                    },
                    xAxis: {
                        categories: [
                            'Faktur Penjualan', 'Faktur Pembelian'
                        ],
                        crosshair: true
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Jumlah Faktur'
                        }
                    },
                    plotOptions:{
                        column: {
                            pointPadding:0.2,
                            borderWidth: 0
                        }
                    },
                    series: [
                        {
                            name: 'Faktur',
                            data: data
                        }
                    ]
                });
            // }
        }
    });
});