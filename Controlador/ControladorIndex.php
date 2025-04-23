
<?php

class ControladorIndex
{
    public function Index(){
        require_once "./Vista/Main.php";
    }

    //Redireccionamientyos a las otras secciones del front
    public function InicioSesion(){
        require_once "./Vista/InicioSesion.php";
    }

    public function IngresoDiagnostico(){
        require_once "./Controlador/ControladorReparaciones.php";
        $controladorReparaciones = new ControladorReparaciones();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $controladorReparaciones->verId($id, "IngresoDiagnostico");

    }

    public function IngresoCliente(){
        require_once "./Vista/IngresoCliente.php";
    }

    public function HistorialClientes(){
        require_once "./Controlador/ControladorCliente.php";
        $controladorCliente = new ControladorCliente();
        $controladorCliente->verTodo();
    }


    public function FormulariosReparacion(){
        require_once "./Vista/FormulariosReparacion.php";
    }

    public function Clientes(){
        require_once "./Vista/Clientes.php";
    }

    public function BorrarFormulario(){
        require_once "./Controlador/ControladorReparaciones.php";
        $controladorReparaciones = new ControladorReparaciones();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $controladorReparaciones->verId($id, "BorrarFormulario");
    }

    public function AsignarPrecio(){
        require_once "./Controlador/ControladorReparaciones.php";
        $controladorReparaciones = new ControladorReparaciones();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $controladorReparaciones->verId($id, "AsignarPrecio");
    }

    public function ActualizarStatus(){
        require_once "./Controlador/ControladorReparaciones.php";
        $controladorReparaciones = new ControladorReparaciones();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $controladorReparaciones->verId($id, "ActualizarStatus");
    }
}