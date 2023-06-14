<?php

  include('../../backend/db.php');
  session_start();
  if (empty($_SESSION['active'])) {
      header('location: ../../');
  }

if(isset($_POST['idTanda'])) {
  $tanda = $_POST['idTanda'];
  $tipoCurado = $_POST['idTipoCurado'];
  $pesoTanda = $_POST['pesoTanda'];

  $query = "INSERT INTO quesos_curados(tanda, tipo_curado, calidad, distribuido) VALUES ('$tanda', '$tipoCurado', 0, 0)";
  $result = mysqli_query($conn, $query);
  $query_two = "UPDATE curado SET capacidad = capacidad + '$pesoTanda'";
  $result_two = mysqli_query($conn, $query_two);
  $query_three = "UPDATE produccion SET curando = 1 WHERE id_prod = '$tanda'";
  $result_three= mysqli_query($conn, $query_three);

  if(!$result && !$result_two && !$result_three){
    die("Query Fail");
  }else{
    echo "Se ha enviado la tanda al curado";
  }
  
  
}


?>