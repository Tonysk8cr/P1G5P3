<?php
session_start();
require_once __DIR__ . '/../Modelo/Conexion.php';
require_once __DIR__ . '/../Modelo/Entidades/Cliente.php';
require_once __DIR__ . '/../Modelo/Metodos/ClienteM.php';

class ControladorCliente
{
    private function ClienteaJson(Cliente $cliente)
    {
        $clienteArray = [
            'ID_CLIENTE' => $cliente->getId(),
            'NOMBRE' => $cliente->getNombre(),
            'CEDULA' => $cliente->getCedula(),
            'TELEFONO' => $cliente->getTelefono(),
            'CORREO' => $cliente->getCorreo(),
            'OBSERVACIONES' => $cliente->getObservaciones(),
            'ENCARGADO' => $cliente->getEncargado(),
            'DISPOSITIVO' => $cliente->getDispositivo(),
            'MODELO' => $cliente->getModelo(),
            'ESTATUS' => $cliente->getProgreso(),
            'BORRADOLOGICO' => $cliente->getBorradoLogico()
        ];
        return json_encode($clienteArray);
    }

    private function ClientesJson(array $clientes)
    {
        $clienteArray = [];
        foreach ($clientes as $cliente) {
            $clienteArray[] = [
                'ID_CLIENTE' => $cliente->getId(),
                'NOMBRE' => $cliente->getNombre(),
                'CEDULA' => $cliente->getCedula(),
                'TELEFONO' => $cliente->getTelefono(),
                'CORREO' => $cliente->getCorreo(),
                'OBSERVACIONES' => $cliente->getObservaciones(),
                'ENCARGADO' => $cliente->getEncargado(),
                'DISPOSITIVO' => $cliente->getDispositivo(),
                'MODELO' => $cliente->getModelo(),
                'ESTATUS' => $cliente->getProgreso(),
                'BORRADOLOGICO' => $cliente->getBorradoLogico()
            ];
        }
        return json_encode($clienteArray);
    }

    public function verId(){
        //Funcion pora ver por ID especifico
        echo "Controlador Cliente ID<br>";
        $cliente = new Cliente();
        $clienteM = new ClienteM();
        $cliente = $clienteM->BuscarId(1);
        $JSONCliente = $this->ClienteaJson($cliente);
        //var_dump($JSONCliente);
    }

    public function verNombre(){
        //Funcion para buscar por nombre
        echo "Controlador Cliente Nombre<br>";
        $clienteM = new ClienteM();
        $clientes = $clienteM->BuscarNombre("Cristian");
        $JSONCliente = $this->ClientesJson($clientes);
        //var_dump($JSONCliente);
    }

    public function verCedula(){
        //Funcion para buscar por cedula
        echo "Controlador Cliente cedula<br>";
        $clienteM = new ClienteM();
        $clientes = $clienteM->BuscarCedula("111111111");
        $JSONCliente = $this->ClientesJson($clientes);
        //var_dump($JSONCliente);
    }

    public function verTodo(){
        //Funcion para buscar todos
        //!Recordatorio action=verClienteTodo
        echo "Controlador Cliente Todos<br>";
        $clienteM = new ClienteM();
        $clientes = $clienteM->BuscarTodos();
        $JSONCliente = $this->ClientesJson($clientes);
        //var_dump($JSONCliente);
    }
}
