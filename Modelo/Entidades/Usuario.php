<?php

class Usuario
{
    private $id;
    private $correo;
    private $contrasena;
    private $rol;
    private $borradoLogico;

    private $progreso;



    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * @param mixed $correo
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    /**
     * @return mixed
     */
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     * @param mixed $contrasena
     */
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }

    /**
     * @return mixed
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * @param mixed $rol
     */
    public function setRol($rol)
    {
        $this->rol = $rol;
    }

    /**
     * @return mixed
     */
    public function getBorradoLogico()
    {
        return $this->borradoLogico;
    }

    /**
     * @param mixed $borradoLogico
     */
    public function setBorradoLogico($borradoLogico)
    {
        $this->borradoLogico = $borradoLogico;
    }

    public function setProgreso($p) {
        $this->progreso = $p;
    }

    public function getProgreso() {
        return $this->progreso;
    }


}