<?php

  include('../../backend/db.php');

  session_start();
  if (empty($_SESSION['active'])) {
      header('location: ../../');
  }
  $query = "SELECT * FROM curado";
  $result = mysqli_query($conn, $query);

  if(!$result) {
    die('Query Failed'. mysqli_error($conn));
  }

  

  $json = array();
  while($row = mysqli_fetch_array($result)) {

      $json[] = array(
        // De la tabla usuarios
        'capacidad' => $row['capacidad']
      );
      

  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>