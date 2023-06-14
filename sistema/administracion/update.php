<?php
    include('../../backend/db.php');

    session_start();
    if (empty($_SESSION['active'])) {
        header('location: ../../');
    }


    $id= $_POST['id'];
    $user= $_POST['user'];
    $rol= $_POST['rol'];


    $query= "UPDATE usuarios SET usuario= '$user',  rol= '$rol' WHERE id_user = '$id'";
    $result= mysqli_query($conn, $query);
    
    if (!$result) {
        die("Query error");
    }{
        echo "Usuario editado con exito" ;
    }
?>