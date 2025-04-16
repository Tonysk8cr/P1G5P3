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
        require_once "./Vista/IngresoDiagnostico.php";
    }

    public function IngresoCliente(){
        require_once "./Vista/IngresoCliente.php";
    }

    public function HistorialClientes(){
        require_once "./Vista/HistorialClientes.php";
    }

    public function FormulariosReparacion(){
        require_once "./Vista/FormulariosReparacion.php";
    }

    public function Clientes(){
        require_once "./Vista/Clientes.php";
    }

    public function BorrarFormulario(){
        require_once "./Vista/BorrarFormulario.php";
    }

    public function AsignarPrecio(){
        require_once "./Vista/AsignarPrecio.php";
    }

    public function ActualizarStatus(){
        require_once "./Vista/ActualizarStatus.php";
    }
}