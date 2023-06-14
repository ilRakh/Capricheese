<?php

  include('../../backend/db.php');
  session_start();
  if (empty($_SESSION['active'])) {
      header('location: ../../');
  }

if(isset($_POST['calidad'])) {
  $peso = $_POST['peso'];
  $calidad = $_POST['calidad'];
  $query = "INSERT INTO laboratorio(peso, calidad) VALUES ('$peso', '$calidad')";
   
  $result = mysqli_query($conn, $query);

  if(!$result){
    die("Query Fail");
  }else{
    echo "Exito";
  }
  
  
}


?>