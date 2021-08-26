<?php

include_once "CONEXION.php";
include_once "I_MARCA.php";
class MARCA extends CONEXION implements I_MARCA
{
    function querylistMarcas ()
    {
        $query = "SELECT `id_marca`, `nombre`, `estatus` 
                FROM `marca` WHERE `marca`.`estatus` >0  ORDER BY `marca`.`nombre` ASC";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    }