<?php

  include('../backend/db.php');

  session_start();
  if (empty($_SESSION['active'])) {
      header('location: ../');
  }
  

  $query = "SELECT * FROM quesos_curados WHERE distribuido = 1 ORDER BY id_queso_curado DESC LIMIT 50";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die('Query Failed'. mysqli_error($conn));
  }

  $json = array();
  while($row = mysqli_fetch_array($result)) {
    $json[] = array(
      'calidad' => $row['calidad']
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>