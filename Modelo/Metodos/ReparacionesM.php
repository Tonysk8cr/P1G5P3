<?php

require_once(__DIR__ . '/../Conexion.php');

class ReparacionesM
{
    public function Nuevo(Reparaciones $reparaciones)
    {
        $retVal=false;
        $conexion= new Conexion();
        $sql="INSERT INTO `formulario_reparacion`(
                       `DIAGNOSTICO`, 
                       `PRECIO`,
                       `STATUS`,
                       `BORRADOLOGICO`) 
                VALUES (
                        '".$reparaciones->getDiagnostico()."',
                        '".$reparaciones->getPrecio()."',
                         ".$reparaciones->getStatus()."
";
        if($conexion->Ejecutar($sql))
            $retVal=true;
        $conexion->Cerrar();
        return $retVal;
    }


    public function BuscarId($id)
    {
        $reparaciones = new Reparaciones();
        $conexion = new Conexion();

        $sql = "SELECT fr.* FROM formulario_reparacion fr
            INNER JOIN clientes_formularios cf ON fr.ID_FORMULARIO = cf.FORMULARIO_id
            INNER JOIN cliente c ON c.ID_CLIENTE = cf.CLIENTE_id
            WHERE fr.ID_FORMULARIO = $id AND fr.BORRADOLOGICO = 1";

        $resultado = $conexion->Ejecutar($sql);
        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $reparaciones->setIdFormulario($fila['ID_FORMULARIO']);
                $reparaciones->setDiagnostico($fila['DIAGNOSTICO']);
                $reparaciones->setPrecio($fila['PRECIO']);
                $reparaciones->setStatus($fila['STATUS']);
                $reparaciones->setBorradoLogico($fila['BORRADOLOGICO']);
            }
        } else {
            $reparaciones = null;
        }

        $conexion->Cerrar();
        return $reparaciones;
    }


    public function BuscarTodos()
    {
        $todos = array();
        $conexion = new Conexion();

        $sql = "SELECT fr.* FROM formulario_reparacion fr
            INNER JOIN clientes_formularios cf ON fr.ID_FORMULARIO = cf.FORMULARIO_id
            INNER JOIN cliente c ON c.ID_CLIENTE = cf.CLIENTE_id
            WHERE fr.BORRADOLOGICO = 1";

        $resultado = $conexion->Ejecutar($sql);
        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $reparaciones = new Reparaciones();
                $reparaciones->setIdFormulario($fila['ID_FORMULARIO']);
                $reparaciones->setDiagnostico($fila['DIAGNOSTICO']);
                $reparaciones->setPrecio($fila['PRECIO']);
                $reparaciones->setStatus($fila['STATUS']);
                $reparaciones->setBorradoLogico($fila['BORRADOLOGICO']);
                $todos[] = $reparaciones;
            }
        } else {
            $todos = null;
        }

        $conexion->Cerrar();
        return $todos;
    }

    public function Actualizar(Reparaciones $reparaciones)
    {
        $retVal=false;
        $conexion= new Conexion();
        $sql="UPDATE `formulario_reparacion` SET 
                      `DIAGNOSTICO`='".$reparaciones->getDiagnostico()."',
                      `PRECIO`='".$reparaciones->getPrecio()."',
                      `STATUS`='".$reparaciones->getStatus()."'
                  WHERE `ID` = ".$reparaciones->getIdFormulario().";";
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