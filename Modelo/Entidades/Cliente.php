<?php

class Cliente
{
    //Atributos
    private $idCliente;
    private $nombre;
    private $cedula;
    private $telefono;
    private $correo;
    private $observaciones;
    private $encargado;
    private $dispositivo;
    private $modelo;
    private $borradoLogico;

    //Get y Set
    /**
     * @return mixed
     */
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * @param mixed $idCliente
     */
    public function setIdCliente($idCliente): void
    {
        $this->idCliente = $idCliente;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * @param mixed $cedula
     */
    public function setCedula($cedula): void
    {
        $this->cedula = $cedula;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono): void
    {
        $this->telefono = $telefono;
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
    public function setCorreo($correo): void
    {
        $this->correo = $correo;
    }

    /**
     * @return mixed
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * @param mixed $observaciones
     */
    public function setObservaciones($observaciones): void
    {
        $this->observaciones = $observaciones;
    }

    /**
     * @return mixed
     */
    public function getEncargado()
    {
        return $this->encargado;
    }

    /**
     * @param mixed $encargado
     */
    public function setEncargado($encargado): void
    {
        $this->encargado = $encargado;
    }

    /**
     * @return mixed
     */
    public function getDispositivo()
    {
        return $this->dispositivo;
    }

    /**
     * @param mixed $dispositivo
     */
    public function setDispositivo($dispositivo): void
    {
        $this->dispositivo = $dispositivo;
    }

    /**
     * @return mixed
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * @param mixed $modelo
     */
    public function setModelo($modelo): void
    {
        $this->modelo = $modelo;
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
    public function setBorradoLogico($borradoLogico): void
    {
        $this->borradoLogico = $borradoLogico;
    }
}