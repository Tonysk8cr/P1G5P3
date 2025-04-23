<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Login</title>
    <link href="/Proyecto/Vista/Estilos/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid">

    <!--Navbar-->
    <div class="row">
        <nav class="navbar navbar-expand-lg bg-secondary" data-bs-theme="dark">
            <a class="navbar-brand"><strong>INICIO DE SESIÓN</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?controller=index&action=index">Volver al Main
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <!--Forms para ingreso de info-->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <br>
            <br>
            <br>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center text-white">Iniciar Sesión</h5>
                    <form action="index.php?controller=usuario&action=login" method="post">
                    <div class="mb-3 text-white">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" name="correo" class="form-control" id="email" placeholder="Ingresa tu correo" required>
                        </div>
                        <div class="mb-3 text-white">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" name="contrasena" class="form-control" id="password" placeholder="Ingresa tu contraseña" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Ingresar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET['error']) && $_GET['error'] == 1 && !isset($_SESSION['usuario'])) {
    echo '<script>alert("Debes iniciar sesión para acceder a esta sección.");</script>';
}
?>
</html>