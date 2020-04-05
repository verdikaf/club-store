$(document).ready(function(){

    $.ajax({
        url : "ecommerce/api/dashboard/laporan-pendapatan",
        type :"GET",
        dataType : "JSON",
        success : function(result){
            console.log(result);

            var data =[];
            data = result;
                for(var i=0; i<result.length; i++){
                data[i] = parseInt(result[i]['total']);
            }
                console.log(data);
            if($('#grafik-pendapatan').length){
                var date = new Date();
                HighCharts.chart('grafik-pendapatan', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Grafik Pendapatan Perusahaan tahun' +date.getFullYear()
                    },
                    subtitle: {
                        text: 'laracms'
                    },
                    xAxis: {
                        categories: [
                            'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Dec'
                        ],
                        crosshair: true
                    },
                    yAxis:{
                        min: 0,
                        title: {
                            text: 'Jumlah Pendapatan'
                        }
                    },
                    plotOptions: {
                        column:{
                            pointPadding: 0.2,
                            borderWidth:0
                        }
                    },
                    series: [
                        {
                            nama: 'Pendapatan',
                            data: data
                        }
                    ]
                });
            }
        }
    });

});