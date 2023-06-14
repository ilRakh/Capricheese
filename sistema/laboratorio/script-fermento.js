$(document).ready(function() {

    fetchTasks()

    let pesoArray = [500, 550, 600, 650, 700, 750, 800, 850, 900, 950, 1000, 700, 750, 800, 850, 900, 950, 700, 750, 800, 850, 900, 950, 700, 750, 800, 850, 900, 950]
    let calidadArray = [1, 2, 3, 4, 5, 3, 4, 5, 3, 4, 5, 4, 5, 4, 5, 4, 5, 4, 5, 4, 5, 4, 5, 4, 5, 4, 5, 4, 5, 4, 5, 4, 5]
    let indicePeso
    let indiceCalidad


    $("#elab").click(function() {
        indicePeso = parseInt(Math.random() * ((pesoArray.length - 1) - 0) + 0)
        indiceCalidad = parseInt(Math.random() * ((calidadArray.length - 1) - 0) + 0)
        peso = pesoArray[indicePeso]
        calidad = calidadArray[indiceCalidad]
        const dataFermento = {
            peso: peso,
            calidad: calidad
        }
        $.post('add.php', dataFermento, (response) => {
            console.log(response);
            fetchTasks()


        });

    })


    function fetchTasks() {

        $.ajax({
            url: 'list.php',
            type: 'GET',
            success: function(response) {
                const fermentos = JSON.parse(response);
                console.log(fermentos.length)
                if (fermentos.length == 12) {
                    $("#elab").prop("disabled", true)
                    $("#elab").text("Hay suficiente fermento")
                } else {
                    $("#elab").prop("disabled", false)
                    $("#elab").text("Elaborar Fermento")
                }
                let template = '';
                let stars
                fermentos.forEach(fermento => {
                    if (fermento.calidad == 0) {
                        stars = `<i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i>`
                    } else {
                        if (fermento.calidad == 1) {
                            stars = `<i class='bx bxs-star'></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i>`
                        } else {
                            if (fermento.calidad == 2) {
                                stars = `<i class='bx bxs-star'></i><i class='bx bxs-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i>`
                            } else {
                                if (fermento.calidad == 3) {
                                    stars = `<i class='bx bxs-star'></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i>`
                                } else {
                                    if (fermento.calidad == 4) {
                                        stars = `<i class='bx bxs-star'></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i><i class='bx bx-star' ></i>`
                                    } else {
                                        stars = `<i class='bx bxs-star'></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i>`
                                    }
                                }
                            }
                        }
                    }
                    if (fermento.estado == 1) {
                        template += `
                        <div class="col-md-3 aceptado">
                            <div class="row item-sec item-sec-text">
                                <h5>Fermento aceptado</h5>
                            </div>
                            <div class="row item-sec item-sec-datos">
                                <h4>Peso: ${fermento.peso}Gr</h4>
                                <h4>Calidad: ${stars}</h4>
                            </div>
                            <div class="row item-sec item-sec-des"
                                <h1>Empaquetado</h1>
                            </div>
                        </div>
                        `
                    } else {
                        template += `
                        <div class="col-md-3">
                            <div class="row item-sec item-sec-text">
                                <h5>Nuevo fermento elaborado</h5>
                            </div>
                            <div class="row item-sec item-sec-datos">
                                <h4>Peso: ${fermento.peso}Gr</h4>
                                <h4>Calidad: ${stars}</h4>
                            </div>
                            <div class="row item-sec item-sec-des" attr= "${fermento.id_fermento}">
                                <div class="col-md-12">
                                    <a href="#" class="accept"><i class='bx bx-check-circle'></i></a>
                                    <a href="#" class="decline"><i class='bx bx-x-circle'></i></a>
                                </div>
                            </div>
                        </div>
                        `
                    }
                });
                $('#card-template').html(template);

            }
        });
    }

    $(document).on('click', '.accept', (e) => {
        console.log("hola")
        let elemento = $(this)[0].activeElement.parentElement.parentElement;
        let id = $(elemento).attr('attr');
        let estado = 1
        const dataUpadate = {
            id: id,
            estado: estado
        }
        Swal.fire({
            title: '¿Seguro que quieres aceptar?',
            showCancelButton: true,
            confirmButtonText: 'Seguro',
        })
        $(".swal2-confirm").click(function() {
            $.post("update.php", dataUpadate, (response) => {
                console.log(response)
                Swal.fire(
                    'Aceptado con exito',
                    '',
                    'success')
                fetchTasks()
            });
        })
    })

    $(document).on('click', '.decline', (e) => {
        let elemento = $(this)[0].activeElement.parentElement.parentElement;
        let id = $(elemento).attr('attr');
        let estado = 0

        const dataUpadate = {
            id: id,
            estado: estado
        }
        Swal.fire({
            title: '¿Seguro que quieres Rechazar?',
            showCancelButton: true,
            confirmButtonText: 'Seguro',
        })
        $(".swal2-confirm").click(function() {
            $.post("update.php", dataUpadate, (response) => {
                console.log(response)
                Swal.fire(
                    'Rechazado con exito',
                    '',
                    'success')
                fetchTasks()
            });
        })
    })
})