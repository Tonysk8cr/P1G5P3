<?php
require_once('../Modelo/Conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["visualizar"])) {
    $conexion = new Conexion();

    $id_cliente = $_POST["id_cliente"];
    $precio_estimado = $_POST["precio_estimado"];

    $sql = "UPDATE formulario_reparacion SET precio_estimado = '$precio_estimado' WHERE id_cliente = '$id_cliente'";

    if ($conexion->Ejecutar($sql)) {
        echo "<script>alert('✅ Precio asignado correctamente');</script>";
    } else {
        echo "<script>alert('❌ Error al asignar el precio');</script>";
    }

    $conexion->Cerrar();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Asignar Precio</title>
    <link href="/Proyecto/Vista/Estilos/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<ul>
    <li><strong>VOLVER</strong></li>
    <a href="FormulariosReparacion.php">Volver a Formularios de Reparacion</a>
    <a href="Main.php">Volver al Main</a>
</ul>

<div class="container mt-5">
    <h2>Asignar Precio a Reparación</h2>
    <form method="POST">
        <div class="form-group">
            <label>ID del Cliente</label>
            <input type="number" name="id_cliente" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Precio Estimado (₡)</label>
            <input type="number" name="precio_estimado" class="form-control" required>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Guardar Precio</button>
        <br>
        <button type="submit" name="visualizar" class="btn btn-info">Visualizar Actualización</button>

    </form>

</div>

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
        <th scope="col">Diagnostico</th>
        <th scope="col">Dispositivo</th>
        <th scope="col">Modelo</th>
        <th scope="col">Precio final por reparación</th>
        <th scope="col">Status</th>
    </tr>
    </thead>
</table>


</body>
</html>
