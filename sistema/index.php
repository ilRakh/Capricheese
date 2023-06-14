<?php
    session_start();
    if (empty($_SESSION['active'])) {
        header('location: ../');
    }
    include("../backend/db.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Capricheese</title>
</head>
<body>
    <div class="navegación">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-3 border-bottom border-danger">
        <div class="container-fluid">
        <a href="#" class="navbar-brand"><img src="../img/logo.png" width="150px" alt=""></a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu-horizontal">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="menu-horizontal" class="collapse navbar-collapse">
                <ul class="navbar-nav ms-3">
                    <?php if($_SESSION['rol'] == 1){ ?>
                        <li class="nav-item"><a class="nav-link" href="administracion">Administración</a></li>
                        <li class="nav-item"><a class="nav-link" href="manual">Manual de Usuario</a></li>
                        <ul class="nav-item"><a class="nav-link" style="color: red;" href="../backend/signout.php">Salir de Administración</a></ul>
                    <?php } ?>
                    <?php if($_SESSION['rol'] == 4){ ?>
                        <li class="nav-item"><a class="nav-link" href="controlLeche">Control de Leche</a></li>
                        <li class="nav-item"><a class="nav-link" href="manual">Manual de Usuario</a></li>
                        <ul class="nav-item"><a class="nav-link" style="color: red;" href="../backend/signout.php">Salir de Cisterna</a></ul>
                    <?php } ?>
                    <?php if($_SESSION['rol'] == 7){ ?>
                        <li class="nav-item"><a class="nav-link" href="laboratorio">Laboratorio</a></li>
                        <li class="nav-item"><a class="nav-link" href="manual">Manual de Usuario</a></li>
                        <ul class="nav-item"><a class="nav-link" style="color: red;" href="../backend/signout.php">Salir de Laboratorio</a></ul>
                    <?php } ?>
                    <?php if($_SESSION['rol'] == 6){ ?>
                        <li class="nav-item"><a class="nav-link" href="produccion">Producción</a></li>
                        <li class="nav-item"><a class="nav-link" href="manual">Manual de Usuario</a></li>
                        <ul class="nav-item"><a class="nav-link" style="color: red;" href="../backend/signout.php">Salir de Producción</a></ul>
                    <?php } ?>
                    <?php if($_SESSION['rol'] == 5){ ?>
                        <li class="nav-item"><a class="nav-link" href="curado">Curado</a></li>
                        <li class="nav-item"><a class="nav-link" href="manual">Manual de Usuario</a></li>
                        <ul class="nav-item"><a class="nav-link" style="color: red;" href="../backend/signout.php">Salir de Curado</a></ul>
                    <?php } ?>
                    <?php if($_SESSION['rol'] == 3){ ?>
                        <li class="nav-item"><a class="nav-link" href="stock">Stock</a></li>
                        <li class="nav-item"><a class="nav-link" href="manual">Manual de Usuario</a></li>
                        <ul class="nav-item"><a class="nav-link" style="color: red;" href="../backend/signout.php">Salir de Stock</a></ul>
                    <?php } ?>
                    <?php if($_SESSION['rol'] == 2){ ?>
                    <li class="nav-item"><a class="nav-link" href="controlLeche">Control de Leche</a></li>
                    <li class="nav-item"><a class="nav-link" href="laboratorio">Laboratorio</a></li>
                    <li class="nav-item"><a class="nav-link" href="produccion">Producción</a></li>
                    <li class="nav-item"><a class="nav-link" href="curado">Curado</a></li>
                    <li class="nav-item"><a class="nav-link" href="stock">Stock</a></li>
                    <li class="nav-item"><a class="nav-link" href="manual">Manual de Usuario</a></li>
                    <ul class="nav-item"><a class="nav-link" style="color: red;" href="../backend/signout.php">Salir de Jefe</a></ul>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    </div>
    <div class="container-fluid content">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="progress-background">
                    <div id="progress-leche-text" class="progress-text">25%</div>
                    <div class="progress-container">
                        <div class="progress" style="height: 5px;"> 
                            <div id="progress-leche" class="progress-bar bg-success" style="width: 25%;" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
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
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="background">
                    <canvas id="myChart" width="80" height="60"></canvas>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="background">
                    <canvas id="myChart2" width="80" height="60"></canvas>
                </div>
            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="chart.js"></script>
    <script src="chart2.js"></script>
    <script src="progressBar.js"></script>
</body>
</html>