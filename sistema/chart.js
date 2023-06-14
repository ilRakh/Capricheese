fetchChart()
let myChart;
let datosChart = []

function fetchChart() {

    $.ajax({
        url: 'list-chart-leche.php',
        type: 'POST',
        success: function(response) {
            datosChart = []
            let labelsDias
            console.log(response)
            const datosCalidad = JSON.parse(response);
            datosCalidad.forEach(datos => {
                datosChart.push(parseInt(datos.calidad))
                console.log(datosCalidad)
                if (datosCalidad.length <= 6) {
                    labelsDias = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"]
                } else {
                    if (datos.dia == 1) {
                        labelsDias = ["Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Lunes"]
                    } else {
                        if (datos.dia == 2) {
                            labelsDias = ["Miercoles", "Jueves", "Viernes", "Sabado", "Lunes", "Martes"]
                        } else {
                            if (datos.dia == 3) {
                                labelsDias = ["Jueves", "Viernes", "Sabado", "Lunes", "Martes", "Miercoles"]
                            } else {
                                if (datos.dia == 4) {
                                    labelsDias = ["Viernes", "Sabado", "Lunes", "Martes", "Miercoles", "Jueves"]
                                } else {
                                    if (datos.dia == 5) {
                                        labelsDias = ["Sabado", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes"]
                                    } else {
                                        labelsDias = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"]
                                    }
                                }
                            }
                        }
                    }

                }
            });
            console.log(labelsDias)

            const labels = labelsDias;
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Calidad de la Leche',
                    backgroundColor: '#198754',
                    borderColor: '#198754',
                    data: datosChart.slice(datosChart.length - 6),
                }]
            };

            console.log(data)

            const config = {
                type: 'line',
                data: data,
                options: {}
            };

            if (myChart) {
                myChart.destroy();
            }

            myChart = new Chart(
                document.getElementById('myChart'),
                config
            );



        }
    });
}