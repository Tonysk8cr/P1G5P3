<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Main</title>
    <link href="/Proyecto/Vista/Estilos/bootstrap.min.css" rel="stylesheet">

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
    <!-- Encabezado -->
    <div class="row text-center text-white">
        <div class="bg-jumbotron d-flex flex-column justify-content-center align-items-center w-100">
            <h1 class="display-3 text-capitalize w-75">
                <strong>TechFix Soluciones</strong>
            </h1>
        </div>
    </div>

    <br><br>

    <!-- Menú de tareas -->
    <div class="row row-cols-1 text-center">
        <h2>MENÚ PRINCIPAL</h2>
        <div class="col-md-4"><br></div>
        <div class="list-group col-4" id="grupo-lista" role="tablist">
            <a
                    id="elemento1"
                    href="index.php?controller=index&action=inicioSesion"
                    class="list-group-item list-group-item-action active"
            >
                Iniciar Sesión
            </a>
            <a
                    id="elemento2"
                    href="index.php?controller=index&action=clientes"
                    class="list-group-item list-group-item-action"
            >
                Clientes
            </a>
            <a
                    id="elemento3"
                    href="index.php?controller=index&action=formulariosReparacion"
                    class="list-group-item list-group-item-action"
            >
                Formularios de Reparación
            </a>
        </div>
        <div class="col-md-4"><br></div>
    </div>

    <br><hr><br>

    <!-- Acordeón de información -->
    <div class="row text-white">
        <div class="col-md-12 text-center">
            <h3>TechFix Soluciones</h3>
            <br>
            <div class="accordion" id="acordeon-01">
                <!-- ¿Quiénes somos? -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading-1">
                        <button class="accordion-button collapsed justify-content-center text-center" type="button"
                                data-bs-toggle="collapse" data-bs-target="#contenido-btn-1"
                                aria-expanded="false" aria-controls="contenido-btn-1">
                            <em>¿Quiénes somos?</em>
                        </button>
                    </h2>
                    <div id="contenido-btn-1" class="accordion-collapse collapse show"
                         aria-labelledby="heading-1" data-bs-parent="#acordeon-01">
                        <div class="accordion-body">
                            <em>TechFix Soluciones es una tienda especializada en reparación de equipos tecnológicos como laptops, celulares, tablets y consolas.
                                Contamos con técnicos certificados, repuestos de calidad y garantía en cada servicio.
                                Ofrecemos diagnósticos rápidos, mantenimiento preventivo y asesoría gratuita. ¡Tu tecnología en buenas manos!</em>
                        </div>
                    </div>
                </div>

                <!-- Misión -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading-2">
                        <button class="accordion-button collapsed justify-content-center text-center" type="button"
                                data-bs-toggle="collapse" data-bs-target="#contenido-btn-2"
                                aria-expanded="false" aria-controls="contenido-btn-2">
                            <em>Nuestra Misión Empresarial</em>
                        </button>
                    </h2>
                    <div id="contenido-btn-2" class="accordion-collapse collapse"
                         aria-labelledby="heading-2" data-bs-parent="#acordeon-01">
                        <div class="accordion-body">
                            <em>En TechFix Soluciones, nuestra misión es ofrecer servicios confiables y de alta calidad en reparación y mantenimiento de equipos electrónicos
                                y tecnológicos. Nos comprometemos a brindar soluciones rápidas, eficientes y con garantía, enfocándonos en la satisfacción del cliente
                                y la prolongación de la vida útil de sus dispositivos. A través de personal técnico capacitado, atención personalizada
                                y el uso de repuestos originales, buscamos ser aliados estratégicos en el cuidado de la tecnología de nuestros clientes.</em>
                        </div>
                    </div>
                </div>

                <!-- Visión -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading-3">
                        <button class="accordion-button collapsed justify-content-center text-center" type="button"
                                data-bs-toggle="collapse" data-bs-target="#contenido-btn-3"
                                aria-expanded="false" aria-controls="contenido-btn-3">
                            <em>Nuestra Visión Empresarial</em>
                        </button>
                    </h2>
                    <div id="contenido-btn-3" class="accordion-collapse collapse"
                         aria-labelledby="heading-3" data-bs-parent="#acordeon-01">
                        <div class="accordion-body">
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
    <style>
        .accordion-button {
            justify-content: center !important;
            text-align: center;
        }

        /* Eliminar ícono de flecha (por defecto a la derecha) */
        .accordion-button::after {
            display: none !important;
        }
    </style>

    <!-- Contacto -->
    <div class="row text-center text-white">
        <div class="col-md-12">
            <br><hr><br>
            <h2>CONTACTO PARA SOPORTE REGIONAL</h2>
        </div>
    </div>

    <div class="row text-center">
        <div class="col-md-3">
            <br>
        </div>
        <div class="col-md-3">
            <br><br>
            <div class="card border-success mb-3 text-white text-center" style="max-width: 25rem;">
                <div class="card-header"><h5><strong><em>Correos electrónicos:</em></strong></h5></div>
                <div class="card-body">
                    <p class="card-text">
                        <em><strong>COSTA RICA</strong><br>
                            yosef.vargas0814@uhispano.ac.cr<br>
                            genesis.villalobos0115@uhispano.ac.cr<br>
                            christian.zepeda0885@uhispano.ac.cr<br>
                            kleyber.vindas0887@uhispano.ac.cr<br>
                            anthony.villalobos0872@uhispano.ac.cr</em>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <br><br>
            <div class="card border-warning mb-3 text-white text-center" style="max-width: 25rem;">
                <div class="card-header"><h5><strong><em>Números de teléfono:</em></strong></h5></div>
                <div class="card-body">
                    <p class="card-text">
                        <em><strong>COSTA RICA</strong><br>
                            +506 7048-9277 -- Extensión 3<br>
                            +506 6340-2686 -- Extensión 1<br>
                            +506 7299-5193 -- Extensión 5<br>
                            +506 8815-7675 -- Extensión 4<br>
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
</body>
</html>