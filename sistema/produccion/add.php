<?php

  include('../../backend/db.php');
  session_start();
  if (empty($_SESSION['active'])) {
      header('location: ../../');
  }

if(isset($_POST['queso'])) {
  $tipo = $_POST['queso'];
  $litros = $_POST['litros'];
  $fermento = $_POST['fermento'];
  $peso = $_POST['peso'];

  $query = "INSERT INTO produccion(tipo_queso, litros_leche, fermento, peso_tanda) VALUES ('$tipo', '$litros', '$fermento', '$peso')";
  $result = mysqli_query($conn, $query);
  $query_two = "UPDATE cisterna SET cantidad = cantidad - '$litros'";
  $result_two = mysqli_query($conn, $query_two);

  $query_three = "UPDATE laboratorio SET usado = 1 WHERE id_fermento = '$fermento'";
  $result_three = mysqli_query($conn, $query_three);

  if(!$result && !$result_two && !$result_three){
    die("Query Fail");
  }else{
    echo "Producido con exito";
  }
  
  
}


?>