<?php

class Equipo
{
    private $idequipo;
    private $serie;
    private $tipo;
    private $marca;
    private $modelo;
    private $accesorios;
    private $falla;
    private $idcliente;

    /**
     * @return mixed
     */
    public function getIdEquipo()
    {
        return $this->idequipo;
    }

    /**
     * @param mixed $idequipo
     */
    public function setId($idequipo)
    {
        $this->idequipo = $idequipo;
    }

    /**
     * @return mixed
     */
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * @param mixed $serie
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * @return mixed
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * @param mixed $marca
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;
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
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    /**
     * @return mixed
     */
    public function getAccesorios()
    {
        return $this->accesorios;
    }

    /**
     * @param mixed $accesorios
     */
    public function setAccesorios($accesorios)
    {
        $this->accesorios = $accesorios;
    }

    /**
     * @return mixed
     */
    public function getFalla()
    {
        return $this->falla;
    }

    /**
     * @param mixed $falla
     */
    public function setFalla($falla)
    {
        $this->falla = $falla;
    }

    /**
     * @return mixed
     */
    public function getIdcliente()
    {
        return $this->idcliente;
    }

    /**
     * @param mixed $idcliente
     */
    public function setIdcliente($idcliente)
    {
        $this->idcliente = $idcliente;
    }



}