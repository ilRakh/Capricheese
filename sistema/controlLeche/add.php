<?php

  include('../../backend/db.php');
  session_start();
  if (empty($_SESSION['active'])) {
      header('location: ../../');
  }

if(isset($_POST['temp'])) {
  $temp = $_POST['temp'];
  $calidad = $_POST['calidad'];
  $tambo = $_POST['tambo'];
  $indice = $_POST['indice'];
  $litros = 4000;

  if ($indice == 7) {
    $query = "INSERT INTO leches(litros, temperatura, calidad, tambo, indice_dia) VALUES (0, 0, 0, 0, '$indice')";
   
    
    
  }else{
    $query = "INSERT INTO leches(litros, temperatura, calidad, tambo, indice_dia) VALUES ('$litros', '$temp', '$calidad', '$tambo', '$indice')";
    $query_two = "UPDATE cisterna SET cantidad = '$litros'";
  }
  $result = mysqli_query($conn, $query);
  $result_two = mysqli_query($conn, $query_two);

  if(!$result || !$result_two){
    die("Query Fail");
  }else{
    echo "Exito";
  }
  
  
}


?>