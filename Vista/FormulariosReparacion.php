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
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formularios de Reparacion</title>
    <link href="/Proyecto/Vista/Estilos/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<!--Navbar-->
<div class="container-fluid">
    <div class="row">
        <nav class="navbar navbar-expand-lg bg-secondary" data-bs-theme="dark">
            <a class="navbar-brand"><strong>FORMULARIOS DE REPARACIÓN</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?controller=index&action=Index">Volver al Main
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <!--Formularios-->
    <div class="row">
        <div class="col-md-2">
            <br>
        </div>
        <div class="col-md-4 text-center p-5">
            <br>
            <br>
            <br>
            <nav class="nav flex-column">
                <a href="index.php?controller=index&action=BorrarFormulario" <button type="button" class="btn btn-info btn-lg"><strong><em>Borrar formulario</em></strong></button></a>
                <br>
                <a href="index.php?controller=index&action=ActualizarStatus" <button type="button" class="btn btn-info btn-lg"><strong><em>Actualizar status de un equipo</em></strong></button></a>
                <br>
                <a href="index.php?controller=index&action=IngresoDiagnostico" <button type="button" class="btn btn-info btn-lg"><strong><em>Ingresar diagnostico</em></strong></button></a>
                <br>
                <a href="index.php?controller=index&action=AsignarPrecio" <button type="button" class="btn btn-info btn-lg"><strong><em>Asignar Precio</em></strong></button></a>
            </nav>
        </div>

        <div class="col-md-4 text-center">
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="card text-white bg-danger mb-3" style="">
                <div class="card-header"><h4>¡ WARNING !</h4></div>
                <div class="card-body">
                    <p class="card-text">Este apartado unicamente trabaja si cuenta con los permisos necesarios, en caso de no contar con los permisos
                    solitarlos a su administrador a cargo.</p>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <br>
        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>