$(document).ready(function(){

    fetchTasks();
    
    let changeRolAdd = 0
    $('#rol-add').change(function() {
        let rolAdd = $(this);
        if (rolAdd.val() != "" && rolAdd.val() != 0) {
            changeRolAdd = rolAdd.val()
            console.log(changeRolAdd)
        } else {
            changeRolAdd = 0
        }
    })

    $('#add_form').submit(function(e){
        e.preventDefault();
        if (changeRolAdd == 0) {
            Swal.fire(
                'Error',
                'Debes seleccionar un rol',
                'error'
            )
        } else {
            Swal.fire({
                title: '¿Estas seguro de que quieres añadir un nuevo usuario?',
                icon: 'question',
                iconHtml: '?',
                confirmButtonText: 'Enviar',
                cancelButtonText: 'Cancelar',
                showCancelButton: true,
                showCloseButton: true
            })
            $('.swal2-confirm').click(function() {
                const postDataAdd = {
                user: $('#user-add').val(),
                pass: $('#pass-add').val(),
                rol: changeRolAdd
                }
                $.post('add.php', postDataAdd, function(response){
                    fetchTasks();
                    console.log(response)
                    $('#add_form').trigger('reset');
                    Swal.fire(
                        'Añadido',
                        response,
                        'success'
                    )
                });
            
            })

        }
        
    });


    function fetchTasks(){
        $.ajax({
            url: 'list.php',
            type: 'GET',
            success: function(response){
                let registros = JSON.parse(response);
                let template = '';
                let rol
                registros.forEach(registro =>{
                    if (registro.rol == 2) {
                        rol = "Jefe"
                    } else {
                        if (registro.rol == 3) {
                            rol = "Stock"
                        } else {
                            if (registro.rol == 4) {
                                rol = "Control Cisterna"
                            } else {
                                if (registro.rol == 5) {
                                    rol = "Control Curado"
                                } else {
                                    if (registro.rol == 6) {
                                        rol = "Producción"
                                    } else {
                                        if (registro.rol == 6) {
                                            rol = "Producción"
                                        } else {
                                            rol = "Laboratorio"
                                        }
                                    }
                                }
                            }
                        } 
                    } 
                    
                    template += `
                        <tr attr="${registro.id}">
                            <td>${registro.id}</td>
                            <td>${registro.user}</td>
                            <td>${rol}</td>
                            <td>
                                <button type="button" class="delete btn btn-danger">
                                    Eliminar
                                </button>
                                <button type="button" class="update btn btn-info" data-bs-toggle="modal" data-bs-target="#Modal-info">
                                    Editar
                                </button>
                            </td>
    
                        </tr>
                    `
                });
                $('#registros').html(template);
    
            }
        });
    }
    
    
    $(document).on('click', '.delete', function(){
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('attr')
        console.log(id)
        Swal.fire({
            title: '¿Estas seguro de que quieres eliminar este usuario?',
            icon: 'question',
            iconHtml: '?',
            confirmButtonText: 'Enviar',
            cancelButtonText: 'Cancelar',
            showCancelButton: true,
            showCloseButton: true
        })
        $('.swal2-confirm').click(function() {
            $.post('delete.php', { id }, function(response){
                fetchTasks();
                Swal.fire(
                    'Producido',
                    response,
                    'success'
                )
            })

        })

    });
    
    
    $(document).on('click', '.update', function() {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('attr')
        console.log(id)
        $.post('single.php', { id }, function(response) {
            const datos = JSON.parse(response);
            $("#user").val(datos.user)
            $("#id-user").val(datos.id)


            
        })
    })

    let changeRol = 0

    $('#rol').change(function() {
        let rol = $(this);
        if (rol.val() != "" && rol.val() != 0) {
            changeRol = rol.val()
        } else {
            changeRol = 0
        }
    })

    $('#update').click(function(e){
        if (changeRol == 0) {
            Swal.fire(
                'Error',
                'Debes seleccionar un rol',
                'error'
            )
        } else {
            Swal.fire({
                title: '¿Estas seguro de que quieres editar este usuario?',
                icon: 'question',
                iconHtml: '?',
                confirmButtonText: 'Enviar',
                cancelButtonText: 'Cancelar',
                showCancelButton: true,
                showCloseButton: true
            })
            $('.swal2-confirm').click(function() {
                const postData = {
                id: $('#id-user').val(),
                user: $('#user').val(),
                rol: changeRol
                }
                $.post('update.php', postData, function(response){
                    fetchTasks();
                    $("#Modal-info").modal("hide");
                    console.log(response)
                    Swal.fire(
                        'Editado',
                        response,
                        'success'
                    )
                });
                e.preventDefault();
            
            })

        }
    });
})

