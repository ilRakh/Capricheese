<?php

  include('../../backend/db.php');

  session_start();
  if (empty($_SESSION['active'])) {
      header('location: ../../');
  }
  

    $query = "SELECT qc.id_queso_curado, qc.tipo_curado, qc.calidad, p.tipo_queso, p.peso_tanda
              FROM `quesos_curados` AS qc
              INNER JOIN produccion as p
              ON qc.tanda = p.id_prod
              AND qc.tipo_curado = 2
              AND qc.distribuido = 0";
    $result = mysqli_query($conn, $query);
  
    if(!$result) {
      die('Query Failed'. mysqli_error($conn));
    }
  
    
  
    $json = array();
    while($row = mysqli_fetch_array($result)) {
      $json[] = array(
        'id_curado' => $row['id_queso_curado'],
        'tipo_curado' => $row['tipo_curado'],
        'tipo_queso' => $row['tipo_queso'],
        'calidad' => $row['calidad'],
        'peso' => $row['peso_tanda']
      );
    }

  $jsonstring = json_encode($json);
  echo $jsonstring;
?>