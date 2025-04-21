<?php

require_once(__DIR__ . '/../Conexion.php');

class ClienteM
{
    public function Nuevo(Cliente $cliente, $conexion)
    {
        $retVal = false;

        $sql = "INSERT INTO `cliente`(
                    `NOMBRE`, 
                    `CEDULA`, 
                    `TELEFONO`, 
                    `CORREO`, 
                    `OBSERVACIONES`, 
                    `ENCARGADO`, 
                    `DISPOSITIVO`, 
                    `MODELO`, 
                    `ESTATUS`, 
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
            '".$cliente->getProgreso()."',
            '1')";

        if ($conexion->Ejecutar($sql)) {
            $retVal = true;
        }
        $conexion->Cerrar();
        return $retVal;
    }

    //BUSCAR ID
    public function BuscarId($id)
    {
        $cliente = new Cliente();
        $conexion= new Conexion();
        $sql = "SELECT * FROM cliente 
                LEFT JOIN historial_cliente 
                ON cliente.ID_CLIENTE = historial_cliente.ID_CLIENTE 
                LEFT JOIN formulario_reparacion 
                ON cliente.ID_CLIENTE = formulario_reparacion.ID_CLIENTE 
                WHERE cliente.ID_CLIENTE = $id AND formulario_reparacion.BORRADOLOGICO = 1";


        $resultado=$conexion->Ejecutar($sql);
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $cliente->setId($fila['ID_CLIENTE']);
                $cliente->setNombre($fila['NOMBRE']);
                $cliente->setCedula($fila['CEDULA']);
                $cliente->setTelefono($fila['TELEFONO']);
                $cliente->setCorreo($fila['CORREO']);
                $cliente->setObservaciones($fila['OBSERVACIONES']);
                $cliente->setEncargado($fila['ENCARGADO']);
                $cliente->setDispositivo($fila['DISPOSITIVO']);
                $cliente->setModelo($fila['MODELO']);
                $cliente->setProgreso($fila['ESTATUS']);
                $cliente->setBorradoLogico($fila['BORRADOLOGICO']);
            }
        }
        else
            $cliente=null;
        $conexion->Cerrar();
        return $cliente;
    }

                                        //BUSCAR NOMBRE
    public function BuscarNombre($nombre)
    {
        $todos=array();
        $conexion= new Conexion();
        $sql="SELECT * FROM cliente 
            LEFT JOIN historial_cliente 
            ON cliente.ID_CLIENTE = historial_cliente.ID_CLIENTE 
            LEFT JOIN formulario_reparacion 
            ON cliente.ID_CLIENTE = formulario_reparacion.ID_CLIENTE 
            WHERE cliente.NOMBRE = '$nombre' AND formulario_reparacion.BORRADOLOGICO = 1";

        $resultado=$conexion->Ejecutar($sql);
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $cliente = new Cliente();
                $cliente->setId($fila['ID_CLIENTE']);
                $cliente->setNombre($fila['NOMBRE']);
                $cliente->setCedula($fila['CEDULA']);
                $cliente->setTelefono($fila['TELEFONO']);
                $cliente->setCorreo($fila['CORREO']);
                $cliente->setObservaciones($fila['OBSERVACIONES']);
                $cliente->setEncargado($fila['ENCARGADO']);
                $cliente->setDispositivo($fila['DISPOSITIVO']);
                $cliente->setModelo($fila['MODELO']);
                $cliente->setProgreso($fila['ESTATUS']);
                $cliente->setBorradoLogico($fila['BORRADOLOGICO']);
                $todos[]=$cliente;
            }
        }
        else
            $todos=null;
        $conexion->Cerrar();
        return $todos;
    }

                                    //BUSCAR CEDULA
    public function BuscarCedula($cedula)
    {
        $todos=array();
        $conexion= new Conexion();
        $sql="SELECT * FROM cliente 
            LEFT JOIN historial_cliente 
            ON cliente.ID_CLIENTE = historial_cliente.ID_CLIENTE 
            LEFT JOIN formulario_reparacion 
            ON cliente.ID_CLIENTE = formulario_reparacion.ID_CLIENTE 
            WHERE cliente.CEDULA = '$cedula' AND formulario_reparacion.BORRADOLOGICO = 1;";

        $resultado=$conexion->Ejecutar($sql);
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $cliente = new Cliente();
                $cliente->setId($fila['ID_CLIENTE']);
                $cliente->setNombre($fila['NOMBRE']);
                $cliente->setCedula($fila['CEDULA']);
                $cliente->setTelefono($fila['TELEFONO']);
                $cliente->setCorreo($fila['CORREO']);
                $cliente->setObservaciones($fila['OBSERVACIONES']);
                $cliente->setEncargado($fila['ENCARGADO']);
                $cliente->setDispositivo($fila['DISPOSITIVO']);
                $cliente->setModelo($fila['MODELO']);
                $cliente->setProgreso($fila['ESTATUS']);
                $cliente->setBorradoLogico($fila['BORRADOLOGICO']);
                $todos[]=$cliente;
            }
        }
        else
            $todos=null;
        $conexion->Cerrar();
        return $todos;
    }

                                    //BUSCAR TODOS
    public function BuscarTodos()
    {
        $todos=array();
        $conexion= new Conexion();
        $sql="SELECT * FROM `cliente`
            LEFT JOIN historial_cliente 
            ON cliente.ID_CLIENTE = historial_cliente.ID_CLIENTE 
            LEFT JOIN formulario_reparacion 
            ON cliente.ID_CLIENTE = formulario_reparacion.ID_CLIENTE 
            WHERE BORRADOLOGICO=1;";
        $resultado=$conexion->Ejecutar($sql);
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $cliente = new Cliente();
                $cliente->setId($fila['ID_CLIENTE']);
                $cliente->setNombre($fila['NOMBRE']);
                $cliente->setCedula($fila['CEDULA']);
                $cliente->setTelefono($fila['TELEFONO']);
                $cliente->setCorreo($fila['CORREO']);
                $cliente->setObservaciones($fila['OBSERVACIONES']);
                $cliente->setEncargado($fila['ENCARGADO']);
                $cliente->setDispositivo($fila['DISPOSITIVO']);
                $cliente->setModelo($fila['MODELO']);
                $cliente->setProgreso($fila['ESTATUS']);
                $cliente->setBorradoLogico($fila['BORRADOLOGICO']);
                $todos[]=$cliente;
            }
        }
        else
            $todos=null;
        $conexion->Cerrar();
        return $todos;
    }
                                    //ACTUALIZAR
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
                      `MODELO`='".$cliente->getModelo()."',
                      `ESTATUS`='".$cliente->getProgreso()."'
                  WHERE `ID` = ".$cliente->getId().";";
        if($conexion->Ejecutar($sql))
            $retVal=true;
        $conexion->Cerrar();
        return $retVal;
    }

                                //Borrado logico
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