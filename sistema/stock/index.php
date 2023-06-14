<?php
    session_start();
    if (empty($_SESSION['active'])) {
        header('location: ../../');
    }

    include("../../backend/db.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style-stock.css">
    <title>Capricheese</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-3 border-bottom border-danger">
        <div class="container-fluid">
        <a href="../index.php" class="navbar-brand"><img src="../../img/logo.png" width="150px" alt=""></a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu-horizontal">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="menu-horizontal" class="collapse navbar-collapse">
                <ul class="navbar-nav ms-3">
                    <?php if($_SESSION['rol'] == 1){ ?>
                        <li class="nav-item"><a class="nav-link" href="../administracion">Administración</a></li>
                        <li class="nav-item"><a class="nav-link" href="../manual">Manual de Usuario</a></li>
                        <ul class="nav-item"><a class="nav-link" style="color: red;" href="../../backend/signout.php">Salir de Administración</a></ul>
                    <?php } ?>
                    <?php if($_SESSION['rol'] == 4){ ?>
                        <li class="nav-item"><a class="nav-link" href="../controlLeche">Control de Leche</a></li>
                        <li class="nav-item"><a class="nav-link" href="../manual">Manual de Usuario</a></li>
                        <ul class="nav-item"><a class="nav-link" style="color: red;" href="../../backend/signout.php">Salir de Cisterna</a></ul>
                    <?php } ?>
                    <?php if($_SESSION['rol'] == 7){ ?>
                        <li class="nav-item"><a class="nav-link" href="../laboratorio">Laboratorio</a></li>
                        <li class="nav-item"><a class="nav-link" href="../manual">Manual de Usuario</a></li>
                        <ul class="nav-item"><a class="nav-link" style="color: red;" href="../../backend/signout.php">Salir de Laboratorio</a></ul>
                    <?php } ?>
                    <?php if($_SESSION['rol'] == 6){ ?>
                        <li class="nav-item"><a class="nav-link" href="../produccion">Producción</a></li>
                        <li class="nav-item"><a class="nav-link" href="../manual">Manual de Usuario</a></li>
                        <ul class="nav-item"><a class="nav-link" style="color: red;" href="../../backend/signout.php">Salir de Laboratorio</a></ul>
                    <?php } ?>
                    <?php if($_SESSION['rol'] == 5){ ?>
                        <li class="nav-item"><a class="nav-link" href="../curado">Curado</a></li>
                        <li class="nav-item"><a class="nav-link" href="../manual">Manual de Usuario</a></li>
                        <ul class="nav-item"><a class="nav-link" style="color: red;" href="../../backend/signout.php">Salir de Curado</a></ul>
                    <?php } ?>
                    <?php if($_SESSION['rol'] == 3){ ?>
                        <li class="nav-item"><a class="nav-link" href="#">Stock</a></li>
                        <li class="nav-item"><a class="nav-link" href="../manual">Manual de Usuario</a></li>
                        <ul class="nav-item"><a class="nav-link" style="color: red;" href="../../backend/signout.php">Salir de Stock</a></ul>
                    <?php } ?>
                    <?php if($_SESSION['rol'] == 2){ ?>
                    <li class="nav-item"><a class="nav-link" href="../controlLeche">Control de Leche</a></li>
                    <li class="nav-item"><a class="nav-link" href="../laboratorio">Laboratorio</a></li>
                    <li class="nav-item"><a class="nav-link" href="../produccion">Producción</a></li>
                    <li class="nav-item"><a class="nav-link" href="../curado">Curado</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Stock</a></li>
                    <li class="nav-item"><a class="nav-link" href="../manual">Manual de Usuario</a></li>
                    <ul class="nav-item"><a class="nav-link" style="color: red;" href="../../backend/signout.php">Salir de Jefe</a></ul>
                    <?php } ?>
                </ul>

            </div>
        </div>
    </nav>

    <div class="row">
        <div class="col-12">
            <div class="progress-background">
                <div id="progress-curado-text" class="progress-text">25%</div>
                <div class="progress-container">
                    <div class="progress" style="height: 5px;"> 
                        <div id="progress-curado" class="progress-bar bg-success" style="width: 25%;" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    





    <div class="row" id="first-sec">
        <div class="col-md-6 fresco">
           <h1>Fresco</h1>
        </div>
        <div class="col-md-6 tierno">
           <h1>Tierno</h1>
        </div>
        <div class="col-md-6 semicurado">
           <h1>Semicurado</h1>
        </div>
        <div class="col-md-6 curado">
           <h1>Curado</h1>
        </div>
    </div>
    





    
    <div class="row" id="volver">
        <i class='bx bx-arrow-back back'></i>
        <h4 class="back">Tipos de Curado</h4>
    </div>

    <div class="row" id="second-sec">
    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script-stock.js"></script>
</body>
</html>