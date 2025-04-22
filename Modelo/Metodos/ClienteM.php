<?php

require_once(__DIR__ . '/../Conexion.php');

class ClienteM
{
    public function Nuevo(Cliente $cliente, $conexion)
    {
        $retVal = false;

        // 1. Insertar cliente
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
        $conexion->Cerrar();
        return $retVal;
    }

    public function UltimoIdInsertado()
    {
        return $this->conn->insert_id;
    }

    public function BuscarId($id)
    {
        $cliente = new Cliente();
        $conexion= new Conexion();
        $sql = "SELECT * FROM cliente 
                LEFT JOIN historial_cliente 
                ON cliente.ID_CLIENTE = historial_cliente.ID_CLIENTE 
                WHERE cliente.ID_CLIENTE = $id";

        $resultado=$conexion->Ejecutar($sql);
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
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
            }
        }
        else
            $cliente=null;
        $conexion->Cerrar();
        return $cliente;
    }

    public function BuscarNombre($nombre)
    {
        $todos=array();
        $conexion= new Conexion();
        $sql="SELECT * FROM cliente 
            LEFT JOIN historial_cliente 
            ON cliente.ID_CLIENTE = historial_cliente.ID_CLIENTE 
            WHERE cliente.NOMBRE = '$nombre' AND cliente.BORRADOLOGICO = 1";

        $resultado=$conexion->Ejecutar($sql);
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
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
                $todos[]=$cliente;
            }
        }
        else
            $todos=null;
        $conexion->Cerrar();
        return $todos;
    }

    public function BuscarCedula($cedula)
    {
        $todos=array();
        $conexion= new Conexion();
        $sql="SELECT * FROM cliente 
            LEFT JOIN historial_cliente 
            ON cliente.ID_CLIENTE = historial_cliente.ID_CLIENTE 
            WHERE cliente.CEDULA = '$cedula' AND cliente.BORRADOLOGICO = 1;";

        $resultado=$conexion->Ejecutar($sql);
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
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
                $todos[]=$cliente;
            }
        }
        else
            $todos=null;
        $conexion->Cerrar();
        return $todos;
    }

    public function BuscarTodos()
    {
        $todos=array();
        $conexion= new Conexion();
        $sql="SELECT * FROM cliente
            LEFT JOIN historial_cliente 
            ON cliente.ID_CLIENTE = historial_cliente.ID_CLIENTE 
            WHERE cliente.BORRADOLOGICO=1;";

        $resultado=$conexion->Ejecutar($sql);
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
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
                $todos[]=$cliente;
            }
        }
        else
            $todos=null;
        $conexion->Cerrar();
        return $todos;
    }

    public function Actualizar(Cliente $cliente)
    {
        $retVal=false;
        $conexion= new Conexion();
        $sql="UPDATE `cliente` SET 
                      `NOMBRE`='".$cliente->getNombre()."',
                      `CEDULA`='".$cliente->getCedula()."',
                      `TELEFONO`='".$cliente->getTelefono()."',
                      `CORREO`='".$cliente->getCorreo()."',
                      `OBSERVACIONES`='".$cliente->getObservaciones()."',
                      `ENCARGADO`='".$cliente->getEncargado()."',
                      `DISPOSITIVO`='".$cliente->getDispositivo()."',
                      `MODELO`='".$cliente->getModelo()."'
                  WHERE `ID_CLIENTE` = ".$cliente->getIdCliente().";";
        if($conexion->Ejecutar($sql))
            $retVal=true;
        $conexion->Cerrar();
        return $retVal;
    }

    public function BorradoLogico($id)
    {
        $retVal=false;
        $conexion= new Conexion();
        $sql="UPDATE `formulario_reparacion` SET 
                      `BORRADOLOGICO`='0' 
                  WHERE `ID_CLIENTE` = ".$id.";";
        if($conexion->Ejecutar($sql))
            $retVal=true;
        $conexion->Cerrar();
        return $retVal;
    }
}