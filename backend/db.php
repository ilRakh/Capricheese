<?php

    $conn = mysqli_connect(
        "localhost",
        "root",
        "",
        "queseria"
    );

    if(!$conn){
        die("Conection Failed");
    }

?>