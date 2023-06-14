<?php

    include('../../backend/db.php');
    session_start();
    if (empty($_SESSION['active'])) {
        header('location: ../../');
    }
 
    if(isset($_POST['user'])){
        $user = $_POST['user'];
        $pass = md5(mysqli_real_escape_string($conn, $_POST['pass']));
        $rol = $_POST['rol'];
        $query = "INSERT INTO usuarios(usuario, clave, rol) VALUES ('$user', '$pass', '$rol')";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die('Query Error' . mysqli_error($conn));
        }else{
            echo 'Usuario añadido con exito';
        }
    }



?>