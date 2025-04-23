<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php?controller=index&action=inicioSesion&error=1");
    exit();
}
?>

<?php
    require_once __DIR__ . '/../Modelo/Conexion.php';
    require_once __DIR__ . '/../Modelo/Entidades/Reparaciones.php';
    require_once __DIR__ . '/../Modelo/Metodos/ReparacionesM.php';
    require_once __DIR__ . '/../Modelo/Entidades/Cliente.php';
    class ControladorReparaciones
    {
        private function ReparacionaJson(Reparaciones $reparaciones, Cliente $cliente)
        {
            $reparacionArray = [
                'ID_FORMULARIO' => $reparaciones->getIdFormulario(),
                'DIAGNOSTICO' => $reparaciones->getDiagnostico(),
                'PRECIO' => $reparaciones->getPrecio(),
                'ESTATUS' => $reparaciones->getStatus(),
                'BORRADOLOGICO' => $reparaciones->getBorradoLogico(),
                'ID_CLIENTE' => $cliente->getIdCliente(),
                'NOMBRE' => $cliente->getNombre(),
                'CEDULA' => $cliente->getCedula(),
                'TELEFONO' => $cliente->getTelefono(),
                'CORREO' => $cliente->getCorreo(),
                'OBSERVACIONES' => $cliente->getObservaciones(),
                'ENCARGADO' => $cliente->getEncargado(),
                'DISPOSITIVO' => $cliente->getDispositivo(),
                'MODELO' => $cliente->getModelo(),
            ];
            return json_encode($reparacionArray);
        }


        private function ReparacionJson(array $datos)
        {
            $reparacionArray = [];
            foreach ($datos as $par) {
                $cliente = $par['cliente'];
                $reparaciones = $par['reparaciones'];

                $reparacionArray[] = [
                    'ID_FORMULARIO' => $reparaciones->getIdFormulario(),
                    'DIAGNOSTICO' => $reparaciones->getDiagnostico(),
                    'PRECIO' => $reparaciones->getPrecio(),
                    'ESTATUS' => $reparaciones->getStatus(),
                    'BORRADOLOGICO' => $reparaciones->getBorradoLogico(),
                    'ID_CLIENTE' => $cliente->getIdCliente(),
                    'NOMBRE' => $cliente->getNombre(),
                    'CEDULA' => $cliente->getCedula(),
                    'TELEFONO' => $cliente->getTelefono(),
                    'CORREO' => $cliente->getCorreo(),
                    'OBSERVACIONES' => $cliente->getObservaciones(),
                    'ENCARGADO' => $cliente->getEncargado(),
                    'DISPOSITIVO' => $cliente->getDispositivo(),
                    'MODELO' => $cliente->getModelo(),
                ];
            }
            return json_encode($reparacionArray);
        }
        public function verId($id, $vista)
        {
            $JSONReparaciones = null;
            $IDNoEncontrado = false;

            if ($id !== null && is_numeric($id)) {
                $reparacionesM = new ReparacionesM();
                $resultado = $reparacionesM->BuscarId($id);
                if ($resultado) {
                    $reparacion = $resultado[0]['reparacion'];
                    $cliente = $resultado[0]['cliente'];
                    $JSONReparaciones = $this->ReparacionaJson($reparacion, $cliente);
                    $_SESSION['formulario_confirmado'] = $reparacion->getIdFormulario();
                }else{
                    $IDNoEncontrado = true;
                }
            }

            switch ($vista) {
                case "BorrarFormulario":
                    require_once "./Vista/BorrarFormulario.php";
                    break;
                case "ActualizarStatus":
                    require_once "./Vista/ActualizarStatus.php";
                    break;
                case "IngresoDiagnostico":
                    require_once "./Vista/IngresoDiagnostico.php";
                    break;
                case "AsignarPrecio":
                    require_once "./Vista/AsignarPrecio.php";
                    break;
            }
        }


    }