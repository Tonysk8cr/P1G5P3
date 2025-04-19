<?php

require_once(__DIR__ . '/../Conexion.php');

class ReparacionesM
{
    public function Nuevo(Reparaciones $reparaciones)
    {
        $retVal=false;
        $conexion= new Conexion();
        $sql="INSERT INTO `reparaciones`(
                       `DISPOSITIVO`, 
                       `MODELO`, 
                       `ENCARGADO`, 
                       `IDCLIENTE`, 
                       `OBSERVACIONES`, 
                       `DIAGNOSTICO`, 
                       `PRECIO`, 
                       `ESTADO`) 
                VALUES (
                        '".$reparaciones->getDispositivo()."',
                        '".$reparaciones->getModelo()."',
                        '".$reparaciones->getEncargado()."',
                        '".$reparaciones->getIdCliente()."',
                        '".$reparaciones->getObservaciones()."',
                        '".$reparaciones->getDiagnostico()."',
                        '".$reparaciones->getPrecio()."',
                        '1')";
        if($conexion->Ejecutar($sql))
            $retVal=true;
        $conexion->Cerrar();
        return $retVal;
    }

                                            //BUSCAR ID
    public function BuscarId($id)
    {
        $reparaciones = new Reparaciones();
        $conexion= new Conexion();
        $sql="SELECT * FROM `reparaciones` WHERE `ID`= $id;";
        $resultado=$conexion->Ejecutar($sql);
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $reparaciones->setId($fila['ID']);
                $reparaciones->setDispositivo($fila['DISPOSITIVO']);
                $reparaciones->setModelo($fila['MODELO']);
                $reparaciones->setEncargado($fila['ENCARGADO']);
                $reparaciones->setIdCliente($fila['IDCLIENTE']);
                $reparaciones->setObservaciones($fila['OBSERVACIONES']);
                $reparaciones->setDiagnostico($fila['DIAGNOSTICO']);
                $reparaciones->setPrecio($fila['PRECIO']);
                $reparaciones->setEstado($fila['ESTADO']);
            }
        }
        else
            $reparaciones=null;
        $conexion->Cerrar();
        return $reparaciones;
    }

                                        //BUSCAR DISPOSITIVO
    public function BuscarDispositivo($dispositivo)
    {
        $todos=array();
        $conexion= new Conexion();
        $sql="SELECT * FROM `reparaciones` WHERE `DISPOSITIVO`= $dispositivo;";
        $resultado=$conexion->Ejecutar($sql);
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $reparaciones = new Reparaciones();
                $reparaciones->setId($fila['ID']);
                $reparaciones->setDispositivo($fila['DISPOSITIVO']);
                $reparaciones->setModelo($fila['MODELO']);
                $reparaciones->setEncargado($fila['ENCARGADO']);
                $reparaciones->setIdCliente($fila['IDCLIENTE']);
                $reparaciones->setObservaciones($fila['OBSERVACIONES']);
                $reparaciones->setDiagnostico($fila['DIAGNOSTICO']);
                $reparaciones->setPrecio($fila['PRECIO']);
                $reparaciones->setEstado($fila['ESTADO']);
                $todos[]=$reparaciones;
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
        $sql="SELECT * FROM `reparaciones`;";
        $resultado=$conexion->Ejecutar($sql);
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $reparaciones = new Reparaciones();
                $reparaciones->setId($fila['ID']);
                $reparaciones->setDispositivo($fila['DISPOSITIVO']);
                $reparaciones->setModelo($fila['MODELO']);
                $reparaciones->setEncargado($fila['ENCARGADO']);
                $reparaciones->setIdCliente($fila['IDCLIENTE']);
                $reparaciones->setObservaciones($fila['OBSERVACIONES']);
                $reparaciones->setDiagnostico($fila['DIAGNOSTICO']);
                $reparaciones->setPrecio($fila['PRECIO']);
                $reparaciones->setEstado($fila['ESTADO']);
                $todos[]=$reparaciones;
            }
        }
        else
            $todos=null;
        $conexion->Cerrar();
        return $todos;
    }
                                            //ACTUALIZAR
    public function Actualizar(Reparaciones $reparaciones)
    {
        $retval=false;
        $conexion= new Conexion();
        $sql="UPDATE `reparaciones` SET 
                      `DISPOSITIVO`='".$reparaciones->getDispositivo()."',
                      `MODELO`='".$reparaciones->getModelo()."',
                      `ENCARGADO`='".$reparaciones->getEncargado()."',
                      `IDCLIENTE`='".$reparaciones->getICliente()."',
                      `OBSERVACIONES`='".$reparaciones->getObservaciones()."',
                      `DIAGNOSTICO`='".$reparaciones->getDiagnostico()."',
                      `PRECIO`='".$reparaciones->getPrecio()."',
                  WHERE `ID` = ".$reparaciones->getId().";";
        if($conexion->Ejecutar($sql))
            $retVal=true;
        $conexion->Cerrar();
        return $retval;
    }

                                            //Borrado logico
    public function BorradoLogico($id)
    {
        $retVal=false;
        $conexion= new Conexion();
        $sql="UPDATE `reparacioens` SET 
                      `ESTADO`='0' 
                  WHERE `ID` = ".$id.";";
        if($conexion->Ejecutar($sql))
            $retVal=true;
        $conexion->Cerrar();
        return $retVal;
    }
}