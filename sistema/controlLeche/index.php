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
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style-control.css">
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
                        <li class="nav-item"><a class="nav-link" href="#">Control de Leche</a></li>
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
                        <ul class="nav-item"><a class="nav-link" style="color: red;" href="../../backend/signout.php">Salir de Producción</a></ul>
                    <?php } ?>
                    <?php if($_SESSION['rol'] == 5){ ?>
                        <li class="nav-item"><a class="nav-link" href="../curado">Curado</a></li>
                        <li class="nav-item"><a class="nav-link" href="../manual">Manual de Usuario</a></li>
                        <ul class="nav-item"><a class="nav-link" style="color: red;" href="../../backend/signout.php">Salir de Curado</a></ul>
                    <?php } ?>
                    <?php if($_SESSION['rol'] == 3){ ?>
                        <li class="nav-item"><a class="nav-link" href="../stock">Stock</a></li>
                        <li class="nav-item"><a class="nav-link" href="../manual">Manual de Usuario</a></li>
                        <ul class="nav-item"><a class="nav-link" style="color: red;" href="../../backend/signout.php">Salir de Stock</a></ul>
                    <?php } ?>
                    <?php if($_SESSION['rol'] == 2){ ?>
                    <li class="nav-item"><a class="nav-link" href="#">Control de Leche</a></li>
                    <li class="nav-item"><a class="nav-link" href="../laboratorio">Laboratorio</a></li>
                    <li class="nav-item"><a class="nav-link" href="../produccion">Producción</a></li>
                    <li class="nav-item"><a class="nav-link" href="../curado">Curado</a></li>
                    <li class="nav-item"><a class="nav-link" href="../stock">Stock</a></li>
                    <li class="nav-item"><a class="nav-link" href="../manual">Manual de Usuario</a></li>
                    <ul class="nav-item"><a class="nav-link" style="color: red;" href="../../backend/signout.php">Salir de Jefe</a></ul>
                    <?php } ?>

                </ul>
                
            </div>
        </div>
    </nav>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col col-md-5">
                <h3 class="dia"></h3>
            </div>
            <div class="col col-md-2 center">
                <input id="indiceDia" type="hidden">
                <input id="cisterna" type="hidden">
                <button id="reabastecer" class="btn btn-danger">Reabastecer</button>
            </div>
            <div class="col col-md-5">
 
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div id="template">

        </div>
        <div class="modal fade" id="Modal-control" tabindex="-1" aria-labelledby="Modal-controlLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="Modal-controlLabel">Datos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5 id="litros"></h5>
                        <h5 id="tambo"></h5>
                        <h5 id="temp"></h5>
                        <h5 id="calidad"></h5>
                    </div>
                    <div class="modal-footer">
                        <input id="idLeche" type="hidden">
                        <button type="button" class="btn btn-danger" id="decline" data-bs-target="#Modal-control2" data-bs-toggle="modal">Rechazar</button>
                        <button type="button" class="btn btn-success" id="accept">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="Modal-control2" tabindex="-1" aria-labelledby="Modal-controlLabel" aria-hidden="true">
            <form id="lecheForm" method="post">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="Modal-controlLabel">Rechazar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label id="label-obs" for="obs">Observación</label>
                            <textarea name="obs" id="obs" cols="50" rows="5" placeholder="Escribre la razon del rechazo"></textarea>
                        </div>
                        <div class="modal-footer">
                            <input id="idLeche" type="hidden">
                            <button type="button" class="btn btn-secondary" id="cancel-obs" data-bs-target="#Modal-control" data-bs-dismiss="modal">Rechazar</button>
                            <button type="button" class="btn btn-primary" id="send-obs">Enviar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script-control.js"></script>
</body>
</html>