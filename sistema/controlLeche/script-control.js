$(document).ready(function() {

    indiceDia()
    fetchTasks()
    datosCisterna()

    let tempArray = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 1, 2, 3, 4, 5, 6, 1, 2, 3, 4, 5, 6, 1, 2, 3, 4, 5, 6, 1, 2, 3, 4, 5, 6, 7, 8, 9]
    let calidadArray = [1, 2, 3, 4, 5, 3, 4, 5, 3, 4, 5, 4, 5, 4, 5, 4, 5, 4, 5, 4, 5, 4, 5, 4, 5, 4, 5, 4, 5, 4, 5, 4, 5]
    let dias = [" ", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"]
    let tamboArray = [1, 2, 3, 4]
    let indiceTemp
    let indiceCalidad
    let indiceTambo
    let temp
    let calidad
    let tambo
    let indice


    $("#reabastecer").click(function() {
        if ($("#cisterna").val() != "0") {
            Swal.fire(
                'Las cisternas aun tienen leche. No puedes solicitar otro encargo',
                '',
                'error'
            )
        } else {
            indiceTemp = parseInt(Math.random() * ((tempArray.length - 1) - 0) + 0)
            indiceCalidad = parseInt(Math.random() * ((calidadArray.length - 1) - 0) + 0)
            indiceTambo = parseInt(Math.random() * ((tamboArray.length - 1) - 0) + 0)
            temp = tempArray[indiceTemp]
            calidad = calidadArray[indiceCalidad]
            tambo = tamboArray[indiceTambo]
            indice = parseInt($("#indiceDia").val()) + 1
            if (indice > 6) {
                indice = 1
            }
            console.log(temp)
            console.log(calidad)
            console.log(tambo)
            const postDataLeche = {
                temp: temp,
                calidad: calidad,
                tambo: tambo,
                indice: indice
            }

            $.post('add.php', postDataLeche, (response) => {
                console.log(response);
                fetchTasks()
                indiceDia()
                datosCisterna()

            });

        }
    })

    function fetchTasks() {

        $.ajax({
            url: 'list.php',
            type: 'GET',
            success: function(response) {
                const entregas = JSON.parse(response);
                console.log(entregas)
                let template = '';

                entregas.forEach(entrega => {


                    if (entrega.estado == 0) {
                        template += `
                        <div class="alert alert-decline alert-dark" role="alert" attr= "${entrega.id_leche}">
                            <div>${entrega.obs}</div>
    
        
                        </div>
                        `
                    } else {
                        if (entrega.estado == 1) {
                            template += `
                            <div class="alert  alert-accept alert-dark" role="alert" attr= "${entrega.id_leche}">
                                <div>${entrega.obs}</div>
            
                            </div>
                            `

                        } else {
                            template += `
                            <div class="alert alert-dark" role="alert" attr= "${entrega.id_leche}">
                                Nuevo Cargamento
                                <button type="button" id="btn-modal" class="lecheInfo" data-bs-toggle="modal" data-bs-target="#Modal-control">Datos de leche</button>
            
                            </div>
                            `
                        }
                    }




                });
                $('#template').html(template);

            }
        });
    }

    function indiceDia() {

        $.ajax({
            url: 'indice.php',
            type: 'GET',
            success: function(response) {
                const indices = JSON.parse(response);
                console.log(response)

                if (indices.length == 0) {
                    $("#indiceDia").val(0)
                    $(".dia").text("Lunes")
                } else {
                    indices.forEach(indice => {
                        $("#indiceDia").val(indice.indice)
                        $(".dia").text(dias[indice.indice])

                    });

                }
            }
        });
    }

    function datosCisterna() {

        $.ajax({
            url: 'cisterna.php',
            type: 'GET',
            success: function(response) {
                const cisterna = JSON.parse(response);
                console.log(response)

                cisterna.forEach(cantidad => {
                    $("#cisterna").val(cantidad.cantidad)

                });

            }
        });
    }

    $(document).on('click', '.lecheInfo', (e) => {
        let elemento = $(this)[0].activeElement.parentElement;
        let id = $(elemento).attr('attr');
        let stars
        console.log(id)
        $.post('single.php', { id }, (response) => {
            const datosLeche = JSON.parse(response);
            if (datosLeche.calidad == 0) {
                stars = `<i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i>`
            } else {
                if (datosLeche.calidad == 1) {
                    stars = `<i class='bx bxs-star'></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i>`
                } else {
                    if (datosLeche.calidad == 2) {
                        stars = `<i class='bx bxs-star'></i><i class='bx bxs-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i>`
                    } else {
                        if (datosLeche.calidad == 3) {
                            stars = `<i class='bx bxs-star'></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i>`
                        } else {
                            if (datosLeche.calidad == 4) {
                                stars = `<i class='bx bxs-star'></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i><i class='bx bx-star' ></i>`
                            } else {
                                stars = `<i class='bx bxs-star'></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i>`
                            }
                        }
                    }
                }
            }
            $("#litros").html("Litros: " + datosLeche.litros + "Lts")
            $("#tambo").html("Tambo: N°" + datosLeche.tambo)
            $("#temp").html("Temperatura: " + datosLeche.temp + "°C")
            $("#calidad").html("Calidad: " + stars)
            $("#idLeche").val(datosLeche.id_leche)

        });
        e.preventDefault();


    })

    $("#accept").click(function() {
        $(".swal2-confirm").attr("data-bs-dismiss", "modal")
        let id_leche = $("#idLeche").val()
        let obs = "Aceptado"
        let estado = 1
        const dataUpadate = {
            id: id_leche,
            obs: obs,
            estado: estado
        }
        Swal.fire({
            title: '¿Seguro que quieres aceptar?',
            showCancelButton: true,
            confirmButtonText: 'Seguro',
        })
        $(".swal2-confirm").click(function() {
            $("#Modal-control").modal("hide");
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

    $("#decline").click(function() {
        let id_leche = $("#idLeche").val()
        let obs
        let estado = 0

        $("#send-obs").click(function() {
            if ($("#obs").val().length < 4) {
                Swal.fire(
                    '¡Cuidado!',
                    'No puede enviar una observación tan corta',
                    'error'
                )
            } else {
                obs = $("#obs").val()
                const dataUpadate = {
                    id: id_leche,
                    obs: obs,
                    estado: estado
                }
                Swal.fire({
                    title: '¿Seguro que quieres Rechazar?',
                    showCancelButton: true,
                    confirmButtonText: 'Seguro',
                })
                $(".swal2-confirm").click(function() {
                    $("#Modal-control").modal("hide");
                    $("#Modal-control2").modal("hide");
                    $.post("update.php", dataUpadate, (response) => {
                        console.log(response)
                        Swal.fire(
                            'Rechazado con exito',
                            '',
                            'success')
                        fetchTasks()
                    });

                })

            }

        })



    })

})