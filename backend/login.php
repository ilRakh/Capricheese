<?php
$alert= "";
session_start();
if(!empty($_SESSION['active'])){
    header('location: sistema/');
}else{
    if (!empty($_POST)) {
        if (empty($_POST['user']) || empty($_POST['pass'])) {
            $alert = "Ingrese un usuario y contraseña";
        }else{
            require_once "db.php";
            $user = mysqli_real_escape_string($conn, $_POST["user"]);
            $pass = md5(mysqli_real_escape_string($conn, $_POST["pass"]));

            $result = mysqli_query($conn, "SELECT * FROM usuarios WHERE usuario= '$user' AND clave= '$pass'");
            mysqli_close($conn);
            $rows = mysqli_num_rows($result);

            if($rows > 0){
                $data = mysqli_fetch_array($result);

                $_SESSION["active"] = true;
                $_SESSION["id_user"] = $data['id_user'];
                $_SESSION["user"] = $data['usuario'];
                $_SESSION["clave"] = $data['clave'];
                $_SESSION["rol"] = $data['rol'];

                
                header('location: ../sistema');

            }else{
                $alert = "Usuario o Contraseña incorrectos";
                session_destroy();
            }
        }
    }
}
echo $alert
?>