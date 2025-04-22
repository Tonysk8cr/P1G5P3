<?php

class Reparaciones
{
    //Atributos
    private $idFormulario;
    private $diagnostico;
    private $status;
    private $precio;

    private $borradoLogico;

    private $fechaIngreso;

    /**
     * @return mixed
     */
    public function getFechaIngreso()
    {
        return $this->fechaIngreso;
    }

    /**
     * @param mixed $fechaIngreso
     */
    public function setFechaIngreso($fechaIngreso): void
    {
        $this->fechaIngreso = $fechaIngreso;
    }

    //Get y Set
    /**
     * @return mixed
     */
    public function getIdFormulario()
    {
        return $this->idFormulario;
    }

    /**
     * @param mixed $idFormulario
     */
    public function setIdFormulario($idFormulario): void
    {
        $this->idFormulario = $idFormulario;
    }

    /**
     * @return mixed
     */
    public function getDiagnostico()
    {
        return $this->diagnostico;
    }

    /**
     * @param mixed $diagnostico
     */
    public function setDiagnostico($diagnostico): void
    {
        $this->diagnostico = $diagnostico;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio): void
    {
        $this->precio = $precio;
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