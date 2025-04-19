<?php
require_once(__DIR__ . '/../Conexion.php');

class UsuarioM
{
                                //Crear nuevo usuario
    public function Nuevo(Usuario $usuario)
    {
        $retVal=false;
        $conexion= new Conexion();
        $sql="INSERT INTO `usuario`(
                        `CORREO`, 
                        `CONTRASENA`, 
                        `ROL`,
                        `BORRADOLOGICO`)
                VALUES (
                        '".$usuario->getCorreo()."',
                        '".$usuario->getContrasena()."',
                        '".$usuario->getRol()."',
                        '1')";
        if($conexion->Ejecutar($sql))
            $retVal=true;
        $conexion->Cerrar();
        return $retVal;
    }

                                //Busqueda de usuarios por ID
    public function BuscarId($id)
    {
        $usuario = new Usuario();
        $conexion= new Conexion();
        $sql="SELECT * FROM `usuario` WHERE `ID`= $id AND `BORRADOLOGICO` = 1;";
        $resultado=$conexion->Ejecutar($sql);
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $usuario->setId($fila['ID']);
                $usuario->setCorreo($fila['CORREO']);
                $usuario->setContrasena($fila['CONTRASENA']);
                $usuario->setRol($fila['ROL']);
                $usuario->setBorradoLogico($fila['BORRADOLOGICO']);
            }
        }
        else
            $usuario=null;
        $conexion->Cerrar();
        return $usuario;
    }

                                //Busqueda de usuarios por rol
    public function BuscarRol($rol)
    {
        $todos=array();
        $conexion= new Conexion();
        $sql="SELECT * FROM `usuario` WHERE `ROL`= '$rol' AND `BORRADOLOGICO` = 1;";
        $resultado=$conexion->Ejecutar($sql);
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $usuario = new Usuario();
                $usuario->setId($fila['ID']);
                $usuario->setCorreo($fila['CORREO']);
                $usuario->setContrasena($fila['CONTRASENA']);
                $usuario->setRol($fila['ROL']);
                $usuario->setBorradoLogico($fila['BORRADOLOGICO']);
                $todos[]=$usuario;
            }
        }
        else
            $todos=null;
        $conexion->Cerrar();
        return $todos;
    }

                            //Buscar todos
    public function BuscarTodos()
    {
        $todos=array();
        $conexion= new Conexion();
        $sql="SELECT * FROM `usuario` WHERE BORRADOLOGICO=1;";
        $resultado=$conexion->Ejecutar($sql);
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $usuario = new Usuario();
                $usuario->setId($fila['ID']);
                $usuario->setCorreo($fila['CORREO']);
                $usuario->setContrasena($fila['CONTRASENA']);
                $usuario->setRol($fila['ROL']);
                $usuario->setBorradoLogico($fila['BORRADOLOGICO']);
                $todos[]=$usuario;
            }
        }
        else
            $todos=null;
        $conexion->Cerrar();
        return $todos;
    }

                            //Actualizar
    public function Actualizar(Usuario $usuario)
    {
        $retVal=false;
        $conexion= new Conexion();
        $sql="UPDATE `usuario` SET 
                      `CORREO`='".$usuario->getCorreo()."',
                      `CONTRASENA`='".$usuario->getContrasena()."',
                      `ROL`='".$usuario->getRol()."'
                  WHERE `ID` = ".$usuario->getId().";";
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
        $sql="UPDATE `usuario` SET 
                      `BORRADOLOGICO`='0' 
                  WHERE `ID` = ".$id.";";
        if($conexion->Ejecutar($sql))
            $retVal=true;
        $conexion->Cerrar();
        return $retVal;
    }
}