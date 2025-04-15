<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Main</title>
    <link rel="stylesheet" href="/Proyecto/Vista/Estilos/bootstrap.min.css">

    <!--Imagen de fondo-->
    <style>
        .bg-jumbotron {
            background-image: url(/Proyecto/Vista/Imagenes/Inicio.jpg);
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
        </div>
    </div>
    <br>
    <br>

    <!--Menu de tareas-->
    <div class="row row-cols-1 text-center">
        <h2>MENÚ PRINCIPAL</h2>
        <!-- Grupo de listas -->
        <div class="col-md-4">
            <br>
        </div>
        <div class="list-group col-4" id="grupo-lista" role="tablist">
            <a
                    id="elemento1"
                    href="InicioSesion.php"
                    class="list-group-item list-group-item-action active"
            >
                Iniciar Sesión
            </a>
            <a
                    id="elemento2"
                    href="Clientes.php"
                    class="list-group-item list-group-item-action"
            >
                Clientes
            </a>
            <a
                    id="elemento3"
                    href="FormulariosReparacion.php"
                    class="list-group-item list-group-item-action"
            >
                Formularios de Reparación
            </a>
        </div>
        <div class="col-md-4">
            <br>
        </div>
    </div>
    <br>
    <hr>
    <br>

    <!--Acordeones con info sobre la empresa-->
    <div class="row text-center text-white">
        <div class="col-md-12">
            <h3>TechFix Soluciones</h3>
            <br>
            <div class="accordion" id="acordeon-01">
                <!-- Primer elemento hijo -->
                <div class="card">
                    <!-- boton -->
                    <div class="card-header text-white" id="boton-collapse-1" >
                        <button
                                class="btn btn-block btn-outline-primary text-left"
                                style="border: none"
                                data-toggle="collapse"
                                data-target="#contenido-btn-1"
                                aria-expanded="true"
                                aria-controls="contenido-btn-1"
                        >
                            <em>¿Quienes somos?</em>
                        </button>
                    </div>
                    <!-- Contenedor -->
                    <div
                            class="collapse show"
                            id="contenido-btn-1"
                            aria-labelledby="boton-collapse-1"
                            data-parent="#acordeon-01"
                    >
                        <div class="card-body">
                            <em>TechFix Soluciones es una tienda especializada en reparación de equipos tecnológicos como laptops, celulares, tablets y consolas.
                                Contamos con técnicos certificados, repuestos de calidad y garantía en cada servicio.
                                Ofrecemos diagnósticos rápidos, mantenimiento preventivo y asesoría gratuita. ¡Tu tecnología en buenas manos!</em>
                        </div>
                    </div>
                </div>
                <!-- Segundo elemento hijo -->
                <div class="card">
                    <!-- boton -->
                    <div class="card-header text-white" id="boton-collapse-3">
                        <button
                                class="btn btn-block btn-outline-primary text-left collapsed"
                                style="border: none"
                                data-toggle="collapse"
                                data-target="#contenido-btn-3"
                                aria-expanded="false"
                                aria-controls="contenido-btn-3"
                        >
                            <em>Nuestra Misión Empresarial</em>
                        </button>
                    </div>
                    <!-- Contenedor -->
                    <div
                            class="collapse"
                            id="contenido-btn-3"
                            aria-labelledby="boton-collapse-3"
                            data-parent="#acordeon-01"
                    >
                        <div class="card-body">
                            <em>En TechFix Soluciones, nuestra misión es ofrecer servicios confiables y de alta calidad en reparación y mantenimiento de equipos electrónicos
                                y tecnológicos. Nos comprometemos a brindar soluciones rápidas, eficientes y con garantía, enfocándonos en la satisfacción del cliente
                                y la prolongación de la vida útil de sus dispositivos. A través de personal técnico capacitado, atención personalizada
                                y el uso de repuestos originales, buscamos ser aliados estratégicos en el cuidado de la tecnología de nuestros clientes.</em>
                        </div>
                    </div>
                </div>
                <!-- Segundo elemento hijo -->
                <div class="card">
                    <!-- boton -->
                    <div class="card-header text-white" id="boton-collapse-2">
                        <button
                                class="btn btn-block btn-outline-primary text-left collapsed"
                                style="border: none"
                                data-toggle="collapse"
                                data-target="#contenido-btn-2"
                                aria-expanded="false"
                                aria-controls="contenido-btn-2"
                        >
                            <em>Nuestra Visión Empresarial</em>
                        </button>
                    </div>
                    <!-- Contenedor -->
                    <div
                            class="collapse"
                            id="contenido-btn-2"
                            aria-labelledby="boton-collapse-2"
                            data-parent="#acordeon-01"
                    >
                        <div class="card-body">
                            <em>Ser reconocidos a nivel nacional como la empresa líder en reparación y mantenimiento tecnológico,
                                destacándonos por nuestra innovación, confianza y excelencia en el servicio.
                                Aspiramos a transformar la experiencia del cliente en el sector técnico, integrando soluciones sostenibles,
                                tecnología de vanguardia y un equipo humano comprometido con la mejora continua.</em>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!--Cards con info-->
    <div class="row text-center text-white">
        <div class="col-md-12">
            <br>
            <hr>
            <br>
            <h2>CONTACTO PARA SOPORTE REGIONAL</h2>
        </div>
    </div>

    <div class="row text-center">
        <div class="col-md-3">
            <br>
        </div>
        <div class="col-md-3">
            <br>
            <br>
            <div class="card border-success mb-3 text-white text-center" style="max-width: 25rem;">
                <div class="card-header"><h5><strong><em>Correos electronicos:</em></strong></h5></div>
                <div class="card-body">
                    <p class="card-text text-center">
                        <em><strong>COSTA RICA</strong>
                            <br>
                            yosef.vargas0814@uhispano.ac.cr
                            genesis.villalobos0115@uhispano.ac.cr
                            christian.zepeda0885@uhispano.ac.cr
                            kleyber.vindas0887@uhispano.ac.cr
                            anthony.villalobos0872@uhispano.ac.cr</em>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <br>
            <br>
            <div class="card border-warning mb-3 text-white text-center" style="max-width: 25rem;">
                <div class="card-header"><h5><strong><em>Números de teléfono:</em></strong></h5></div>
                <div class="card-body">
                    <p class="card-text text-center">
                        <em>
                            <strong>COSTA RICA</strong>
                            <br>
                            +506 7048-9277 -- Extensión 3
                            <br>
                            +506 6340-2686 -- Extensión 1
                            <br>
                            +506 7299-5193 -- Extensión 5
                            <br>
                            +506 8815-7675 -- Extensión 4
                            <br>
                            +506 6448-4300 -- Extensión 2</em>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <br>
        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
<!--JS para ejecuccion de acordeones-->
<script src="JS%20Especiales/jquery-3.5.0.min.js"></script>
<script src="JS%20Especiales/popper.min.js"></script>
<script src="JS%20Especiales/bootstrap.min.js"></script>
</body>
</html>
