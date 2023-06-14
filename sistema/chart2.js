let myChart2;
fetchChart()

function fetchChart() {

    $.ajax({
        type: "GET",
        url: "list-chart-queso.php",
        success: function(response) {
            datosChart = []
            console.log(response)
            const datosCalidad = JSON.parse(response);
            datosCalidad.forEach(datos => {
                datosChart.unshift(parseInt(datos.calidad))


            })
            console.log(datosChart)
            const labels2 = [
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
            ];
            const data2 = {
                labels: labels2,
                datasets: [{
                    label: 'Calidad del Queso Distribuido',
                    backgroundColor: '#198754',
                    borderColor: '#198754',
                    data: datosChart,
                }]
            };

            const config2 = {
                type: 'line',
                data: data2,
                options: {}
            };

            if (myChart2) {
                myChart2.destroy();
            }

            myChart2 = new Chart(
                document.getElementById('myChart2'),
                config2
            );
        }
    });
}