<?php

require_once(__DIR__ . '/../Conexion.php');

class ClienteM
{
    public function Nuevo(Cliente $cliente, $conexion)
    {
        $retVal = false;

        //Insertar cliente
        $sql = "INSERT INTO `cliente`(
                `NOMBRE`, 
                `CEDULA`, 
                `TELEFONO`, 
                `CORREO`, 
                `OBSERVACIONES`, 
                `ENCARGADO`, 
                `DISPOSITIVO`, 
                `MODELO`,  
                `BORRADOLOGICO`) 
    VALUES (
        '".$cliente->getNombre()."',
        '".$cliente->getCedula()."',
        '".$cliente->getTelefono()."',
        '".$cliente->getCorreo()."',
        '".$cliente->getObservaciones()."',
        '".$cliente->getEncargado()."',
        '".$cliente->getDispositivo()."',
        '".$cliente->getModelo()."',
        1)";

        if ($conexion->Ejecutar($sql)) {
            $idCliente = $conexion->UltimoIdInsertado();

            //Insertar formulario_reparacion
            $sqlFormulario = "INSERT INTO formulario_reparacion (DIAGNOSTICO, PRECIO, STATUS, FECHA_INGRESO, BORRADOLOGICO) 
                          VALUES ('', 0, '', CURDATE(), 1)";

            if ($conexion->Ejecutar($sqlFormulario)) {
                $idFormulario = $conexion->UltimoIdInsertado();

                //Insertar en la tabla Muchos a Muchos
                $sqlIntermedia = "INSERT INTO Clientes_Formularios (CLIENTE_id, FORMULARIO_id)
                              VALUES ($idCliente, $idFormulario)";

                if ($conexion->Ejecutar($sqlIntermedia)) {
                    $retVal = true;
                }
            }
        }
        return $retVal;
    }

    public function UltimoIdInsertado()
    {
        return $this->conn->insert_id;
    }

    public function BuscarTodos()
    {
        $todos = [];
        $conexion = new Conexion();

        $sql = "SELECT * FROM cliente
        LEFT JOIN clientes_formularios 
            ON cliente.ID_CLIENTE = clientes_formularios.CLIENTE_id
        LEFT JOIN formulario_reparacion 
            ON formulario_reparacion.ID_FORMULARIO = clientes_formularios.FORMULARIO_id
        WHERE cliente.BORRADOLOGICO = 1
        AND formulario_reparacion.BORRADOLOGICO = 1;";

        $resultado = $conexion->Ejecutar($sql);

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                // Cliente
                $cliente = new Cliente();
                $cliente->setIdCliente($fila['ID_CLIENTE']);
                $cliente->setNombre($fila['NOMBRE']);
                $cliente->setCedula($fila['CEDULA']);
                $cliente->setTelefono($fila['TELEFONO']);
                $cliente->setCorreo($fila['CORREO']);
                $cliente->setObservaciones($fila['OBSERVACIONES']);
                $cliente->setEncargado($fila['ENCARGADO']);
                $cliente->setDispositivo($fila['DISPOSITIVO']);
                $cliente->setModelo($fila['MODELO']);
                $cliente->setBorradoLogico($fila['BORRADOLOGICO']);

                // Reparaciones
                $reparaciones = new Reparaciones();
                $reparaciones->setDiagnostico($fila['DIAGNOSTICO']);
                $reparaciones->setStatus($fila['STATUS']);
                $reparaciones->setPrecio($fila['PRECIO']);
                $reparaciones->setFechaIngreso($fila['FECHA_INGRESO']);

                // Guardar ambos como un par
                $todos[] = ['cliente' => $cliente, 'reparacion' => $reparaciones];
            }
        } else {
            $todos = [];
        }

        return $todos;
    }


    public function BorradoLogico($id)
    {
        $retVal=false;
        $conexion= new Conexion();
        $sql="UPDATE `cliente` SET 
                      `BORRADOLOGICO`='0' 
                  WHERE `ID_CLIENTE` = ".$id.";";
        if($conexion->Ejecutar($sql))
            $retVal=true;
        $conexion->Cerrar();
        return $retVal;
    }
}