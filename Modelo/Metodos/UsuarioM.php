<?php

class UsuarioM
{
                                //Crear nuevo usuario
    public function Nuevo(Usuario $usuario)
    {
        $retval=false;
        $conexion= new Conexion();
        $sql="INSERT INTO `usuario`(
                       `CORREO`, 
                       `CONTRASENA`, 
                      `ROL`,
                       `ESTADO`)
                VALUES (
                        '".$usuario->getCorreo()."',
                        '".$usuario->getContrasena()."',
                        '".$usuario->getRol()."',
                        '1')";
        if($conexion->Ejecutar($sql))
            $retVal=true;
        $conexion->Cerrar();
        return $retval;
    }

                                //Busqueda de usuarios por ID
    public function BuscarId($id)
    {
        $usuario = new Usuario();
        $conexion= new Conexion();
        $sql="SELECT * FROM `usuario` WHERE `ID`= $id;";
        $resultado=$conexion->Ejecutar($sql);
        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $usuario->setId($fila['ID']);
                $usuario->setCorreo($fila['CORREO']);
                $usuario->setContrasena($fila['CONTRASENA']);
                $usuario->setRol($fila['ROL']);
                $usuario->setEstado($fila['ESTADO']);
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
        $sql="SELECT * FROM `usuario` WHERE `ROL`= $rol;";
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
                $usuario->setEstado($fila['ESTADO']);
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
        $sql="SELECT * FROM `usuario`;";
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
                $usuario->setEstado($fila['ESTADO']);
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
        $retval=false;
        $conexion= new Conexion();
        $sql="UPDATE `usuario` SET 
                      `CORREO`='".$usuario->getCorreo()."',
                      `CONTRASENA`='".$usuario->getContrasena()."',
                      `ROL`='".$usuario->getRol()."',
                  WHERE `ID` = ".$usuario->getId().";";
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
        $sql="UPDATE `usuario` SET 
                      `ESTADO`='0' 
                  WHERE `ID` = ".$id.";";
        if($conexion->Ejecutar($sql))
            $retVal=true;
        $conexion->Cerrar();
        return $retVal;
    }
}