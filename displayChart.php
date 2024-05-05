<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Role Distribution</title>
    <script src="https://code.highcharts.com/highcharts.js"></script>
</head>
<body>
    <div id="userChart" style="width:100%; height:400px;"></div>
    <br>
    <br>
    </br>
    </br>
    <div id="productChart" style="width:100%; height:400px;"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            fetch('https://betafactor.maurice.webcup.hodi.host/src/models/chartRequest.php')
            .then(response => response.json())
            .then(data => {
                Highcharts.chart('userChart', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: 'User Role Distribution'
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    accessibility: {
                        point: {
                            valueSuffix: '%'
                        }
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                            }
                        }
                    },
                    series: [{
                        name: 'Roles',
                        colorByPoint: true,
                        data: data.map(item => ({
                            name: item.role,
                            y: parseInt(item.count)
                        }))
                    }]
                });
            });
        });
        
    </script>
</body>
</html>