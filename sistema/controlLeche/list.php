<?php

  include('../../backend/db.php');

  session_start();
  if (empty($_SESSION['active'])) {
      header('location: ../../');
  }
  $query = "SELECT * FROM leches ORDER BY id_leche DESC";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die('Query Failed'. mysqli_error($conn));
  }

  

  $json = array();
  while($row = mysqli_fetch_array($result)) {

      $json[] = array(
        // De la tabla usuarios
        'id_leche' => $row['id_leche'],
        'estado' => $row['condicion'],
        'obs' => $row['observacion'],
        'indice' => $row['indice_dia']
      );
      

  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>