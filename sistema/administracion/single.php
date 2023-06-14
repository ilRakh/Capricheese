<?php

include('../../backend/db.php');

session_start();
if (empty($_SESSION['active'])) {
    header('location: ../../');
}

if(isset($_POST['id'])) {
  $id = mysqli_real_escape_string($conn, $_POST['id']);

  $query = "SELECT * FROM usuarios WHERE id_user = '$id'";

  $result = mysqli_query($conn, $query);
  if(!$result) {
    die('Query Failed'. mysqli_error($conn));
  }

  $json = array();
  while($row = mysqli_fetch_array($result)) {
    $json[] = array(
      'user' => $row['usuario'],
      'id' => $row['id_user']

    );
  }
  $jsonstring = json_encode($json[0]);
  echo $jsonstring;
}

?>