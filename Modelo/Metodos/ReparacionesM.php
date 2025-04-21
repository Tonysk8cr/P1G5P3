<?php

require_once(__DIR__ . '/../Conexion.php');

class ReparacionesM
{
    public function Nuevo(Reparaciones $reparaciones)
    {
        $retVal=false;
        $conexion= new Conexion();
        $sql="INSERT INTO `formulario_reparacion`(
                       `DISPOSITIVO`, 
                       `MODELO`, 
                       `ENCARGADO`, 
                       `ID_CLIENTE`, 
                       `OBSERVACIONES`, 
                       `DIAGNOSTICO`, 
                       `PRECIO_ESTIMADO`,
                       `ESTATUS`,
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

        // CAMBIAR `ID` por `ID_FORMULARIO`
        $sql="SELECT * FROM `formulario_reparacion`
         LEFT JOIN cliente
         ON cliente.ID_CLIENTE = formulario_reparacion.ID_CLIENTE
         LEFT JOIN historial_cliente
         ON cliente.ID_CLIENTE = historial_cliente.ID_CLIENTE
         WHERE formulario_reparacion.ID_FORMULARIO = $id AND formulario_reparacion.BORRADOLOGICO = 1";

        $resultado=$conexion->Ejecutar($sql);
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $reparaciones->setId($fila['ID_FORMULARIO']);
                $reparaciones->setDispositivo($fila['DISPOSITIVO']);
                $reparaciones->setModelo($fila['MODELO']);
                $reparaciones->setEncargado($fila['ENCARGADO']);
                $reparaciones->setIdCliente($fila['ID_CLIENTE']);
                $reparaciones->setObservaciones($fila['OBSERVACIONES']);
                $reparaciones->setDiagnostico($fila['DIAGNOSTICO']);
                $reparaciones->setPrecio($fila['PRECIO_ESTIMADO']);
                $reparaciones->setEstado($fila['ESTATUS']);
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
        $sql="SELECT * FROM `formulario_reparacion`
            LEFT JOIN cliente
            ON cliente.ID_CLIENTE = formulario_reparacion.ID_CLIENTE
            LEFT JOIN historial_cliente
            ON cliente.ID_CLIENTE = historial_cliente.ID_CLIENTE
            WHERE cliente.DISPOSITIVO = '$dispositivo'
            AND formulario_reparacion.BORRADOLOGICO = 1;";
        $resultado=$conexion->Ejecutar($sql);
        if(mysqli_num_rows($resultado)>0)
        {

            while($fila=$resultado->fetch_assoc())
            {
                $reparaciones = new Reparaciones();
                $reparaciones->setId($fila['ID_FORMULARIO']);
                $reparaciones->setDispositivo($fila['DISPOSITIVO']);
                $reparaciones->setModelo($fila['MODELO']);
                $reparaciones->setEncargado($fila['ENCARGADO']);
                $reparaciones->setIdCliente($fila['ID_CLIENTE']);
                $reparaciones->setObservaciones($fila['OBSERVACIONES']);
                $reparaciones->setDiagnostico($fila['DIAGNOSTICO']);
                $reparaciones->setPrecio($fila['PRECIO_FINAL']);
                $reparaciones->setEstado($fila['ESTATUS']);
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
        $sql="SELECT * FROM `formulario_reparacion`
            LEFT JOIN cliente
            ON cliente.ID_CLIENTE = formulario_reparacion.ID_CLIENTE
            LEFT JOIN historial_cliente
            ON cliente.ID_CLIENTE = historial_cliente.ID_CLIENTE
            Where BORRADOLOGICO = 1;";
        $resultado=$conexion->Ejecutar($sql);
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $reparaciones = new Reparaciones();
                $reparaciones->setId($fila['ID_FORMULARIO']);
                $reparaciones->setDispositivo($fila['DISPOSITIVO']);
                $reparaciones->setModelo($fila['MODELO']);
                $reparaciones->setEncargado($fila['ENCARGADO']);
                $reparaciones->setIdCliente($fila['ID_CLIENTE']);
                $reparaciones->setObservaciones($fila['OBSERVACIONES']);
                $reparaciones->setDiagnostico($fila['DIAGNOSTICO']);
                $reparaciones->setPrecio($fila['PRECIO_FINAL']);
                $reparaciones->setEstado($fila['ESTATUS']);
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
        $sql="UPDATE `formulario_reparacion` SET 
                      `DISPOSITIVO`='".$reparaciones->getDispositivo()."',
                      `MODELO`='".$reparaciones->getModelo()."',
                      `ENCARGADO`='".$reparaciones->getEncargado()."',
                      `ID_CLIENTE`='".$reparaciones->getIdCliente()."',
                      `OBSERVACIONES`='".$reparaciones->getObservaciones()."',
                      `DIAGNOSTICO`='".$reparaciones->getDiagnostico()."',
                      `PRECIO_ESTIMADO`='".$reparaciones->getPrecio()."',
                      `ESTATUS`='".$reparaciones->getEstado()."'
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
        $sql="UPDATE `formulario_reparacion` SET 
                      `BORRADOLOGICO`='0' 
                  WHERE `ID_FORMULARIO` = ".$id.";";
        if($conexion->Ejecutar($sql))
            $retVal=true;
        $conexion->Cerrar();
        return $retVal;
    }
}