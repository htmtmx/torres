<?php
include_once "CONEXION.php";
include_once "I_MODELO.php";
class MODELO extends CONEXION implements I_MODELO
{
    function consultaModelos ($id_marca)
    {
        $query = "SELECT `id_modelo`, `id_marca_fk`, `nombre`, 
       `estatus` FROM `modelo` WHERE `id_marca_fk` = ".$id_marca;
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
}