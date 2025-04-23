<?php
require_once(__DIR__ . '/../Conexion.php');

class UsuarioM
{
    public function BuscarPorCorreo($correo) {
        $conexion = new Conexion();
        $sql = "SELECT * FROM usuario WHERE CORREO = '$correo';";
        $resultado = $conexion->Ejecutar($sql);

        if ($resultado && mysqli_num_rows($resultado) > 0) {
            $fila = $resultado->fetch_assoc();
            $usuario = new Usuario();
            $usuario->setId($fila['ID_USUARIO']);
            $usuario->setCorreo($fila['CORREO']);
            $usuario->setContrasena($fila['CONTRASENA']);
            $conexion->Cerrar();
            return $usuario;
        }

        $conexion->Cerrar();
        return null;
    }

}