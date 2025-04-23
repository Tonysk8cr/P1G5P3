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
    <title>Clientes</title>
    <link href="/Proyecto/Vista/Estilos/bootstrap.min.css" rel="stylesheet">
</head>


<body>
<div class="container-fluid">

    <!--Navbar-->
    <div class="row">
        <nav class="navbar navbar-expand-lg bg-secondary" data-bs-theme="dark">
            <a class="navbar-brand"><strong>CLIENTES</strong></a>
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

    <!--Cards con acceso a las acciones-->
    <div class="row">
        <div class="col-md-2">
            <br>
        </div>
        <div class="col-md-4 p-5 text-center">
            <br>
            <br>
            <div class="card bg-info text-white" style="width: 30.3rem;">
                <img src="/Proyecto/Vista/Imagenes/Historial_HD.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Ver Historial de Clientes</h5>
                    <p class="card-text">Consulta el registro completo de interacciones, compras y actividad de cada cliente para un mejor seguimiento y atención personalizada.</p>
                    <a href="index.php?controller=index&action=HistorialClientes" class="btn btn-light">Ver Historial</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 p-5 text-center">
            <br>
            <br>
            <div class="card bg-warning text-white" style="width: 32.5rem;">
                <img src="/Proyecto/Vista/Imagenes/Servicio_HD.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Ingresar Clientes</h5>
                    <p class="card-text">Añade nuevos clientes al sistema de forma rápida y sencilla, registrando su información básica para futuras gestiones.</p>
                    <a href="index.php?controller=index&action=IngresoCliente" class="btn btn-light">Ingresar Cliente</a>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <br>
        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
<!--Script para desabilitar botones-->
<script>
    document.getElementById("IngresoCliente").addEventListener("click", function () {
        window.location.href = "index.php?controller=index&action=IngresoCliente";
    });
</script>
</body>
</html>