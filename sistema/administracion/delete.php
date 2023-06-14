<?php
    include('../../backend/db.php');
    session_start();
    if (empty($_SESSION['active'])) {
        header('location: ../../');
    }
    
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $query = "DELETE FROM usuarios WHERE id_user = '$id'";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Query Failed");
        }
        echo "Usuario eliminado";
    }


?>