<?php
    include('../../backend/db.php');

    session_start();
    if (empty($_SESSION['active'])) {
        header('location: ../../');
    }


    $id= $_POST['id'];
    $estado= $_POST['estado'];

    if ($estado == 1) {
        $query= "UPDATE laboratorio SET   estado= '$estado' WHERE id_fermento = '$id'";
        
    }else{
        $query= "DELETE FROM laboratorio WHERE id_fermento = '$id'";
    }

    $result= mysqli_query($conn, $query);

    if (!$result) {
        die("Query error");
    }{
        echo "Respondido con exito" ;
    }
?>