
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../Modelo/Conexion.php';
require_once __DIR__ . '/../Modelo/Entidades/Cliente.php';
require_once __DIR__ . '/../Modelo/Metodos/ClienteM.php';
require_once __DIR__ . '/../Modelo/Entidades/Reparaciones.php';

class ControladorCliente
{
    private function ClienteaJson(Cliente $cliente)
    {
        $reparaciones = New Reparaciones();
        $clienteArray = [
            'ID_CLIENTE' => $cliente->getIdCliente(),
            'NOMBRE' => $cliente->getNombre(),
            'CEDULA' => $cliente->getCedula(),
            'TELEFONO' => $cliente->getTelefono(),
            'CORREO' => $cliente->getCorreo(),
            'OBSERVACIONES' => $cliente->getObservaciones(),
            'ENCARGADO' => $cliente->getEncargado(),
            'DISPOSITIVO' => $cliente->getDispositivo(),
            'MODELO' => $cliente->getModelo(),
            'BORRADOLOGICO' => $cliente->getBorradoLogico(),
            'DIAGNOSTICO' => $reparaciones->getDiagnostico(),
            'PRECIO' => $reparaciones->getPrecio(),
            'STATUS' => $reparaciones->getStatus(),
            'FECHA_INGRESO' => $reparaciones->getFechaIngreso(),
        ];
        return json_encode($clienteArray);
    }

    private function ClientesJson(array $datos)
    {
        $clienteArray = [];

        foreach ($datos as $par) {
            $cliente = $par['cliente'];
            $reparaciones = $par['reparacion'];

            $clienteArray[] = [
                'ID_CLIENTE' => $cliente->getIdCliente(),
                'NOMBRE' => $cliente->getNombre(),
                'CEDULA' => $cliente->getCedula(),
                'TELEFONO' => $cliente->getTelefono(),
                'CORREO' => $cliente->getCorreo(),
                'OBSERVACIONES' => $cliente->getObservaciones(),
                'ENCARGADO' => $cliente->getEncargado(),
                'DISPOSITIVO' => $cliente->getDispositivo(),
                'MODELO' => $cliente->getModelo(),
                'BORRADOLOGICO' => $cliente->getBorradoLogico(),
                'DIAGNOSTICO' => $reparaciones->getDiagnostico(),
                'PRECIO' => $reparaciones->getPrecio(),
                'STATUS' => $reparaciones->getStatus(),
                'FECHA_INGRESO' => $reparaciones->getFechaIngreso(),
            ];
        }

        return json_encode($clienteArray);
    }

    public function verTodo(){
        //Funcion para buscar todos
        //!Recordatorio action=verClienteTodo
        //echo "Controlador Cliente Todos<br>";
        $clienteM = new ClienteM();
        $clientes = $clienteM->BuscarTodos();
        $JSONCliente = $this->ClientesJson($clientes);
        require_once "./Vista/HistorialClientes.php";
    }
}
