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
        $reparacion = [];
        $reparaciones = new Reparaciones();
        $conexion = new Conexion();

        $sql = "SELECT * FROM cliente
            LEFT JOIN clientes_formularios 
                ON cliente.ID_CLIENTE = clientes_formularios.CLIENTE_id
            LEFT JOIN formulario_reparacion 
                ON formulario_reparacion.ID_FORMULARIO = clientes_formularios.FORMULARIO_id
            WHERE cliente.BORRADOLOGICO = 1 AND 
                  cliente.ID_CLIENTE = $id AND 
                  formulario_reparacion.BORRADOLOGICO = 1";


        $resultado = $conexion->Ejecutar($sql);

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $reparaciones->setIdFormulario($fila['ID_FORMULARIO']);
                $reparaciones->setDiagnostico($fila['DIAGNOSTICO']);
                $reparaciones->setPrecio($fila['PRECIO']);
                $reparaciones->setStatus($fila['STATUS']);
                $reparaciones->setFechaIngreso($fila['FECHA_INGRESO']);
                $reparaciones->setBorradoLogico($fila['BORRADOLOGICO']);

                //Info que proviene de clientes
                $cliente = new Cliente();
                $cliente->setNombre($fila['NOMBRE']);
                $cliente->setCedula($fila['CEDULA']);
                $cliente->setTelefono($fila['TELEFONO']);
                $cliente->setCorreo($fila['CORREO']);
                $cliente->setObservaciones($fila['OBSERVACIONES']);
                $cliente->setEncargado($fila['ENCARGADO']);
                $cliente->setDispositivo($fila['DISPOSITIVO']);
                $cliente->setModelo($fila['MODELO']);

                //Guardamos como par
                $reparacion[]=['reparacion' => $reparaciones, 'cliente' => $cliente];
            }
        } else {
            $reparacion = null;
        }
        return $reparacion;
    }


    public function DiagnosticoActualzado(Reparaciones $reparaciones)
    {
        $retVal=false;
        $conexion= new Conexion();
        $sql="UPDATE `formulario_reparacion` SET 
                      `DIAGNOSTICO`='".$reparaciones->getDiagnostico()."'
                  WHERE `ID_FORMULARIO` = ".$reparaciones->getIdFormulario().";";
        if($conexion->Ejecutar($sql))
            $retVal=true;
        $conexion->Cerrar();
        return $retVal;
    }

    public function PrecioActualizado(Reparaciones $reparaciones)
    {
        $retVal=false;
        $conexion= new Conexion();
        $sql="UPDATE `formulario_reparacion` SET
            `PRECIO`='".$reparaciones->getPrecio()."'
            WHERE `ID_FORMULARIO` = ".$reparaciones->getIdFormulario().";";
        if($conexion->Ejecutar($sql))
            $retVal=true;
        $conexion->Cerrar();
        return $retVal;
    }

    public function StatusActualizado(Reparaciones $reparaciones)
    {
        $retVal=false;
        $conexion= new Conexion();
        $sql="UPDATE `formulario_reparacion` SET
            `STATUS`='".$reparaciones->getStatus()."'
            WHERE `ID_FORMULARIO` = ".$reparaciones->getIdFormulario().";";
        if($conexion->Ejecutar($sql))
            $retVal=true;
        $conexion->Cerrar();
        return $retVal;
    }

    //Borrado logico
    public function BorradoLogico(Reparaciones $reparaciones)
    {
        $retVal=false;
        $conexion= new Conexion();
        $sql="UPDATE `formulario_reparacion` SET 
                      `BORRADOLOGICO`='".$reparaciones->getBorradologico()."'
                  WHERE `ID_FORMULARIO` = ".$reparaciones->getIdFormulario().";";
        if($conexion->Ejecutar($sql))
            $retVal=true;
        $conexion->Cerrar();
        return $retVal;
    }
}