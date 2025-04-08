<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ingreso Clientes</title>
    <link href="Estilos/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">

    <!--Navbar-->
    <div class="row">
        <nav class="navbar navbar-expand-lg bg-secondary" data-bs-theme="dark">
            <a class="navbar-brand" href="#"><strong>INGRESO CLIENTES</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">VOLVER</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="Clientes.php">Volver a Clientes</a>
                            <a class="dropdown-item" href="Main.php">Volver al Main</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <!--Formulario de ingreso-->
    <h3 class="p-4 text-center text-white">Formulario para el ingreso de un cliente</h3>
        <div class="row">
            <div class="col-md-3">
                <br>
            </div>
            <div class="col-md-6">
                <form action="Main.php" method="post">
                    <!-- Nombre -->
                    <div class="form-group">
                        <label for="user-name">Nombre del cliente</label>
                        <input
                            type="text"
                            name="Nombre"
                            class="form-control form-control-sm"
                        />
                    </div>

                    <!-- Cédula -->
                    <div class="form-group">
                        <label for="user-name">Cédula del cliente</label>
                        <input
                            type="number"
                            name="Cedula"
                            class="form-control form-control-sm"
                        />
                    </div>

                    <!-- Telefono -->
                    <div class="form-group">
                        <label for="user-name">Telefono del cliente</label>
                        <input
                            type="number"
                            name="Telefono"
                            class="form-control form-control-sm"
                        />
                    </div>

                    <!-- Correo -->
                    <div class="form-group">
                        <label for="user-email">Correo electrónico del cliente</label>
                        <input
                            type="email"
                            name="Correo"
                            class="form-control form-control-sm"
                        />
                    </div>

                    <!-- Observaciones-->
                    <div class="form-group">
                        <label for="user-comment">Observaciones</label>
                        <textarea
                            type="text"
                            name="Observaciones"
                            class="form-control"
                        ></textarea>
                    </div>

                    <!-- Encargado -->
                    <div class="form-group">
                        <label for="user-name">Encargado de la reparación</label>
                        <input
                            type="text"
                            name="Encargado"
                            class="form-control form-control-sm"
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
                        />
                    </div>
                    <br>
                    <!-- Enviar -->
                    <input type="submit" class="btn btn-success text-center" value="Ingresar Cliente" />
                </form>
            </div>
            <div class="col-md-5">
                <br>
            </div>
        </div>


</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>
