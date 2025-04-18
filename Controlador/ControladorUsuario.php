<?php
session_start();
include_once "./Modelo/Conexion.php";
include_once "./Modelo/Entidades/Usuario.php";
include_once "./Modelo/Metodos/UsuarioM.php";
class ControladorUsuario
{
    public function verUsuario()
    {
        echo "Usuario";
    }
}