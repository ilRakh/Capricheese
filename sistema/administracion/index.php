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
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style-admin.css">
    <title>Capricheese</title>
</head>
<body>
    <div class="navegación">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-3 border-bottom border-danger">
        <div class="container-fluid">
        <a href="../index.php" class="navbar-brand"><img src="../../img/logo.png" width="150px" alt=""></a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu-horizontal">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="menu-horizontal" class="collapse navbar-collapse">
            <ul class="navbar-nav ms-3">
                    <?php if($_SESSION['rol'] == 1){ ?>
                        <li class="nav-item"><a class="nav-link" href="#">Administración</a></li>
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
    </div>
    <div class="row">
        <div class="col-md-12">
            <form id="add_form" action="">
                <input type="text" id="user-add" placeholder="Ingresar usuario">
                <input type="text" id="pass-add" placeholder="Ingresar contraseña">
                <select name="rol-add" id="rol-add" >
                    <option value="0" selected>Seleccione el rol</option>
                    <?php 
                    $query = "SELECT * FROM roles WHERE id_rol != 1";
                    $result = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_array($result)){
                    ?>
                    <option value="<?php echo $row['id_rol']; ?>"><?php echo $row['rol'];?></option>
                    <?php } ?>
                </select>
                <button type="submit" id="add" class="btn btn-primary">Añadir</button>
            </form>
        </div>
    </div>
    <div class="container-fluid content">
        <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Usuarios</th>
                <th scope="col">Rol</th>
                </tr>
            </thead>
            <tbody id="registros">
                
            </tbody>
        </table>
        </div>
        <div class="row">
            
        </div>
    </div>
    <div class="modal fade" id="Modal-info" tabindex="-1" aria-labelledby="Modal-infoLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header center">
                        <div class="center">
                            <h5 class="modal-title letra" id="Modal-infoLabel">Editar Usuario</h5>
                        </div>
                    </div>
                    <div class="modal-body">
                        <label for="user">Usuario</label>
                        <input type="text" id="user">
                        <input type="hidden" id="id-user">
                        <select name="rol" id="rol" >
                            <option value="0" selected>Seleccione el rol</option>
                            <?php 
                            $query = "SELECT * FROM roles WHERE id_rol != 1";
                            $result = mysqli_query($conn, $query);

                            while($row = mysqli_fetch_array($result)){
                            ?>
                            <option value="<?php echo $row['id_rol']; ?>"><?php echo $row['rol'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="modal-footer center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary"id="update">Editar</button>
                    </div>
                </div>
            </div>
        </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script-admin.js"></script>
</body>
</html>