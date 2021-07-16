<?php

include_once "CONEXION.php";
include_once "I_MARCA.php";
class MARCA extends CONEXION implements I_MARCA
{
    private $id_marca;
    private $nombre;
    private $estatus;
    private $listModelos;

    /**
     * @return mixed
     */
    public function getListModelos()
    {
        return $this->listModelos();
    }

    /**
     * @param mixed $listModelos
     */
    public function setListModelos($listModelos)
    {
        $this->listModelos = $listModelos;
    }

    /**
     * @return mixed
     */
    public function getIdMarca()
    {
        return $this->id_marca;
    }

    /**
     * @param mixed $id_marca
     */
    public function setIdMarca($id_marca)
    {
        $this->id_marca = $id_marca;
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
    public function getEstatus()
    {
        return $this->estatus;
    }

    /**
     * @param mixed $estatus
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;
    }

    public function consultaMarca($id_marca)
    {
        $query = "SELECT `id_marca`, `nombre`, `estatus` 
                FROM `marca` WHERE  `id_marca`=".$id_marca;
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    function listModelos ()
    {
        include_once "../model/MODELO.php";
        $tempModel = new MODELO();
        $modelos = $tempModel->consultaModelos($this->getIdMarca());
        return $modelos;
    }

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