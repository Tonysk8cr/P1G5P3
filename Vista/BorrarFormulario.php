<?php
require_once(__DIR__ . '/../Modelo/Conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["eliminar"])) {
    if (!empty($_POST["IDCliente"])) {
        $id = $_POST["IDCliente"];
        $conexion = new Conexion();

        $sql = "UPDATE formulario_reparacion SET estado = '0' WHERE id_cliente = '$id'";

        if ($conexion->Ejecutar($sql)) {
            echo "<script>alert(' Formulario marcado como eliminado');</script>";
        } else {
            echo "<script>alert(' Error al realizar el borrado lógico');</script>";
        }

        $conexion->Cerrar();
    } else {
        echo "<script>alert('Ingresá un ID válido');</script>";
    }
}
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Borrar Formulario</title>
    <link href="/Proyecto/Vista/Estilos/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container-fluid">

    <!--Navbar-->
    <div class="row">
        <nav class="navbar navbar-expand-lg bg-secondary" data-bs-theme="dark">
            <a class="navbar-brand"><strong>BORRAR FORMULARIO</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">VOLVER</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php?controller=index&action=FormulariosReparacion">Volver a Formularios de Reparacion</a>
                            <a class="dropdown-item" href="index.php?controller=index&action=Index">Volver al Main</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <!--Forms para la busqueda-->
    <div class="row">
        <div class="col-md-4">
            <br>
        </div>
        <div class="col-md-4 text-center">
            <br>
            <br>
            <br>
            <form method="post">
                <!-- ID Cliente -->
                <div class="form-group">
                    <label for="user-name"><strong>ID Cliente</strong></label>
                    <input
                        type="number"
                        name="IDCliente"
                        class="form-control form-control-sm"
                        required
                    />
                    <br>
                    <a><button type="button" class="btn btn-outline-light">Buscar Informacion</button></a>
                    <br>
                    <br>
                    <a><button type="submit" name="eliminar" class="btn btn-outline-danger">Eliminar Formulario</button></a>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <br>
        </div>
    </div>

    <!--Tabla con la info de la busqueda-->
    <div class="row">
        <br>
        <br>
    </div>
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
                <th scope="col">Status</th>
                <th scope="col">Fecha de ingreso</th>
            </tr>
            </thead>
        </table>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>
