    <?php
    session_start();
    include_once "./Modelo/Conexion.php";
    include_once "./Modelo/Entidades/Reparaciones.php";
    include_once "./Modelo/Metodos/ReparacionesM.php";
    class ControladorReparaciones
    {
        private function ReparacionaJson(Reparaciones $reparaciones)
        {
            $reparacionArray = [
                'ID_FORMULARIO' => $reparaciones->getID(),
                'MODELO' => $reparaciones->getModelo(),
                'ENCARGADO' => $reparaciones->getEncargado(),
                'ID_CLIENTE' => $reparaciones->getIDCliente(),
                'OBSERVACIONES' => $reparaciones->getObservaciones(),
                'DIAGNOSTICO' => $reparaciones->getDiagnostico(),
                'PRECIO' => $reparaciones->getPrecio(),
                'ESTATUS' => $reparaciones->getEstado(),
                'BORRADOLOGICO' => $reparaciones->getBorradologico(),

            ];
            return json_encode($reparacionArray);
        }

        private function ReparacionJson(array $reparaciones)
        {
            $reparacionArray = [];
            foreach ($reparaciones as $reparacion) {
                $reparacionArray[] = [
                    'ID_FORMULARIO' => $reparacion->getID(),
                    'MODELO' => $reparacion->getModelo(),
                    'ENCARGADO' => $reparacion->getEncargado(),
                    'ID_CLIENTE' => $reparacion->getIDCliente(),
                    'OBSERVACIONES' => $reparacion->getObservaciones(),
                    'DIAGNOSTICO' => $reparacion->getDiagnostico(),
                    'PRECIO' => $reparacion->getPrecio(),
                    'ESTATUS' => $reparacion->getEstado(),
                    'BORRADOLOGICO' => $reparacion->getBorradologico(),
                ];
            }
            return json_encode($reparacionArray);
        }
        public function verId()
            //Funcion para buscar por ID de reparacion
        {
            //echo "Reparaciones por ID reparacion";
            $reparaciones = new Reparaciones();
            $reparacionesM = new ReparacionesM();
            $reparaciones = $reparacionesM->BuscarId(1);
            $JSONReparaciones = $this->ReparacionaJson($reparaciones);
            //var_dump($JSONReparaciones);
        }

        public function verDispositivo(){
            //Funcion para buscar por Tipo de dispositivo
            //echo "Reparaciones Por Dispositivo";
            $reparaciones = new Reparaciones();
            $reparacionesM = new ReparacionesM();
            $reparaciones = $reparacionesM->BuscarDispositivo("Celular");
            $JSONReparaciones = $this->ReparacionJson($reparaciones);
            //var_dump($JSONReparaciones);
        }

        public function buscarTodos()
            //Funcion poara buscar todos los forms de reparacion
        {
            //echo "Reparaciones por todos";
            $reparaciones = new Reparaciones();
            $reparacionesM = new ReparacionesM();
            $reparaciones = $reparacionesM->BuscarTodos();
            $JSONReparaciones = $this->ReparacionJson($reparaciones);
            //var_dump($JSONReparaciones);
        }
    }