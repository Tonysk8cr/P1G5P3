<?php

class Cliente
{
    private $id;
    private $nombre;
    private $cedula;
    private $telefono;
    private $correo;
    private $estado;
    private $observaciones;
    private $encargado;
    private $dispositivo;
    private $modelo;
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
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
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
    public function setCedula($cedula)
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
    public function setTelefono($telefono)
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
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function setProgreso($p) {
        $this->progreso = $p;
    }

    public function getProgreso() {
        return $this->progreso;
    }

    public function setObservaciones($o) { $this->observaciones = $o; }
    public function getObservaciones() { return $this->observaciones; }

    public function setEncargado($e) { $this->encargado = $e; }
    public function getEncargado() { return $this->encargado; }

    public function setDispositivo($d) { $this->dispositivo = $d; }
    public function getDispositivo() { return $this->dispositivo; }

    public function setModelo($m) { $this->modelo = $m; }
    public function getModelo() { return $this->modelo; }

}