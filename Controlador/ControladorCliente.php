<?php
session_start();
require_once __DIR__ . '/../Modelo/Conexion.php';
require_once __DIR__ . '/../Modelo/Entidades/Cliente.php';
require_once __DIR__ . '/../Modelo/Metodos/ClienteM.php';

class ControladorCliente
{
    public function verCliente(){
        echo "Hola mundo";
    }
}


$controlador = new ControladorCliente();
$controlador->verCliente();
