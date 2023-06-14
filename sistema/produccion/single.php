<?php

include('../../backend/db.php');

session_start();
if (empty($_SESSION['active'])) {
    header('location: ../../');
}

if(isset($_POST['id'])) {
  $id = mysqli_real_escape_string($conn, $_POST['id']);

  $query = "SELECT id_prod, tdq.tipo, litros_leche, lab.peso, lab.calidad, peso_tanda FROM `produccion` INNER JOIN tipos_de_quesos AS tdq INNER JOIN laboratorio AS lab WHERE tipo_queso = tdq.id_tipo AND fermento = lab.id_fermento AND id_prod = '$id'";

  $result = mysqli_query($conn, $query);
  if(!$result) {
    die('Query Failed'. mysqli_error($conn));
  }

  $json = array();
  while($row = mysqli_fetch_array($result)) {
    $json[] = array(
      'id_prod' => $row['id_prod'],
      'tipo' => $row['tipo'],
      'litros' => $row['litros_leche'],
      'peso_fermento' => $row['peso'],
      'calidad_fermento' => $row['calidad'],
      'peso' => $row['peso_tanda']

    );
  }
  $jsonstring = json_encode($json[0]);
  echo $jsonstring;
}

?>