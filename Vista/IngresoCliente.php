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
    <title>Ingreso Clientes</title>
    <link href="/Proyecto/Vista/Estilos/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">

    <!--Navbar-->
    <div class="row">
        <nav class="navbar navbar-expand-lg bg-secondary" data-bs-theme="dark">
            <a class="navbar-brand"><strong>INGRESO CLIENTES</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">VOLVER</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php?controller=index&action=Clientes"">Volver a Clientes</a>
                            <a class="dropdown-item" href="index.php?controller=index&action=index"">Volver al Main</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <!--Formulario de ingreso-->
    <h2 class="p-4 text-center text-white">Formulario para el ingreso de un cliente</h2>
    <div class="row">
        <div class="col-md-3">
            <br>
        </div>
        <div class="col-md-6">
            <form action="" method="post">

                <!-- Nombre -->
                <div class="form-group">
                    <label for="user-name">Nombre del cliente</label>
                    <input
                            type="text"
                            name="Nombre"
                            class="form-control form-control-sm"
                            placeholder="Ingrese el nombre del cliente"
                            required
                    />
                </div>

                <!-- Cédula -->
                <div class="form-group">
                    <label for="user-name">Cédula del cliente</label>
                    <input
                            type="number"
                            name="Cedula"
                            class="form-control form-control-sm"
                            placeholder="Ingrese la cédula del cliente"
                            required
                    />
                </div>

                <!-- Telefono -->
                <div class="form-group">
                    <label for="user-name">Telefono del cliente</label>
                    <input
                            type="number"
                            name="Telefono"
                            class="form-control form-control-sm"
                            placeholder="Ingrese el telefono del cliente"
                            required
                    />
                </div>

                <!-- Correo -->
                <div class="form-group">
                    <label for="user-email">Correo electrónico del cliente</label>
                    <input
                            type="email"
                            name="Correo"
                            class="form-control form-control-sm"
                            placeholder="Ingrese el correo del cliente"
                            required
                    />
                </div>

                <!-- Observaciones-->
                <div class="form-group">
                    <label for="user-comment">Observaciones</label>
                    <input
                            type="text"
                            name="Observaciones"
                            class="form-control"
                    />
                </div>

                <!-- Encargado -->
                <div class="form-group">
                    <label for="user-name">Encargado de la reparación</label>
                    <input
                            type="text"
                            name="Encargado"
                            class="form-control form-control-sm"
                            placeholder="Ingrese el nombre del encargado de reparación"
                            required
                    />
                </div>

                <!-- Selección -->
                <div class="form-group">
                    <label for="select-group">Seleccione el tipo de dispositivo</label>
                    <select name="Dispositivo" class="form-control">
                        <option value="Celular">Celular</option>
                        <option value="Tablet">Tablet</option>
                        <option value="Consola">Consola</option>
                        <option value="Monitor">Monitor</option>
                        <option value="PC">PC</option>
                        <option value="Laptop">Laptop</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>

                <!-- Modelo -->
                <div class="form-group">
                    <label for="user-name">Modelo de dispositivo</label>
                    <input
                            type="text"
                            name="Modelo"
                            class="form-control form-control-sm"
                            placeholder="Ingrese el modelo del dispositivo"
                            required
                    />
                </div>
                <br>
                <!-- Enviar -->
                <input type="submit" id="IngresoCliente" class="btn btn-success text-center" value="Ingresar Cliente"/>
            </form>
        </div>
        <div class="col-md-5">
            <br>
        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="./JS/JSIngresoCliente.js"></script>


<?php
require_once(__DIR__ . '/../Modelo/Entidades/Cliente.php');
require_once(__DIR__ . '/../Modelo/Metodos/ClienteM.php');
require_once(__DIR__ . '/../Modelo/Conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente = new Cliente();
    $cliente->setNombre($_POST["Nombre"]);
    $cliente->setCedula($_POST["Cedula"]);
    $cliente->setTelefono($_POST["Telefono"]);
    $cliente->setCorreo($_POST["Correo"]);
    $cliente->setObservaciones($_POST["Observaciones"]);
    $cliente->setEncargado($_POST["Encargado"]);
    $cliente->setDispositivo($_POST["Dispositivo"]);
    $cliente->setModelo($_POST["Modelo"]);

    $metodo = new ClienteM();
    $conexion = new Conexion();

    if ($metodo->Nuevo($cliente, $conexion)) {
        echo "<script>alert('Cliente y formulario de reparación registrados');</script>";
    } else {
        echo "<script>alert('Error al guardar el cliente');</script>";
    }
    $conexion->Cerrar();

}
?>

</body>
</html>
