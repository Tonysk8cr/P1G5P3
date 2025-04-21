<?php
require_once(__DIR__ . '/../Modelo/Conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_cliente"]) && isset($_POST["diagnostico"]) && !isset($_POST["visualizar"])) {
    $conexion = new Conexion();

    $id_cliente = $_POST["id_cliente"];
    $diagnostico = $_POST["diagnostico"];

    $sql = "UPDATE formulario_reparacion SET diagnostico = '$diagnostico' WHERE id_cliente = '$id_cliente'";

    if ($conexion->Ejecutar($sql)) {
        echo "<script>alert('✅ Diagnóstico guardado correctamente');</script>";
    } else {
        echo "<script>alert('❌ Error al guardar el diagnóstico');</script>";
    }

    $conexion->Cerrar();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ingresar Diagnóstico</title>
    <link href="/Proyecto/Vista/Estilos/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<ul>
    <li><strong>VOLVER</strong></li>
    <a href="index.php?controller=index&action=FormulariosReparacion">Volver a Formularios de Reparacion</a>
    <a href="index.php?controller=index&action=index">Volver al Main</a>
</ul>

<div class="container mt-5">
    <h2>Ingreso de Diagnóstico</h2>
    <form method="POST">
        <div class="form-group">
            <label>ID del Cliente</label>
            <input type="number" name="id_cliente" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Diagnóstico</label>
            <textarea name="diagnostico" class="form-control" required></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Guardar Diagnóstico</button>
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
