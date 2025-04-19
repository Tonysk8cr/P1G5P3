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
                       `ESTADO`,
                       `BORRADOLOGICO`) 
                VALUES (
                        '".$reparaciones->getDispositivo()."',
                        '".$reparaciones->getModelo()."',
                        '".$reparaciones->getEncargado()."',
                        '".$reparaciones->getIdCliente()."',
                        '".$reparaciones->getObservaciones()."',
                        '".$reparaciones->getDiagnostico()."',
                        '".$reparaciones->getPrecio()."',
                        '".$reparaciones->getEstado()."',
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
        $sql="SELECT * FROM `reparaciones` WHERE `ID`= $id AND `BORRADOLOGICO` = 1;";
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
                $reparaciones->setBorradoLogico($fila['BORRADOLOGICO']);
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
        $sql="SELECT * FROM `reparaciones` WHERE `DISPOSITIVO`= '".$dispositivo."' AND `BORRADOLOGICO` = 1;";
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
                $reparaciones->setBorradoLogico($fila['BORRADOLOGICO']);
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
        $sql="SELECT * FROM `reparaciones` WHERE BORRADOLOGICO=1;";
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
                $reparaciones->setBorradoLogico($fila['BORRADOLOGICO']);
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
        $retVal=false;
        $conexion= new Conexion();
        $sql="UPDATE `reparaciones` SET 
                      `DISPOSITIVO`='".$reparaciones->getDispositivo()."',
                      `MODELO`='".$reparaciones->getModelo()."',
                      `ENCARGADO`='".$reparaciones->getEncargado()."',
                      `IDCLIENTE`='".$reparaciones->getIdCliente()."',
                      `OBSERVACIONES`='".$reparaciones->getObservaciones()."',
                      `DIAGNOSTICO`='".$reparaciones->getDiagnostico()."',
                      `PRECIO`='".$reparaciones->getPrecio()."',
                      `ESTADO`='".$reparaciones->getEstado()."'
                  WHERE `ID` = ".$reparaciones->getId().";";
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
        $sql="UPDATE `reparaciones` SET 
                      `BORRADOLOGICO`='0' 
                  WHERE `ID` = ".$id.";";
        if($conexion->Ejecutar($sql))
            $retVal=true;
        $conexion->Cerrar();
        return $retVal;
    }
}