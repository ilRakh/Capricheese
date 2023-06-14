$(document).ready(function() {




    let tempArray = [5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 9, 10, 11, 9, 10, 11, ]
    let humedadArray = [65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90]
    let co2Array = [500, 800, 1100, 1400, 1700, 2000, 2300, 2600, 2900, 3200, 3500, 1400, 1700, 2000, 2300, 1100, 1400, 1700, 2000, 2300]

    indiceTemp = parseInt(Math.random() * ((tempArray.length - 1) - 0) + 0)
    indiceHumedad = parseInt(Math.random() * ((humedadArray.length - 1) - 0) + 0)
    indiceCo2 = parseInt(Math.random() * ((co2Array.length - 1) - 0) + 0)

    temp = tempArray[indiceTemp]
    humedad = humedadArray[indiceHumedad]
    co2 = co2Array[indiceCo2]

    const dataAtmosfera = {
        temp: temp,
        humedad: humedad,
        co2: co2
    }
    $.post('add.php', dataAtmosfera, (response) => {
        console.log(response);
        fetchTemp()
        fetchHumedad()
        fetchCo2()
        fetchTask()



    });

    $("#rangoTemp").change(function() {
        $("#tempText").text("Temperatura: " + $("#rangoTemp").val() + "°")
        fetchTempColors()

    })
    $("#rangoHm").change(function() {
        $("#hmText").text("Humedad: " + $("#rangoHm").val() + "%")
        fetchHmColors()

    })
    $("#rangoCo2").change(function() {
        $("#co2Text").text("CO2: " + $("#rangoCo2").val() + "ppm")
        fetchCo2Colors()

    })

    function fetchTask() {
        $.ajax({
            url: 'get.php',
            type: 'GET',
            success: function(response) {
                let atmosfera = true
                const datosAtmosfera = JSON.parse(response);
                datosAtmosfera.forEach(datos => {
                    if (datos.temp == 15 || datos.temp == 16 ||
                        datos.temp == 17 || datos.temp == 18 ||
                        datos.temp == 19 || datos.temp == 20) {
                        atmosfera = false
                    }
                    if (datos.humedad == 65 || datos.humedad == 66 ||
                        datos.humedad == 67 || datos.humedad == 68 ||
                        datos.humedad == 69 || datos.humedad == 70 ||
                        datos.humedad == 71 || datos.humedad == 72 ||
                        datos.humedad == 73 || datos.humedad == 74 ||
                        datos.humedad == 91 || datos.humedad == 92 ||
                        datos.humedad == 93 || datos.humedad == 94 ||
                        datos.humedad == 95) {
                        atmosfera = false
                    }
                    if (datos.co2 == 500 ||
                        datos.co2 == 800 || datos.co2 == 2600 ||
                        datos.co2 == 2900 || datos.co2 == 3200 ||
                        datos.co2 == 3500) {
                        atmosfera = false
                    }
                    console.log(atmosfera)
                    if (atmosfera == false) {
                        $("#estab").prop("disabled", false)
                        $("#estab").removeClass("btn-success")
                        $("#estab").addClass("btn-danger")
                        $(".bx").removeClass("bx-check")
                        $(".bx").addClass("bx-error")
                        $("#color").removeClass("green")
                        $("#color").addClass("red")
                        $(".state").text("Atmosfera Inestable")
                    } else {
                        $("#estab").prop("disabled", true)
                        $("#estab").attr("data-bs-target", false)
                        $("#estab").removeClass("btn-danger")
                        $("#estab").addClass("btn-success")
                        $(".bx").removeClass("bx-error")
                        $(".bx").addClass("bx-check")
                        $("#color").removeClass("red")
                        $("#color").addClass("green")
                        $(".state").text("Atmosfera Estable")

                    }
                    $("#rangoTemp").val(datos.temp)
                    $("#rangoHm").val(datos.humedad)
                    $("#rangoCo2").val(datos.co2)
                    $("#tempText").text("Temperatura: " + datos.temp + "°")
                    $("#hmText").text("Humedad: " + datos.humedad + "%")
                    $("#co2Text").text("Co2: " + datos.co2 + "ppm")


                })
            }
        })
    }


    function fetchTemp() {
        $.ajax({
            url: 'list.php',
            type: 'GET',
            success: function(response) {
                const datosAtmosfera = JSON.parse(response);
                console.log(datosAtmosfera.length)
                let templateTemp = '';
                datosAtmosfera.forEach(datos => {
                    $("#rangoTemp").val(datos.temp)
                    fetchTempColors()
                    if (datos.temp == 5 || datos.temp == 6 || datos.temp == 7) {
                        templateTemp = `
                        <div class="col-md-1 temp low"></div>
                        <div class="col-md-1 temp any"></div>
                        <div class="col-md-1 temp any"></div>
                        <div class="col-md-1 temp any"></div>
                        <div class="col-md-1 temp any"></div>
                        <h1 class="temp-text">${datos.temp}°</h1>`
                    } else {
                        if (datos.temp == 8 || datos.temp == 9 || datos.temp == 10) {
                            templateTemp = `
                            <div class="col-md-1 temp low"></div>
                            <div class="col-md-1 temp mid-low"></div>
                            <div class="col-md-1 temp any"></div>
                            <div class="col-md-1 temp any"></div>
                            <div class="col-md-1 temp any"></div>
                            <h1 class="temp-text">${datos.temp}°</h1>`
                        } else {
                            if (datos.temp == 11 || datos.temp == 12 || datos.temp == 13 || datos.temp == 14) {
                                templateTemp = `
                                <div class="col-md-1 temp low"></div>
                                <div class="col-md-1 temp mid-low"></div>
                                <div class="col-md-1 temp middle"></div>
                                <div class="col-md-1 temp any"></div>
                                <div class="col-md-1 temp any"></div>
                                <h1 class="temp-text">${datos.temp}°</h1>`
                            } else {
                                if (datos.temp == 15 || datos.temp == 16 || datos.temp == 17) {
                                    templateTemp = `
                                    <div class="col-md-1 temp low"></div>
                                    <div class="col-md-1 temp mid-low"></div>
                                    <div class="col-md-1 temp middle"></div>
                                    <div class="col-md-1 temp mid-high"></div>
                                    <div class="col-md-1 temp any"></div>
                                    <h1 class="temp-text">${datos.temp}°</h1>`
                                } else {
                                    templateTemp = `
                                    <div class="col-md-1 temp low"></div>
                                    <div class="col-md-1 temp mid-low"></div>
                                    <div class="col-md-1 temp middle"></div>
                                    <div class="col-md-1 temp mid-high"></div>
                                    <div class="col-md-1 temp high"></div>
                                    <h1 class="temp-text">${datos.temp}°</h1>`
                                }
                            }
                        }
                    }
                });
                $('#tempTemplate').html(templateTemp);

            }
        });
    }

    function fetchHumedad() {

        $.ajax({
            url: 'list.php',
            type: 'GET',
            success: function(response) {
                const datosAtmosfera = JSON.parse(response);
                console.log(datosAtmosfera.length)
                let templateHm = '';
                datosAtmosfera.forEach(datos => {
                    $("#rangoHm").val(datos.humedad)
                    fetchHmColors()
                    if (datos.humedad == 65 || datos.humedad == 66 || datos.humedad == 67 || datos.humedad == 68 || datos.humedad == 69 || datos.humedad == 70 || datos.humedad == 71 || datos.humedad == 72 || datos.humedad == 73 || datos.humedad == 74) {
                        templateHm = `
                        <div class="col-md-1 humedad low-air"></div>
                        <div class="col-md-1 humedad any"></div>
                        <div class="col-md-1 humedad any"></div>
                        <div class="col-md-1 humedad any"></div>
                        <div class="col-md-1 humedad any"></div>
                        <h1 class="humedad-text">${datos.humedad}%</h1>`
                    } else {
                        if (datos.humedad == 75 || datos.humedad == 76 || datos.humedad == 77 || datos.humedad == 78 || datos.humedad == 79) {
                            templateHm = `
                            <div class="col-md-1 humedad low-air"></div>
                            <div class="col-md-1 humedad mid-low-air"></div>
                            <div class="col-md-1 humedad any"></div>
                            <div class="col-md-1 humedad any"></div>
                            <div class="col-md-1 humedad any"></div>
                            <h1 class="humedad-text">${datos.humedad}%</h1>`
                        } else {
                            if (datos.humedad == 80 || datos.humedad == 81 || datos.humedad == 82 || datos.humedad == 83 || datos.humedad == 84) {
                                templateHm = `
                                <div class="col-md-1 humedad low-air"></div>
                                <div class="col-md-1 humedad mid-low-air"></div>
                                <div class="col-md-1 humedad middle-air"></div>
                                <div class="col-md-1 humedad any"></div>
                                <div class="col-md-1 humedad any"></div>
                                <h1 class="humedad-text">${datos.humedad}%</h1>`
                            } else {
                                if (datos.humedad == 85 || datos.humedad == 86 || datos.humedad == 87 || datos.humedad == 88 || datos.humedad == 89 || datos.humedad == 90) {
                                    templateHm = `
                                    <div class="col-md-1 humedad low-air"></div>
                                    <div class="col-md-1 humedad mid-low-air"></div>
                                    <div class="col-md-1 humedad middle-air"></div>
                                    <div class="col-md-1 humedad mid-high-air"></div>
                                    <div class="col-md-1 humedad any"></div>
                                    <h1 class="humedad-text">${datos.humedad}%</h1>`
                                } else {
                                    templateHm = `
                                    <div class="col-md-1 humedad low-air"></div>
                                    <div class="col-md-1 humedad mid-low-air"></div>
                                    <div class="col-md-1 humedad middle-air"></div>
                                    <div class="col-md-1 humedad mid-high-air"></div>
                                    <div class="col-md-1 humedad high-air"></div>
                                    <h1 class="humedad-text">${datos.humedad}%</h1>`
                                }
                            }
                        }
                    }
                });
                $('#humedadTemplate').html(templateHm);

            }
        });
    }

    function fetchCo2() {

        $.ajax({
            url: 'list.php',
            type: 'GET',
            success: function(response) {
                const datosAtmosfera = JSON.parse(response);
                console.log(datosAtmosfera.length)
                let templateCo2 = '';
                datosAtmosfera.forEach(datos => {
                    $("#rangoCo2").val(datos.co2)
                    fetchCo2Colors()
                    if (datos.co2 == 500 || datos.co2 == 800) {
                        templateCo2 = `
                        <div class="col-md-1 co2 low-air"></div>
                        <div class="col-md-1 co2 any"></div>
                        <div class="col-md-1 co2 any"></div>
                        <div class="col-md-1 co2 any"></div>
                        <div class="col-md-1 co2 any"></div>
                        <h1 class="co2-text">${datos.co2}ppm</h1>`
                    } else {
                        if (datos.co2 == 1100 || datos.co2 == 1400 || datos.co2 == 1700) {
                            templateCo2 = `
                            <div class="col-md-1 co2 low-air"></div>
                            <div class="col-md-1 co2 mid-low-air"></div>
                            <div class="col-md-1 co2 any"></div>
                            <div class="col-md-1 co2 any"></div>
                            <div class="col-md-1 co2 any"></div>
                            <h1 class="co2-text">${datos.co2}ppm</h1>`
                        } else {
                            if (datos.co2 == 2000 || datos.co2 == 2300) {
                                templateCo2 = `
                                <div class="col-md-1 co2 low-air"></div>
                                <div class="col-md-1 co2 mid-low-air"></div>
                                <div class="col-md-1 co2 middle-air"></div>
                                <div class="col-md-1 co2 any"></div>
                                <div class="col-md-1 co2 any"></div>
                                <h1 class="co2-text">${datos.co2}ppm</h1>`
                            } else {
                                if (datos.co2 == 2600 || datos.co2 == 2900) {
                                    templateCo2 = `
                                    <div class="col-md-1 co2 low-air"></div>
                                    <div class="col-md-1 co2 mid-low-air"></div>
                                    <div class="col-md-1 co2 middle-air"></div>
                                    <div class="col-md-1 co2 mid-high-air"></div>
                                    <div class="col-md-1 co2 any"></div>
                                    <h1 class="co2-text">${datos.co2}ppm</h1>`
                                } else {
                                    templateCo2 = `
                                    <div class="col-md-1 co2 low-air"></div>
                                    <div class="col-md-1 co2 mid-low-air"></div>
                                    <div class="col-md-1 co2 middle-air"></div>
                                    <div class="col-md-1 co2 mid-high-air"></div>
                                    <div class="col-md-1 co2 high-air"></div>
                                    <h1 class="co2-text">${datos.co2}ppm</h1>`
                                }
                            }
                        }
                    }
                });
                $('#co2Template').html(templateCo2);

            }
        });
    }

    function fetchTempColors() {

        if ($("#rangoTemp").val() == 5 || $("#rangoTemp").val() == 6 || $("#rangoTemp").val() == 7) {
            $("#rangoTemp").removeClass("mid-low-range")
            $("#rangoTemp").removeClass("middle-range")
            $("#rangoTemp").removeClass("mid-high-range")
            $("#rangoTemp").removeClass("high-range")
            $("#rangoTemp").addClass("low-range")
        } else {
            if ($("#rangoTemp").val() == 8 || $("#rangoTemp").val() == 9 || $("#rangoTemp").val() == 10) {
                $("#rangoTemp").removeClass("low-range")
                $("#rangoTemp").removeClass("middle-range")
                $("#rangoTemp").removeClass("mid-high-range")
                $("#rangoTemp").removeClass("high-range")
                $("#rangoTemp").addClass("mid-low-range")
            } else {
                if ($("#rangoTemp").val() == 11 || $("#rangoTemp").val() == 12 || $("#rangoTemp").val() == 13 || $("#rangoTemp").val() == 14) {
                    $("#rangoTemp").removeClass("low-range")
                    $("#rangoTemp").removeClass("mid-low-range")
                    $("#rangoTemp").removeClass("mid-high-range")
                    $("#rangoTemp").removeClass("high-range")
                    $("#rangoTemp").addClass("middle-range")
                } else {
                    if ($("#rangoTemp").val() == 15 || $("#rangoTemp").val() == 16 || $("#rangoTemp").val() == 17) {
                        $("#rangoTemp").removeClass("low-range")
                        $("#rangoTemp").removeClass("mid-low-range")
                        $("#rangoTemp").removeClass("middle-range")
                        $("#rangoTemp").removeClass("high-range")
                        $("#rangoTemp").addClass("mid-high-range")
                    } else {
                        $("#rangoTemp").removeClass("low-range")
                        $("#rangoTemp").removeClass("mid-low-range")
                        $("#rangoTemp").removeClass("middle-range")
                        $("#rangoTemp").removeClass("mid-high-range")
                        $("#rangoTemp").addClass("high-range")
                    }
                }
            }
        }

    }

    function fetchHmColors() {

        if ($("#rangoHm").val() == 65 || $("#rangoHm").val() == 66 || $("#rangoHm").val() == 67 || $("#rangoHm").val() == 68 || $("#rangoHm").val() == 69 || $("#rangoHm").val() == 70 || $("#rangoHm").val() == 71 || $("#rangoHm").val() == 72 || $("#rangoHm").val() == 73 || $("#rangoHm").val() == 74) {
            $("#rangoHm").removeClass("mid-low-air-range")
            $("#rangoHm").removeClass("middle-air-range")
            $("#rangoHm").removeClass("mid-high-air-range")
            $("#rangoHm").removeClass("high-air-range")
            $("#rangoHm").addClass("low-air-range")
        } else {
            if ($("#rangoHm").val() == 75 || $("#rangoHm").val() == 76 || $("#rangoHm").val() == 77 || $("#rangoHm").val() == 78 || $("#rangoHm").val() == 79) {
                $("#rangoHm").removeClass("low-air-range")
                $("#rangoHm").removeClass("middle-air-range")
                $("#rangoHm").removeClass("mid-high-air-range")
                $("#rangoHm").removeClass("high-air-range")
                $("#rangoHm").addClass("mid-low-air-range")
            } else {
                if ($("#rangoHm").val() == 80 || $("#rangoHm").val() == 81 || $("#rangoHm").val() == 82 || $("#rangoHm").val() == 83 || $("#rangoHm").val() == 84) {
                    $("#rangoHm").removeClass("lowair--range")
                    $("#rangoHm").removeClass("mid-low-air-range")
                    $("#rangoHm").removeClass("mid-high-air-range")
                    $("#rangoHm").removeClass("high-air-range")
                    $("#rangoHm").addClass("middleair--range")
                } else {
                    if ($("#rangoHm").val() == 85 || $("#rangoHm").val() == 86 || $("#rangoHm").val() == 87 || $("#rangoHm").val() == 88 || $("#rangoHm").val() == 89 || $("#rangoHm").val() == 90) {
                        $("#rangoHm").removeClass("low-air-range")
                        $("#rangoHm").removeClass("mid-low-air-range")
                        $("#rangoHm").removeClass("middle-air-range")
                        $("#rangoHm").removeClass("high-air-range")
                        $("#rangoHm").addClass("mid-high-air-range")
                    } else {
                        $("#rangoHm").removeClass("low-air-range")
                        $("#rangoHm").removeClass("mid-low-air-range")
                        $("#rangoHm").removeClass("middle-air-range")
                        $("#rangoHm").removeClass("mid-high-air-range")
                        $("#rangoHm").addClass("high-air-range")
                    }
                }
            }
        }
    }

    function fetchCo2Colors() {

        if ($("#rangoCo2").val() == 500 || $("#rangoCo2").val() == 800) {
            $("#rangoCo2").removeClass("mid-low-air-range")
            $("#rangoCo2").removeClass("middle-air-range")
            $("#rangoCo2").removeClass("mid-high-air-range")
            $("#rangoCo2").removeClass("high-air-range")
            $("#rangoCo2").addClass("low-air-range")
        } else {
            if ($("#rangoCo2").val() == 1100 || $("#rangoCo2").val() == 1400 || $("#rangoCo2").val() == 1700) {
                $("#rangoCo2").removeClass("low-air-range")
                $("#rangoCo2").removeClass("middle-air-range")
                $("#rangoCo2").removeClass("mid-high-air-range")
                $("#rangoCo2").removeClass("high-air-range")
                $("#rangoCo2").addClass("mid-low-air-range")
            } else {
                if ($("#rangoCo2").val() == 2000 || $("#rangoCo2").val() == 2300) {
                    $("#rangoCo2").removeClass("low-air-range")
                    $("#rangoCo2").removeClass("mid-low-air-range")
                    $("#rangoCo2").removeClass("mid-high-air-range")
                    $("#rangoCo2").removeClass("high-air-range")
                    $("#rangoCo2").addClass("middle-air-range")
                } else {
                    if ($("#rangoCo2").val() == 2600 || $("#rangoCo2").val() == 2900) {
                        $("#rangoCo2").removeClass("low-air-range")
                        $("#rangoCo2").removeClass("mid-low-air-range")
                        $("#rangoCo2").removeClass("middle-air-range")
                        $("#rangoCo2").removeClass("high-air-range")
                        $("#rangoCo2").addClass("mid-high-air-range")
                    } else {
                        $("#rangoCo2").removeClass("low-air-range")
                        $("#rangoCo2").removeClass("mid-low-air-range")
                        $("#rangoCo2").removeClass("middle-air-range")
                        $("#rangoCo2").removeClass("mid-high-air-range")
                        $("#rangoCo2").addClass("high-air-range")
                    }
                }
            }
        }
    }

    $("#send-estab").click(function() {
        let atmos = true
        let temp = $("#rangoTemp").val()
        let humedad = $("#rangoHm").val()
        let co2 = $("#rangoCo2").val()

        if ($("#rangoTemp").val() == 15 || $("#rangoTemp").val() == 16 ||
            $("#rangoTemp").val() == 17 || $("#rangoTemp").val() == 18 ||
            $("#rangoTemp").val() == 19 || $("#rangoTemp").val() == 20) {
            atmos = false
        }
        if ($("#rangoHm").val() == 65 || $("#rangoHm").val() == 66 ||
            $("#rangoHm").val() == 67 || $("#rangoHm").val() == 68 ||
            $("#rangoHm").val() == 69 || $("#rangoHm").val() == 70 ||
            $("#rangoHm").val() == 71 || $("#rangoHm").val() == 72 ||
            $("#rangoHm").val() == 73 || $("#rangoHm").val() == 74 ||
            $("#rangoHm").val() == 91 || $("#rangoHm").val() == 92 ||
            $("#rangoHm").val() == 93 || $("#rangoHm").val() == 94 ||
            $("#rangoHm").val() == 95) {
            atmos = false
        }
        if ($("#rangoCo2").val() == 500 ||
            $("#rangoCo2").val() == 800 || $("#rangoCo2").val() == 2600 ||
            $("#rangoCo2").val() == 2900 || $("#rangoCo2").val() == 3200 ||
            $("#rangoCo2").val() == 3500) {
            atmos = false
        }
        if (atmos == false) {
            Swal.fire(
                'Error',
                'Los datos no son apropiados para la atmosfera',
                'error'
            )
        } else {
            const dataAtmosfera = {
                temp: temp,
                humedad: humedad,
                co2: co2
            }
            $.post('add.php', dataAtmosfera, (response) => {
                console.log(response);
                fetchTemp()
                fetchHumedad()
                fetchCo2()
                fetchTask()
                Swal.fire(
                    'Enviado',
                    response,
                    'success'
                )
            });


        }
    })

})