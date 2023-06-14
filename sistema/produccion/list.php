<?php

  include('../../backend/db.php');

  session_start();
  if (empty($_SESSION['active'])) {
      header('location: ../../');
  }
  $query = "SELECT id_prod, tdq.tipo, litros_leche, lab.peso, lab.calidad, peso_tanda, curando FROM `produccion` INNER JOIN tipos_de_quesos AS tdq INNER JOIN laboratorio AS lab WHERE tipo_queso = tdq.id_tipo AND fermento = lab.id_fermento ORDER BY id_prod DESC";
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
        'peso' => $row['peso_tanda'],
        'curando' => $row['curando']
      );
      

  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>