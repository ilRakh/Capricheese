<?php

  include('../../backend/db.php');
  session_start();
  if (empty($_SESSION['active'])) {
      header('location: ../../');
  }

if(isset($_POST['temp'])) {
  $temp = $_POST['temp'];
  $humedad = $_POST['humedad'];
  $co2 = $_POST['co2'];
  $query = "INSERT INTO atmosfera_curado(temperatura, humedad, co2) VALUES ('$temp', '$humedad', '$co2')";
   
  $result = mysqli_query($conn, $query);

  if(!$result){
    die("Query Fail");
  }else{
    echo "Se ha estabilizado la atmosfera con exito";
  }
  
  
}


?>