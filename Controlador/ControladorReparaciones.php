    <?php
    session_start();
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
        public function verId()
        {
            echo "Reparaciones por ID reparacion<br>";
            $reparacionesM = new ReparacionesM();
            $resultado = $reparacionesM->BuscarId(1);
            $reparacion = $resultado[0]['reparacion'];
            $cliente = $resultado[0]['cliente'];
            $JSONReparaciones = $this->ReparacionaJson($reparacion, $cliente);
            require_once "./Vista/BorrarFormulario.php";
        }

    }