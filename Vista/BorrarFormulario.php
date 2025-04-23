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
                    <label for="user-name"><strong>ID Formulario</strong></label>
                    <input
                            type="number"
                            name="id_formulario"
                            class="form-control form-control-sm"
                            required
                    />
                    <br>
                    <a><button type="button" class="btn btn-outline-light" onclick="buscarFormulario()">Buscar Informacion</button></a>
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
                <th scope="col">Estado</th>
                <th scope="col">Fecha de ingreso</th>
            </tr>
            <tbody></tbody>
            </thead>
        </table>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once(__DIR__ . '/../Modelo/Conexion.php');
require_once(__DIR__ . '/../Modelo/Entidades/Reparaciones.php');
require_once(__DIR__ . '/../Modelo/Metodos/ReparacionesM.php');
if ($_SERVER["REQUEST_METHOD"] == "POST" &&
    isset($_POST["id_formulario"]) &&
    isset($_POST["eliminar"])){
    $id_formulario = $_POST["id_formulario"];
    $eliminar = $_POST["eliminar"];

    if (!isset($_SESSION['formulario_confirmado']) || $_SESSION['formulario_confirmado'] != $id_formulario) {
        echo "<script>alert('Debe buscar primero un formulario válido antes de ingresar el diagnóstico.');</script>";
        exit;
    }
    //Objeto de cliente
    $reparacion = new Reparaciones();
    $reparacion->setIdFormulario($id_formulario);
    $reparacion->setBorradoLogico('0');

    $reparacionesM = new ReparacionesM();
    $resultado = $reparacionesM->BorradoLogico($reparacion);

    if ($resultado) {
        echo "<script>alert('Estado actualizado');</script>";
        unset($_SESSION['formulario_confirmado']);
    } else {
        echo "<script>alert('Error al guardar el diagnóstico');</script>";
    }
}
?>
<!--Script de envio de datos al front-->
<script src="./Vista/assets/BuscarID.js"></script>
<script>
    <?php if (isset($JSONReparaciones) && $JSONReparaciones): ?>
    var objetoId = <?php echo $JSONReparaciones ?>;
    Formu(objetoId);
    <?php endif; ?>
</script>

<!--script para enviar los datos del id hacia el back-->
<script>
    function buscarFormulario() {
        const id = document.querySelector('input[name="id_formulario"]').value;
        if (id) {
            window.location.href = `index.php?controller=index&action=BorrarFormulario&id=${id}`;
        } else {
            alert("Por favor ingrese un ID");
        }
    }
</script>
<!-- script para enviar un alert en caso de que el formualrio no exista-->
<script>
    <?php if (isset($IDNoEncontrado) && $IDNoEncontrado): ?>
    alert("El formulario con ese ID no existe.");
    <?php endif; ?>
</script>

<script>
    document.querySelector('.btn-outline-info').addEventListener('click', function () {
        if (typeof objetoId !== 'undefined' && objetoId) {
            Formu(objetoId);
        } else {
            alert("No hay datos para mostrar. Primero realice una búsqueda.");
        }
    });
</script>
</body>
</html>
