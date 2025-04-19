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
                    `PROGRESO`, 
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
        $sql="SELECT * FROM `cliente` WHERE `ID`= $id AND `BORRADOLOGICO` = 1;";
        $resultado=$conexion->Ejecutar($sql);
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $cliente->setId($fila['ID']);
                $cliente->setNombre($fila['NOMBRE']);
                $cliente->setCedula($fila['CEDULA']);
                $cliente->setTelefono($fila['TELEFONO']);
                $cliente->setCorreo($fila['CORREO']);
                $cliente->setObservaciones($fila['OBSERVACIONES']);
                $cliente->setEncargado($fila['ENCARGADO']);
                $cliente->setDispositivo($fila['DISPOSITIVO']);
                $cliente->setModelo($fila['MODELO']);
                $cliente->setProgreso($fila['PROGRESO']);
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
        $sql="SELECT * FROM `cliente` WHERE `NOMBRE`= '$nombre' AND `BORRADOLOGICO` = 1;";
        $resultado=$conexion->Ejecutar($sql);
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $cliente = new Cliente();
                $cliente->setId($fila['ID']);
                $cliente->setNombre($fila['NOMBRE']);
                $cliente->setCedula($fila['CEDULA']);
                $cliente->setTelefono($fila['TELEFONO']);
                $cliente->setCorreo($fila['CORREO']);
                $cliente->setObservaciones($fila['OBSERVACIONES']);
                $cliente->setEncargado($fila['ENCARGADO']);
                $cliente->setDispositivo($fila['DISPOSITIVO']);
                $cliente->setModelo($fila['MODELO']);
                $cliente->setProgreso($fila['PROGRESO']);
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
        $sql="SELECT * FROM `cliente` WHERE `CEDULA`= '$cedula' AND `BORRADOLOGICO` = 1;";
        $resultado=$conexion->Ejecutar($sql);
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $cliente = new Cliente();
                $cliente->setId($fila['ID']);
                $cliente->setNombre($fila['NOMBRE']);
                $cliente->setCedula($fila['CEDULA']);
                $cliente->setTelefono($fila['TELEFONO']);
                $cliente->setCorreo($fila['CORREO']);
                $cliente->setObservaciones($fila['OBSERVACIONES']);
                $cliente->setEncargado($fila['ENCARGADO']);
                $cliente->setDispositivo($fila['DISPOSITIVO']);
                $cliente->setModelo($fila['MODELO']);
                $cliente->setProgreso($fila['PROGRESO']);
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
        $sql="SELECT * FROM `cliente` WHERE BORRADOLOGICO=1;";
        $resultado=$conexion->Ejecutar($sql);
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $cliente = new Cliente();
                $cliente->setId($fila['ID']);
                $cliente->setNombre($fila['NOMBRE']);
                $cliente->setCedula($fila['CEDULA']);
                $cliente->setTelefono($fila['TELEFONO']);
                $cliente->setCorreo($fila['CORREO']);
                $cliente->setObservaciones($fila['OBSERVACIONES']);
                $cliente->setEncargado($fila['ENCARGADO']);
                $cliente->setDispositivo($fila['DISPOSITIVO']);
                $cliente->setModelo($fila['MODELO']);
                $cliente->setProgreso($fila['PROGRESO']);
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
                      `PROGRESO`='".$cliente->getProgreso()."'
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
        $sql="UPDATE `cliente` SET 
                      `BORRADOLOGICO`='0' 
                  WHERE `ID` = ".$id.";";
        if($conexion->Ejecutar($sql))
            $retVal=true;
        $conexion->Cerrar();
        return $retVal;
    }


}