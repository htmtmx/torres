<?php

class SINGLETON_TIPOS_ARCHIVOS
{
    static private $instance = null;
    private function __contruct() {
    }

    public static function getInst() {
        if (self::$instance == null) {
            self::$instance = new SINGLETON_TIPOS_ARCHIVOS();
        }
        return self::$instance;
    }

    function consultaTiposDocumento(){
        include_once "../control/controlArchivos.php";
        return consultaListaArchivos();
    }
}
