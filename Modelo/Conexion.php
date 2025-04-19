<?php
class Conexion {
    private $conexion;

    public function __construct() {
        $this->conexion = new mysqli("localhost", "root", "", "techfix");

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    public function Ejecutar($sql) {
        return $this->conexion->query($sql);
    }

    public function Cerrar() {
        $this->conexion->close();
    }

    public function UltimoIdInsertado() {
        return $this->conexion->insert_id;
    }


}




