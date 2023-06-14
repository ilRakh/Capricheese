<?php

  include('../../backend/db.php');

  session_start();
  if (empty($_SESSION['active'])) {
      header('location: ../../');
  }
  $query = "SELECT * FROM atmosfera_curado ORDER BY id_curado DESC LIMIT 1";
  $result = mysqli_query($conn, $query);

  if(!$result) {
    die('Query Failed'. mysqli_error($conn));
  }

  

  $json = array();
  while($row = mysqli_fetch_array($result)) {

      $json[] = array(
        // De la tabla usuarios
        'id_curado' => $row['id_curado'],
        'temp' => $row['temperatura'],
        'humedad' => $row['humedad'],
        'co2' => $row['co2']
      );
      

  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>