<?php

    include('../../backend/db.php');

      session_start();
      if (empty($_SESSION['active'])) {
          header('location: ../../');
      }
    $indice_cero = 0;
    $query = "SELECT MAX(id_leche) AS id FROM leches";
    $result = mysqli_query($conn, $query);
    if(!$result) {
    die('Query Failed'. mysqli_error($conn));
    }

    

    while($row = mysqli_fetch_array($result)) {
        $maxid = $row['id'];
    }       

    $query_two = "SELECT * FROM leches WHERE id_leche = '$maxid'";
    $result_two = mysqli_query($conn, $query_two);

    $json = array();
    while($row_two = mysqli_fetch_array($result_two)) {
        $json[] = array(
            // De la tabla usuarios
            'id_leche' => $row_two['id_leche'],
            'indice' => $row_two['indice_dia']
        );
        
    }   
    $jsonstring = json_encode($json);
    echo $jsonstring;
?>