fetchLecheBar()
fetchCuradoBar()

function fetchLecheBar() {
    $.ajax({
        url: 'get-leche.php',
        type: 'GET',
        success: function(response) {
            const cantidadLeche = JSON.parse(response);
            cantidadLeche.forEach(cantidad => {
                if (cantidad.cantidad == 4000) {
                    $("#progress-leche").prop("style", "width:100%")
                    $("#progress-leche-text").text("Cisterna: 100%")
                } else {
                    if (cantidad.cantidad == 3000) {
                        $("#progress-leche").prop("style", "width:75%")
                        $("#progress-leche-text").text("Cisterna: 75%")
                    } else {
                        if (cantidad.cantidad == 2000) {
                            $("#progress-leche").prop("style", "width:50%")
                            $("#progress-leche-text").text("Cisterna: 50%")
                        } else {
                            if (cantidad.cantidad == 1000) {
                                $("#progress-leche").prop("style", "width:25%")
                                $("#progress-leche-text").text("Cisterna: 25%")
                            } else {
                                $("#progress-leche").prop("style", "width:0%")
                                $("#progress-leche-text").text("Cisterna: 0%")
                            }
                        }
                    }
                }
            })
        }
    })
}

function fetchCuradoBar() {
    $.ajax({
        url: 'get-curado.php',
        type: 'GET',
        success: function(response) {
            const capacidadCurado = JSON.parse(response);
            capacidadCurado.forEach(capacidad => {
                capacidad = 100 / (100000 / capacidad.capacidad)

                $("#progress-curado").prop("style", `width: ${capacidad.toFixed(2)}%`)
                $("#progress-curado-text").text(`Almacenamiento en Curado: ${capacidad.toFixed(2)}%`)


            })
        }
    })
}