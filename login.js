$('#form').submit(e => {
    e.preventDefault();
    const postData = {
        user: $('#user').val(),
        pass: $('#pass').val()
    };
    $.post('backend/login.php', postData, (response) => {
        console.log(response);
        if (response == "Ingrese un usuario y contraseña" || response == "Usuario o Contraseña incorrectos") {
            Swal.fire(
                '¡Error!',
                response,
                'error'

            )
        } else {
            window.location.href = "sistema/"
        }
    });
});