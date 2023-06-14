<?php
    include('../../backend/db.php');
    session_start();
    if (empty($_SESSION['active'])) {
        header('location: ../../');
    }

    $query= "SELECT * FROM usuarios WHERE rol != 1";
    $result= mysqli_query($conn, $query);

    if (!$result) {
        die("Query error");
    }

    $json = array();
    while($row = mysqli_fetch_array($result)){
        $json[] = array(
            'user' => $row['usuario'],
            'pass' => $row['clave'],
            'rol' => $row['rol'],
            'id' => $row['id_user']

        );
    }

    $jsonstring = json_encode($json);
    echo ($jsonstring);
?>