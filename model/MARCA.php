<?php

include_once "CONEXION.php";
include_once "I_MARCA.php";
class MARCA extends CONEXION implements I_MARCA
{
    function listMarcas ()
    {
        $query = "SELECT `id_marca`, `nombre`, `estatus` 
                FROM `marca`";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    }