$(document).ready(function() {
    fetchCuradoBar()

    $("#first-sec").show()
    $("#second-sec").hide()
    $("#volver").hide()
    $(".back").click(function() {
        $("#volver").hide()
        $("#second-sec").hide()
        $("#first-sec").show()
    })

    let calidadArray = [1, 2, 3, 4, 5, 3, 4, 5, 3, 4, 5, 4, 5, 4, 5, 4, 5, 4, 5, 4, 5, 4, 5, 4, 5, 4, 5, 4, 5, 4, 5, 4, 5]

    function fetchFrescos() {
        $.ajax({
            url: 'list-frescos.php',
            type: 'GET',
            success: function(response) {
                const datosTanda = JSON.parse(response);
                console.log(datosTanda)
                let template = ""
                let calidad = ""
                datosTanda.forEach(dato => {
                    if (dato.tipo_queso == 1) {
                        tipoQueso = "Cheddar"
                    } else {
                        if (dato.tipo_queso == 2) {
                            tipoQueso = "Provolone"
                        } else {
                            if (dato.tipo_queso == 3) {
                                tipoQueso = "Gouda"
                            } else {
                                if (dato.tipo_queso == 4) {
                                    tipoQueso = "Mascarpone"
                                } else {
                                    tipoQueso = "Mozzarella"
                                }
                            }
                        }
                    }
                    if (dato.tipo_curado == 1) {
                        tipoCurado = "Fresco"
                    } else {
                        if (dato.tipo_curado == 2) {
                            tipoCurado = "Tierno"
                        } else {
                            if (dato.tipo_curado == 3) {
                                tipoCurado = "Semicurado"
                            } else {
                                tipoCurado = "Curado"
                            }
                        }
                    }

                    if (dato.calidad == 0) {
                        calidad = `<a href="#" class="control">Controlar calidad</a>`
                    } else {
                        if (dato.calidad == 0) {
                            calidad = `<i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i>`
                        } else {
                            if (dato.calidad == 1) {
                                calidad = `<i class='bx bxs-star'></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i>`
                            } else {
                                if (dato.calidad == 2) {
                                    calidad = `<i class='bx bxs-star'></i><i class='bx bxs-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i>`
                                } else {
                                    if (dato.calidad == 3) {
                                        calidad = `<i class='bx bxs-star'></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i>`
                                    } else {
                                        if (dato.calidad == 4) {
                                            calidad = `<i class='bx bxs-star'></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i><i class='bx bx-star' ></i>`
                                        } else {
                                            calidad = `<i class='bx bxs-star'></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i>`
                                        }
                                    }
                                }
                            }
                        }
                    }

                    template += `
                    <div class="col-md-3">
                        <div class="row item-sec item-sec-text">
                            <h5>Tanda de Quesos ${tipoQueso}</h5>
                        </div>
                        <div class="row item-sec item-sec-datos" attr="${dato.id_curado}" attr2="${dato.tipo_curado}">
                            <h4>Tipo de Curado: ${tipoCurado}</h4>
                            <h4>Peso de la Tanda: ${dato.peso}kg</h4>
                            <h4>Calidad: ${calidad}</h4>
                        </div>
                        <div class="row item-sec item-sec-des" attr="${dato.id_curado}" attr2="${dato.tipo_curado}" attr3="${dato.calidad}" attr4="${dato.peso}">
                            <div class="col-md-12">
                                <button type="button" class="distribuir btn btn-primary">Distribuir</button>
                                <button type="button" class="descartar btn btn-danger">Descartar</button>
                            </div>
                        </div>
                    </div>`
                });
                $("#second-sec").html(template)
                $("#first-sec").hide()
                $("#second-sec").show()
                $("#volver").show()
            }
        });
    }

    function fetchTiernos() {
        $.ajax({
            url: 'list-tiernos.php',
            type: 'GET',
            success: function(response) {
                const datosTanda = JSON.parse(response);
                console.log(datosTanda)
                let template = ""
                datosTanda.forEach(dato => {
                    if (dato.tipo_queso == 1) {
                        tipoQueso = "Cheddar"
                    } else {
                        if (dato.tipo_queso == 2) {
                            tipoQueso = "Provolone"
                        } else {
                            if (dato.tipo_queso == 3) {
                                tipoQueso = "Gouda"
                            } else {
                                if (dato.tipo_queso == 4) {
                                    tipoQueso = "Mascarpone"
                                } else {
                                    tipoQueso = "Mozzarella"
                                }
                            }
                        }
                    }
                    if (dato.tipo_curado == 1) {
                        tipoCurado = "Fresco"
                    } else {
                        if (dato.tipo_curado == 2) {
                            tipoCurado = "Tierno"
                        } else {
                            if (dato.tipo_curado == 3) {
                                tipoCurado = "Semicurado"
                            } else {
                                tipoCurado = "Curado"
                            }
                        }
                    }

                    if (dato.calidad == 0) {
                        calidad = `<a href="#" class="control">Controlar calidad</a>`
                    } else {
                        if (dato.calidad == 0) {
                            calidad = `<i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i>`
                        } else {
                            if (dato.calidad == 1) {
                                calidad = `<i class='bx bxs-star'></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i>`
                            } else {
                                if (dato.calidad == 2) {
                                    calidad = `<i class='bx bxs-star'></i><i class='bx bxs-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i>`
                                } else {
                                    if (dato.calidad == 3) {
                                        calidad = `<i class='bx bxs-star'></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i>`
                                    } else {
                                        if (dato.calidad == 4) {
                                            calidad = `<i class='bx bxs-star'></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i><i class='bx bx-star' ></i>`
                                        } else {
                                            calidad = `<i class='bx bxs-star'></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i>`
                                        }
                                    }
                                }
                            }
                        }
                    }

                    template += `
                    <div class="col-md-3">
                        <div class="row item-sec item-sec-text">
                            <h5>Tanda de Quesos ${tipoQueso}</h5>
                        </div>
                        <div class="row item-sec item-sec-datos" attr="${dato.id_curado}" attr2="${dato.tipo_curado}">
                            <h4>Tipo de Curado: ${tipoCurado}</h4>
                            <h4>Peso de la Tanda: ${dato.peso}kg</h4>
                            <h4>Calidad: ${calidad}</h4>
                        </div>
                        <div class="row item-sec item-sec-des" attr="${dato.id_curado}" attr2="${dato.tipo_curado}" attr3="${dato.calidad}" attr4="${dato.peso}">
                            <div class="col-md-12">
                                <button type="button" class="distribuir btn btn-primary">Distribuir</button>
                                <button type="button" class="descartar btn btn-danger">Descartar</button>
                            </div>
                        </div>
                    </div>`
                });
                $("#second-sec").html(template)
                $("#first-sec").hide()
                $("#second-sec").show()
                $("#volver").show()
            }
        });
    }

    function fetchSemi() {
        $.ajax({
            url: 'list-semi.php',
            type: 'GET',
            success: function(response) {
                const datosTanda = JSON.parse(response);
                console.log(datosTanda)
                let template = ""
                datosTanda.forEach(dato => {
                    if (dato.tipo_queso == 1) {
                        tipoQueso = "Cheddar"
                    } else {
                        if (dato.tipo_queso == 2) {
                            tipoQueso = "Provolone"
                        } else {
                            if (dato.tipo_queso == 3) {
                                tipoQueso = "Gouda"
                            } else {
                                if (dato.tipo_queso == 4) {
                                    tipoQueso = "Mascarpone"
                                } else {
                                    tipoQueso = "Mozzarella"
                                }
                            }
                        }
                    }
                    if (dato.tipo_curado == 1) {
                        tipoCurado = "Fresco"
                    } else {
                        if (dato.tipo_curado == 2) {
                            tipoCurado = "Tierno"
                        } else {
                            if (dato.tipo_curado == 3) {
                                tipoCurado = "Semicurado"
                            } else {
                                tipoCurado = "Curado"
                            }
                        }
                    }

                    if (dato.calidad == 0) {
                        calidad = `<a href="#" class="control">Controlar calidad</a>`
                    } else {
                        if (dato.calidad == 0) {
                            calidad = `<i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i>`
                        } else {
                            if (dato.calidad == 1) {
                                calidad = `<i class='bx bxs-star'></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i>`
                            } else {
                                if (dato.calidad == 2) {
                                    calidad = `<i class='bx bxs-star'></i><i class='bx bxs-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i>`
                                } else {
                                    if (dato.calidad == 3) {
                                        calidad = `<i class='bx bxs-star'></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i>`
                                    } else {
                                        if (dato.calidad == 4) {
                                            calidad = `<i class='bx bxs-star'></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i><i class='bx bx-star' ></i>`
                                        } else {
                                            calidad = `<i class='bx bxs-star'></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i>`
                                        }
                                    }
                                }
                            }
                        }
                    }

                    template += `
                    <div class="col-md-3">
                        <div class="row item-sec item-sec-text">
                            <h5>Tanda de Quesos ${tipoQueso}</h5>
                        </div>
                        <div class="row item-sec item-sec-datos" attr="${dato.id_curado}" attr2="${dato.tipo_curado}">
                            <h4>Tipo de Curado: ${tipoCurado}</h4>
                            <h4>Peso de la Tanda: ${dato.peso}kg</h4>
                            <h4>Calidad: ${calidad}</h4>
                        </div>
                        <div class="row item-sec item-sec-des" attr="${dato.id_curado}" attr2="${dato.tipo_curado}" attr3="${dato.calidad}" attr4="${dato.peso}">
                            <div class="col-md-12">
                                <button type="button" class="distribuir btn btn-primary">Distribuir</button>
                                <button type="button" class="descartar btn btn-danger">Descartar</button>
                            </div>
                        </div>
                    </div>`
                });
                $("#second-sec").html(template)
                $("#first-sec").hide()
                $("#second-sec").show()
                $("#volver").show()
            }
        });
    }

    function fetchCurados() {
        $.ajax({
            url: 'list-curados.php',
            type: 'GET',
            success: function(response) {
                const datosTanda = JSON.parse(response);
                console.log(datosTanda)
                let template = ""
                datosTanda.forEach(dato => {
                    if (dato.tipo_queso == 1) {
                        tipoQueso = "Cheddar"
                    } else {
                        if (dato.tipo_queso == 2) {
                            tipoQueso = "Provolone"
                        } else {
                            if (dato.tipo_queso == 3) {
                                tipoQueso = "Gouda"
                            } else {
                                if (dato.tipo_queso == 4) {
                                    tipoQueso = "Mascarpone"
                                } else {
                                    tipoQueso = "Mozzarella"
                                }
                            }
                        }
                    }
                    if (dato.tipo_curado == 1) {
                        tipoCurado = "Fresco"
                    } else {
                        if (dato.tipo_curado == 2) {
                            tipoCurado = "Tierno"
                        } else {
                            if (dato.tipo_curado == 3) {
                                tipoCurado = "Semicurado"
                            } else {
                                tipoCurado = "Curado"
                            }
                        }
                    }

                    if (dato.calidad == 0) {
                        calidad = `<a href="#" class="control">Controlar calidad</a>`
                    } else {
                        if (dato.calidad == 0) {
                            calidad = `<i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i>`
                        } else {
                            if (dato.calidad == 1) {
                                calidad = `<i class='bx bxs-star'></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i>`
                            } else {
                                if (dato.calidad == 2) {
                                    calidad = `<i class='bx bxs-star'></i><i class='bx bxs-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i>`
                                } else {
                                    if (dato.calidad == 3) {
                                        calidad = `<i class='bx bxs-star'></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i><i class='bx bx-star' ></i><i class='bx bx-star' ></i>`
                                    } else {
                                        if (dato.calidad == 4) {
                                            calidad = `<i class='bx bxs-star'></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i><i class='bx bx-star' ></i>`
                                        } else {
                                            calidad = `<i class='bx bxs-star'></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i><i class='bx bxs-star' ></i>`
                                        }
                                    }
                                }
                            }
                        }
                    }

                    template += `
                    <div class="col-md-3">
                        <div class="row item-sec item-sec-text">
                            <h5>Tanda de Quesos ${tipoQueso}</h5>
                        </div>
                        <div class="row item-sec item-sec-datos" attr="${dato.id_curado}" attr2="${dato.tipo_curado}">
                            <h4>Tipo de Curado: ${tipoCurado}}</h4>
                            <h4>Peso de la Tanda: ${dato.peso}kg</h4>
                            <h4>Calidad: ${calidad}</h4>
                        </div>
                        <div class="row item-sec item-sec-des" attr="${dato.id_curado}" attr2="${dato.tipo_curado}" attr3="${dato.calidad}" attr4="${dato.peso}">
                            <div class="col-md-12">
                                <button type="button" class="distribuir btn btn-primary">Distribuir</button>
                                <button type="button" class="descartar btn btn-danger">Descartar</button>
                            </div>
                        </div>
                    </div>`
                });
                $("#second-sec").html(template)
                $("#first-sec").hide()
                $("#second-sec").show()
                $("#volver").show()
            }
        });
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

    $(".fresco").click(function() {
        fetchFrescos()
    })
    $(".tierno").click(function() {
        fetchTiernos()
    })
    $(".semicurado").click(function() {
        fetchSemi()
    })
    $(".curado").click(function() {
        fetchCurados()
    })

    $(document).on('click', '.distribuir', (e) => {
        let elemento = $(this)[0].activeElement.parentElement.parentElement;
        let id = $(elemento).attr('attr');
        let tipoCurado = $(elemento).attr('attr2');
        let calidad = $(elemento).attr('attr3');
        let peso = $(elemento).attr('attr4');
        let descartar = 0
        console.log(tipoCurado)

        if (calidad == 0) {
            Swal.fire(
                'Error',
                "No has hecho el control de calidad aun",
                'error'
            )
        } else {
            const dataUpadate = {
                id: id,
                peso: peso,
                descartar: descartar
            }
            Swal.fire({
                title: '¿Seguro que quieres solicitar la distribucion de esta tanda?',
                showCancelButton: true,
                confirmButtonText: 'Seguro',
            })
            $(".swal2-confirm").click(function() {
                $.post("update.php", dataUpadate, (response) => {
                    console.log(response)
                    console.log(tipoCurado)
                    Swal.fire(
                        'Distribuido',
                        response,
                        'success'
                    )
                    if (tipoCurado == 1) {
                        fetchFrescos()
                    } else {
                        if (tipoCurado == 2) {
                            fetchTiernos()
                        } else {
                            if (tipoCurado == 3) {
                                fetchSemi()
                            } else {
                                fetchCurados()
                            }
                        }
                    }
                });
            })

        }

    })
    $(document).on('click', '.descartar', (e) => {
        let elemento = $(this)[0].activeElement.parentElement.parentElement;
        let id = $(elemento).attr('attr');
        let tipoCurado = $(elemento).attr('attr2');
        let calidad = $(elemento).attr('attr3');
        let peso = $(elemento).attr('attr4');
        let descartar = 1
        console.log(tipoCurado)

        if (calidad == 0) {
            Swal.fire(
                'Error',
                "No has hecho el control de calidad aun",
                'error'
            )
        } else {
            const dataUpadate = {
                id: id,
                peso: peso,
                descartar: descartar
            }
            Swal.fire({
                title: '¿Seguro que quieres descartar esta tanda?',
                showCancelButton: true,
                confirmButtonText: 'Seguro',
            })
            $(".swal2-confirm").click(function() {
                $.post("update.php", dataUpadate, (response) => {
                    console.log(response)
                    console.log(tipoCurado)
                    Swal.fire(
                        'Descartada',
                        response,
                        'success'
                    )
                    if (tipoCurado == 1) {
                        fetchFrescos()
                    } else {
                        if (tipoCurado == 2) {
                            fetchTiernos()
                        } else {
                            if (tipoCurado == 3) {
                                fetchSemi()
                            } else {
                                fetchCurados()
                            }
                        }
                    }
                });
            })

        }

    })

    $(document).on('click', '.control', (e) => {
        let elemento = $(this)[0].activeElement.parentElement.parentElement;
        let id = $(elemento).attr('attr');
        let tipoCurado = $(elemento).attr('attr2');
        let indiceCalidad = parseInt(Math.random() * ((calidadArray.length - 1) - 0) + 0)
        let calidad = calidadArray[indiceCalidad]

        const dataUpadate = {
            id: id,
            calidad: calidad
        }
        $.post("update_calidad.php", dataUpadate, (response) => {
            console.log(tipoCurado)
            if (tipoCurado == 1) {
                fetchFrescos()
            } else {
                if (tipoCurado == 2) {
                    fetchTiernos()
                } else {
                    if (tipoCurado == 3) {
                        fetchSemi()
                    } else {
                        fetchCurados()
                    }
                }
            }
        });
    })







})