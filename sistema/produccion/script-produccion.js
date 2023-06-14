$(document).ready(function() {
    fetchTasks()
    fetchProgressLeche()
    fetchCuradoBar()

    let litros = 0
    let elegido = 0
    let tipo = 0
    let peso

    $('#leche').change(function() {
        let leche = $(this);
        if (leche.val() != "" && leche.val() != 0) {
            litros = leche.val()
            if (litros == 1000) {
                peso = 80
            } else {
                if (litros == 2000) {
                    peso = 160
                } else {
                    if (litros == 3000) {
                        peso = 240
                    } else {
                        peso = 320
                    }
                }
            }
        } else {
            litros = 0
        }
    })
    $('#fermento').change(function() {
        let fermento = $(this);
        if (fermento.val() != "" && fermento.val() != 0) {
            elegido = fermento.val()
        } else {
            elegido = 0
        }
    })
    $('#tipo-queso').change(function() {
        let queso = $(this);
        if (queso.val() != "" && queso.val() != 0) {
            tipo = queso.val()
        } else {
            tipo = 0
        }
    })


    $("#producir").click(function() {
        if (tipo == "" || tipo == 0 || litros == "" || litros == 0 || elegido == "" || elegido == 0) {
            Swal.fire(
                'Error',
                'Debes seleccionar correctamente los datos',
                'error'
            )
        } else {
            const dataProd = {
                queso: tipo,
                litros: litros,
                fermento: elegido,
                peso: peso
            }
            Swal.fire({
                title: '¿Estas seguro de que quieres producir la tanda?',
                icon: 'question',
                iconHtml: '?',
                confirmButtonText: 'Enviar',
                cancelButtonText: 'Cancelar',
                showCancelButton: true,
                showCloseButton: true
            })
            $('.swal2-confirm').click(function() {
                $.post('add.php', dataProd, (response) => {
                    console.log(response);
                    fetchTasks()
                    fetchCuradoBar()
                    fetchProgressLeche()
                    Swal.fire(
                        'Producido',
                        response,
                        'success'
                    )


                });

            })
        }

    })

    function fetchTasks() {
        $.ajax({
            url: 'list.php',
            type: 'GET',
            success: function(response) {
                console.log(response)
                const tandas = JSON.parse(response);
                console.log(tandas.length)
                let template = '';
                tandas.forEach(tanda => {

                    if (tanda.curando == 0) {
                        template += `
                        <div class="alert alert-info alert-dismissible fade show" role="alert" attr= "${tanda.id_prod}">
                            <strong>Tanda de ${tanda.peso}Kg de Queso ${tanda.tipo}</strong>
                            <button type="button" class="datos-tanda" data-bs-toggle="modal" data-bs-target="#Modal-info"><i class='bx bx-info-circle'></i></button>
                        </div>
                        `

                    } else {
                        template += `
                        <div class="alert alert-info alert-dismissible fade show" role="alert" attr= "${tanda.id_prod}">
                            <strong>Tanda de ${tanda.peso}Kg de Queso ${tanda.tipo} <span>Enviado a Curado</span></strong>
                            
                        </div>
                        `
                    }
                });
                $('#template').html(template);

            }
        });
    }

    $(document).on('click', '.datos-tanda', (e) => {
        let elemento = $(this)[0].activeElement.parentElement;
        let id = $(elemento).attr('attr');
        let stars
        console.log(id)
        $.post('single.php', { id }, (response) => {
            const datosTanda = JSON.parse(response);
            if (datosTanda.calidad == 0) {
                stars = `<i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i>`
            } else {
                if (datosTanda.calidad == 1) {
                    stars = `<i class='bx bxs-star'></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i>`
                } else {
                    if (datosTanda.calidad == 2) {
                        stars = `<i class='bx bxs-star'></i><i class='bx bxs-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i>`
                    } else {
                        if (datosTanda.calidad == 3) {
                            stars = `<i class='bx bxs-star'></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i>`
                        } else {
                            if (datosTanda.calidad == 4) {
                                stars = `<i class='bx bxs-star'></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i><i class='bx bx-star' ></i>`
                            } else {
                                stars = `<i class='bx bxs-star'></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i>`
                            }
                        }
                    }
                }
            }
            $("#id-tanda").val(datosTanda.id_prod)
            $("#peso-tanda-ref").val(datosTanda.peso)
            $("#tipo").html("Tipo de queso: " + datosTanda.tipo)
            $("#litros").html("Litros de leche utilizados: " + datosTanda.litros + "L")
            $("#peso-fermento").html("Peso del fermento: " + datosTanda.peso_fermento + "gr")
            $("#calidad-fermento").html("Calidad del fermento: " + stars)
            $("#peso-tanda").html("Peso de la tanda: " + datosTanda.peso + "kg")
        });
        e.preventDefault();
    })

    function fetchProgressLeche() {
        $.ajax({
            url: 'get-leche.php',
            type: 'GET',
            success: function(response) {
                const cantidadLeche = JSON.parse(response);
                cantidadLeche.forEach(cantidad => {
                    if (cantidad.cantidad == 4000) {
                        $("#progress-leche").prop("style", "width:100%")
                        $("#progress-leche-text").text("Cisternas: 100%")
                    } else {
                        if (cantidad.cantidad == 3000) {
                            $("#progress-leche").prop("style", "width:75%")
                            $("#progress-leche-text").text("Cisternas: 75%")
                        } else {
                            if (cantidad.cantidad == 2000) {
                                $("#progress-leche").prop("style", "width:50%")
                                $("#progress-leche-text").text("Cisternas: 50%")
                            } else {
                                if (cantidad.cantidad == 1000) {
                                    $("#progress-leche").prop("style", "width:25%")
                                    $("#progress-leche-text").text("Cisternas: 25%")
                                } else {
                                    $("#progress-leche").prop("style", "width:0%")
                                    $("#progress-leche-text").text("Cisternas: 0%")
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
                    $("#progress-curado-text").text(`${capacidad.toFixed(2)}%`)


                })
            }
        })
    }

    let idTanda
    let idTipoCurado = 0

    $("#send-curado").click(function() {
        idTanda = $("#id-tanda").val()
        pesoTanda = $("#peso-tanda-ref").val()
    })

    $('#curado').change(function() {
        let curado = $(this);
        if (curado.val() != "" && curado.val() != 0) {
            idTipoCurado = curado.val()
        } else {
            idTipoCurado = 0
        }
    })

    $("#send").click(function() {
        if (idTanda == 0 || idTipoCurado == 0 || pesoTanda == 0) {
            Swal.fire(
                'Error',
                'Debes seleccionar el tipo de curado',
                'error'
            )
        } else {
            const dataCurado = {
                idTanda: idTanda,
                idTipoCurado: idTipoCurado,
                pesoTanda: pesoTanda
            }
            Swal.fire({
                title: '¿Estas seguro de que quieres enviar la tanda al curado?',
                icon: 'question',
                iconHtml: '?',
                confirmButtonText: 'Enviar',
                cancelButtonText: 'Cancelar',
                showCancelButton: true,
                showCloseButton: true
            })
            $('.swal2-confirm').click(function() {
                $.post('add-curado.php', dataCurado, (response) => {
                    $("#Modal-send").modal("hide")
                    $("#Modal-info").modal("hide")
                    console.log(response);
                    fetchTasks()
                    fetchCuradoBar()
                    fetchProgressLeche()
                    Swal.fire(
                        'Enviado',
                        response,
                        'success'
                    )
                });
            })
        }
    })
})