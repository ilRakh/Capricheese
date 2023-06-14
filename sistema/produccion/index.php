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
    <link rel="stylesheet" href="style-produccion.css">
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
                        <li class="nav-item"><a class="nav-link" href="#">Producción</a></li>
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
                    <li class="nav-item"><a class="nav-link" href="../controlLeche">Control de Leche</a></li>
                    <li class="nav-item"><a class="nav-link" href="../laboratorio">Laboratorio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Producción</a></li>
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
            <div class="col-md-12">
                <div class="center">
                    <button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#Modal-producir">Producir Queso</button>
                </div>
            </div>
        </div>
        <!-- Modal Producir Queso -->
        <div class="modal fade" id="Modal-producir" tabindex="-1" aria-labelledby="Modal-producirLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header center">
                        <div class="center">
                            <h5 class="modal-title" id="Modal-producirLabel">Producir Queso</h5>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="center">

                            <div class="inline">
                                <select id="leche" class="form-select form-select-sm mb-3" aria-label=".form-select-lg example">
                                    <option value="0" selected>Cantidad de litros</option>
                                    <?php 
                                    $query = "SELECT * FROM cisterna";
                                    $result = mysqli_query($conn, $query);

                                    while($row = mysqli_fetch_array($result)){
                                    if ($row['cantidad'] < 1000) { ?>
                                    <option value="0">Necesitas Reabastecer</option>
                                    <?php }else{
                                    if ($row['cantidad'] == 1000) { ?>
                                    <option value="1000">1000L</option>
                                    <?php }else{
                                    if ($row['cantidad'] == 2000) { ?>
                                    <option value="1000">1000L</option>
                                    <option value="2000">2000L</option>
                                    <?php }else{
                                    if ($row['cantidad'] == 3000) { ?>
                                    <option value="1000">1000L</option>
                                    <option value="2000">2000L</option>
                                    <option value="3000">3000L</option>
                                    <?php }else{ ?>
                                    <option value="1000">1000L</option>
                                    <option value="2000">2000L</option>
                                    <option value="3000">3000L</option>
                                    <option value="4000">4000L</option>
                                    <?php } } } } } ?>
                                </select>
                            </div>

                            <div class="inline">
                                <select id="fermento" class="form-select form-select-sm mb-3" aria-label=".form-select-lg example">
                                    <option value="0" selected>Fermento</option>
                                    <?php 
                                    $query = "SELECT * FROM laboratorio WHERE estado = 1 AND usado = 0";
                                    $result = mysqli_query($conn, $query);

                                    while($row = mysqli_fetch_array($result)){
                                    ?>
                                    <option value="<?php echo $row['id_fermento']; ?>">Peso: <?php echo $row['peso'];?>gr - Calidad: <?php echo $row['calidad'];?> Estrellas</option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="inline">
                                <select id="tipo-queso" class="form-select form-select-sm mb-3" aria-label=".form-select-lg example">
                                    <option value="0" selected>Tipo de Queso</option>
                                    <?php 
                                    $query = "SELECT * FROM tipos_de_quesos";
                                    $result = mysqli_query($conn, $query);

                                    while($row = mysqli_fetch_array($result)){
                                    ?>
                                    <option value="<?php echo $row['id_tipo']; ?>"><?php echo $row['tipo'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer center">
                        <button type="button" id="producir" class="btn btn-danger" >Producir</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="template"></div>
        <!-- Modal información de Lote -->
        <div class="modal fade" id="Modal-info" tabindex="-1" aria-labelledby="Modal-infoLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header center">
                        <div class="center">
                            <h5 class="modal-title letra" id="Modal-infoLabel">Datos Tanda</h5>
                        </div>
                    </div>
                    <div class="modal-body">
                        <p id="tipo" class="letra text-center"></p>
                        <p id="litros" class="letra text-center"></p>
                        <p id="peso-fermento" class="letra text-center"></p>
                        <p id="calidad-fermento" class="letra text-center"></p>
                        <p id="peso-tanda" class="letra text-center"></p>
                        <input type="hidden" id="id-tanda">
                        <input type="hidden" id="peso-tanda-ref">
                    </div>
                    <div class="modal-footer center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Entendido</button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal-send" data-bs-dismiss="modal" id="send-curado">Enviar a Curado</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="Modal-send" tabindex="-1" aria-labelledby="Modal-sendLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header center">
                        <div class="center">
                            <h5 class="modal-title letra" id="Modal-sendLabel">Enviar a Curado</h5>
                        </div>
                    </div>
                    <div class="modal-body">
                        <select name="curado" id="curado" class="form-select form-select-sm mb-3" aria-label=".form-select-lg example">
                            <option value="0" selected>Curado</option>
                            <?php 
                            $query = "SELECT * FROM tipo_curado";
                            $result = mysqli_query($conn, $query);

                            while($row = mysqli_fetch_array($result)){
                            ?>
                            <option value="<?php echo $row['id_tipo_curado']; ?>"><?php echo $row['tipo'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="modal-footer center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#Modal-info">Cancelar</button>
                        <button type="button" id="send" class="btn btn-primary">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="row">
        <div class="col-12">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="progress-background">
                            <div id="progress-leche-text" class="progress-text">25%</div>
                            <div class="progress-container">
                                <div class="progress" style="height: 5px;"> 
                                    <div id="progress-leche" class="progress-bar bg-success" style="width: 25%;" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="progress-background">
                            <div id="progress-curado-text" class="progress-text">25%</div>
                            <div class="progress-container">
                                <div class="progress" style="height: 5px;">
                                    <div id="progress-curado"  class="progress-bar bg-success" style="width: 25%;" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script-produccion.js"></script>
</body>
</html>