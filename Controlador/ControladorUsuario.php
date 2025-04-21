<?php
session_start();
include_once "./Modelo/Conexion.php";
include_once "./Modelo/Entidades/Usuario.php";
include_once "./Modelo/Metodos/UsuarioM.php";

class ControladorUsuario
{
    private function UsuarioaJson(Usuario $usuario)
    {
        $usuarioArray = [
            'ID_USUARIO' => $usuario->getId(),
            'CORREO' => $usuario->getCorreo(),
            'ROL' => $usuario->getRol(),
            'BORRADOLOGICO' => $usuario->getBorradoLogico()
        ];
        return json_encode($usuarioArray);
    }

    public function login()
    {
        // Verifica que venga una solicitud POST
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'mensaje' => 'Método no permitido']);
            return;
        }

        // Obtener JSON desde el frontend
        $data = json_decode(file_get_contents("php://input"), true);
        $correo = $data['correo'] ?? '';
        $contrasena = $data['contrasena'] ?? '';

        // Validación rápida
        if (empty($correo) || empty($contrasena)) {
            echo json_encode(['success' => false, 'mensaje' => 'Correo y contraseña requeridos']);
            return;
        }

        // Buscar usuario
        $usuarioM = new UsuarioM();
        $usuario = $usuarioM->BuscarPorCorreo($correo);

        if ($usuario && password_verify($contrasena, $usuario->getContrasena())) {
            $_SESSION['usuario'] = [
                'ID_USUARIO' => $usuario->getId(),
                'CORREO' => $usuario->getCorreo(),
                'ROL' => $usuario->getRol()
            ];

            echo json_encode([
                'success' => true,
                'usuario' => [
                    'correo' => $usuario->getCorreo(),
                    'rol' => $usuario->getRol()
                ]
            ]);
        } else {
            echo json_encode(['success' => false, 'mensaje' => 'Credenciales inválidas']);
        }
    }
}
