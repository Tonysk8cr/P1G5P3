<?php
session_start();
include_once "./Modelo/Conexion.php";
include_once "./Modelo/Entidades/Usuario.php";
include_once "./Modelo/Metodos/UsuarioM.php";

class ControladorUsuario
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo "<script>alert('Método no permitido');</script>";
            return;
        }

        $correo = $_POST['correo'] ?? '';
        $contrasena = $_POST['contrasena'] ?? '';

        if (empty($correo) || empty($contrasena)) {
            echo "<script>alert('Correo y contraseña requeridos'); window.location.href='index.php?controller=index&action=inicioSesion';</script>";
            return;
        }

        $usuarioM = new UsuarioM();
        $usuario = $usuarioM->BuscarPorCorreo($correo);

        if ($usuario && $contrasena === $usuario->getContrasena()){
            $_SESSION['usuario'] = [
                'ID_USUARIO' => $usuario->getId(),
                'CORREO' => $usuario->getCorreo(),
            ];

            // ✅ Redirigir limpio, sin el error en la URL
            header("Location: index.php?controller=index&action=index");
            exit();
        }

    }
}

