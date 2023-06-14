<?php
    include('../../backend/db.php');

    session_start();
    if (empty($_SESSION['active'])) {
        header('location: ../../');
    }


    $id= $_POST['id'];
    $calidad= $_POST['calidad'];

    $query= "UPDATE quesos_curados SET calidad = '$calidad' WHERE id_queso_curado = '$id'";

    $result= mysqli_query($conn, $query);

    if (!$result) {
        die("Query error");
    }{
        echo "Respondido con exito" ;
    }
?>