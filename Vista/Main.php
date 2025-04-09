<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Main</title>
    <link rel="stylesheet" href="Estilos/bootstrap.min.css" />

    <!--Imagen de fondo-->
    <style>
        .bg-jumbotron {
            background-image: url(Imagenes/Inicio.jpg);
            background-size: cover;
            background-position: 40%;
            height: 60vh;
        }
    </style>

</head>

<body>
<div class="container-fluid">
    <div class="row text-center text-white">
        <div class="jumbotron bg-jumbotron d-flex flex-column justify-content-center align-items-center ">
            <h1 class="display-3 text-capitalize w-75">
                <strong>TechFix Soluciones </strong>
            </h1>
            <p class="lead w-75">
                <br>
                <strong>TechFix Soluciones es una tienda especializada en reparación de equipos tecnológicos como laptops, celulares, tablets y consolas.
                    Contamos con técnicos certificados, repuestos de calidad y garantía en cada servicio.
                    Ofrecemos diagnósticos rápidos, mantenimiento preventivo y asesoría gratuita. ¡Tu tecnología en buenas manos!</strong>
            </p>
        </div>
    </div>
    <BR>
    <BR>

    <!--Menu de tareas-->
    <div class="row row-cols-1 text-center">
        <h2>MENÚ PRINCIPAL</h2>
        <!-- Grupo de listas -->
        <div class="col-md-4">
            <br>
        </div>
        <div class="list-group col-4" id="grupo-lista" role="tablist">
            <a
                    data-toggle="list"
                    role="tab"
                    aria-controls="elemento1"
                    id="elemento1"
                    href="InicioSesion.php"
                    class="list-group-item list-group-item-action active"
            >
                Iniciar Sesion
            </a>
            <a
                    data-toggle="list"
                    role="tab"
                    aria-controls="elemento2"
                    id="elemento2"
                    href="Clientes.php"
                    class="list-group-item list-group-item-action"
            >
                Clientes
            </a>
            <a
                    data-toggle="list"
                    role="tab"
                    aria-controls="elemento3"
                    id="elemento3"
                    href="FormulariosReparacion.php"
                    class="list-group-item list-group-item-action"
            >
                Formularios de Reparacion
            </a>
        </div>
        <div class="col-md-4">
            <br>
        </div>
    </div>
        <hr/>



</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>
