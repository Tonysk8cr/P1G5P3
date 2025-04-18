<?php
session_start();
include_once './Modelo/Conexion.php';
include_once "./Modelo/Entidades/Cliente.php";
include_once "./Modelo/Metodos/ClienteM.php";
class ControladorCliente
{
    public function verCliente(){
        echo "Hola mundo";
    }
}