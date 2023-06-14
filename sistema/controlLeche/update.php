<?php
    include('../../backend/db.php');

    session_start();
    if (empty($_SESSION['active'])) {
        header('location: ../../');
    }


    $id= $_POST['id'];
    $obs= $_POST['obs'];
    $estado= $_POST['estado'];


    $query= "UPDATE leches SET observacion= '$obs',  condicion= '$estado' WHERE id_leche = '$id'";
    $result= mysqli_query($conn, $query);

    if ($estado == 0) {
        $query_two= "UPDATE cisterna SET cantidad = 0";
        $result_two= mysqli_query($conn, $query_two);

        if (!$result || !$result_two) {
            die("Query error");
        }{
            echo "Respondido con exito" ;
        }
    }else{
        if (!$result) {
            die("Query error");
        }{
            echo "Respondido con exito" ;
        }

    }

?>