<?php
    include('../../backend/db.php');

    session_start();
    if (empty($_SESSION['active'])) {
        header('location: ../../');
    }


    $id= $_POST['id'];
    $peso= $_POST['peso'];
    $descartar= $_POST['descartar'];
    $alert= "";

    if ($descartar == 1) {
        $query= "DELETE FROM quesos_curados WHERE id_queso_curado = '$id'";
        $result= mysqli_query($conn, $query);
        $query_two= "UPDATE curado SET capacidad = capacidad - '$peso'";
        $result_two= mysqli_query($conn, $query_two);
        $alert = "Tanda descartada con exito";
    } else {
        $query= "UPDATE quesos_curados SET distribuido= 1 WHERE id_queso_curado = '$id'";
        $result= mysqli_query($conn, $query);
        $query_two= "UPDATE curado SET capacidad = capacidad - '$peso'";
        $result_two= mysqli_query($conn, $query_two);
        $alert = "Tanda distribuida con exito";
    }
    


    if (!$result && !$result_two) {
        die("Query error");
    }{
        echo $alert ;
    }
?>