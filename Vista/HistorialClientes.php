<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php?controller=index&action=inicioSesion&error=1");
    exit();
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Historial Clientes</title>
    <link href="/Proyecto/Vista/Estilos/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">

    <!--Navbar-->
    <div class="row">
        <nav class="navbar navbar-expand-lg bg-secondary" data-bs-theme="dark">
            <a class="navbar-brand" href="#"><strong>HISTORIAL CLIENTES</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">VOLVER</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php?controller=index&action=Clientes">Volver a Clientes</a>
                            <a class="dropdown-item" href="index.php?controller=index&action=Index">Volver al Main</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <!--Titulos de Data-->
    <div class="row text-center">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre Cliente</th>
                <th scope="col">Cédula</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Correo electronico</th>
                <th scope="col">Observaciónes</th>
                <th scope="col">Encargado de reparación</th>
                <th scope="col">Dispositivo</th>
                <th scope="col">Modelo</th>
                <th scope="col">Diagnostico</th>
                <th scope="col">Precio final por reparación</th>
                <th scope="col">Estado</th>
                <th scope="col">Fecha de ingreso</th>
            </tr>
            <tbody id="tablaHistorial">
            </tbody>
            </thead>
        </table>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
<!-- Cargamos los datos que vienen del back-->
<script src="./Vista/assets/TodosJS.js"></script>
<script>
    <?php if(isset($JSONCliente))
    {
    ?>
    var todos='<?php echo $JSONCliente?>';
    VerHistorialCliente(JSON.parse(todos));
    <?php
    }
    ?>
</script>
</body>
</html>