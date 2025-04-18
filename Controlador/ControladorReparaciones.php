<?php
session_start();
include_once "./Modelo/Conexion.php";
include_once "./Modelo/Entidades/Reparaciones.php";
include_once "./Modelo/Metodos/ReparacionesM.php";
class ControladorReparaciones
{
    public function verReparaciones()
    {
        echo "Reparaciones";
    }
}