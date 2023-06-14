<?php

  include('../../backend/db.php');

  session_start();
  if (empty($_SESSION['active'])) {
      header('location: ../../');
  }
  $query = "SELECT * FROM laboratorio WHERE usado = 0";
  $result = mysqli_query($conn, $query);

  if(!$result) {
    die('Query Failed'. mysqli_error($conn));
  }

  

  $json = array();
  while($row = mysqli_fetch_array($result)) {

      $json[] = array(
        // De la tabla usuarios
        'id_fermento' => $row['id_fermento'],
        'peso' => $row['peso'],
        'calidad' => $row['calidad'],
        'estado' => $row['estado']
      );
      

  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>