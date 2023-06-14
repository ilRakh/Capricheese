<?php

include('../../backend/db.php');

session_start();
if (empty($_SESSION['active'])) {
    header('location: ../../');
}

if(isset($_POST['id'])) {
  $id = mysqli_real_escape_string($conn, $_POST['id']);

  $query = "SELECT * from leches WHERE id_leche = '$id'";

  $result = mysqli_query($conn, $query);
  if(!$result) {
    die('Query Failed'. mysqli_error($conn));
  }

  $json = array();
  while($row = mysqli_fetch_array($result)) {
    $json[] = array(
      'id_leche' => $row['id_leche'],
      'litros' => $row['litros'],
      'temp' => $row['temperatura'],
      'calidad' => $row['calidad'],
      'tambo' => $row['tambo'],

    );
  }
  $jsonstring = json_encode($json[0]);
  echo $jsonstring;
}

?>