<?php
include_once "CONEXION.php";
include_once "I_DIRECCIONES.php";

class DIRECCIONES extends CONEXION implements I_DIRECCIONES
{
    private $id_direccion;
    private $no_cliente_fk;
    private $calle;
    private $no_ext;
    private $no_int;
    private $colonia;
    private $municipio;
    private $estado_republica;
    private $CP;
    private $referencias;
    private $estado;

    /**
     * @return mixed
     */
    public function getIdDireccion()
    {
        return $this->id_direccion;
    }

    /**
     * @param mixed $id_direccion
     */
    public function setIdDireccion($id_direccion)
    {
        $this->id_direccion = $id_direccion;
    }

    /**
     * @return mixed
     */
    public function getNoClienteFk()
    {
        return $this->no_cliente_fk;
    }

    /**
     * @param mixed $no_cliente_fk
     */
    public function setNoClienteFk($no_cliente_fk)
    {
        $this->no_cliente_fk = $no_cliente_fk;
    }

    /**
     * @return mixed
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * @param mixed $calle
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;
    }

    /**
     * @return mixed
     */
    public function getNoExt()
    {
        return $this->no_ext;
    }

    /**
     * @param mixed $no_ext
     */
    public function setNoExt($no_ext)
    {
        $this->no_ext = $no_ext;
    }

    /**
     * @return mixed
     */
    public function getNoInt()
    {
        return $this->no_int;
    }

    /**
     * @param mixed $no_int
     */
    public function setNoInt($no_int)
    {
        $this->no_int = $no_int;
    }

    /**
     * @return mixed
     */
    public function getColonia()
    {
        return $this->colonia;
    }

    /**
     * @param mixed $colonia
     */
    public function setColonia($colonia)
    {
        $this->colonia = $colonia;
    }

    /**
     * @return mixed
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }

    /**
     * @param mixed $municipio
     */
    public function setMunicipio($municipio)
    {
        $this->municipio = $municipio;
    }

    /**
     * @return mixed
     */
    public function getEstadoRepublica()
    {
        return $this->estado_republica;
    }

    /**
     * @param mixed $estado_republica
     */
    public function setEstadoRepublica($estado_republica)
    {
        $this->estado_republica = $estado_republica;
    }

    /**
     * @return mixed
     */
    public function getCP()
    {
        return $this->CP;
    }

    /**
     * @param mixed $CP
     */
    public function setCP($CP)
    {
        $this->CP = $CP;
    }

    /**
     * @return mixed
     */
    public function getReferencias()
    {
        return $this->referencias;
    }

    /**
     * @param mixed $referencias
     */
    public function setReferencias($referencias)
    {
        $this->referencias = $referencias;
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

    public function queryconsultaDireccion($no_cliente)
    {
        $query = "SELECT `id_direccion`, `no_cliente_fk`, `calle`, `no_ext`, `no_int`, 
        `colonia`, `municipio`, `estado_republica`, `CP`, `referencias`, `estado` 
        FROM `direcciones` WHERE `no_cliente_fk`= ".$no_cliente;
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
    public function queryaddDireccion()
    {
        $query = "INSERT INTO `direcciones` (`id_direccion`, `no_cliente_fk`, `calle`, 
                `no_ext`, `no_int`, `colonia`, `municipio`, `estado_republica`, `CP`, 
                `referencias`, `estado`) 
                VALUES (NULL, '".$this->getNoClienteFk()."', '".$this->getCalle()."', '"
                .$this->getNoExt()."', '".$this->getNoInt()."', '".$this->getColonia()."', '"
                .$this->getMunicipio()."', '".$this->getEstadoRepublica()."', '"
                .$this->getCP()."', '".$this->getReferencias()."', '1')";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    public function queryupdateDireccion()
    {
        $query = "UPDATE `direcciones` 
                SET `no_cliente_fk` = '".$this->getNoClienteFk()."', 
                `calle` = '".$this->getCalle()."', `no_ext` = '".$this->getNoExt()."', 
                `no_int` = '".$this->getNoInt()."', `colonia` = '".$this->getColonia()."', 
                `municipio` = '".$this->getMunicipio()."', 
                `estado_republica` = '".$this->getEstadoRepublica()."', 
                `CP` = '".$this->getCP()."', `referencias` = '".$this->getReferencias()."', 
                `estado` = '".$this->getEstado()."' 
                WHERE `direcciones`.`id_direccion` = ".$this->getIdDireccion();
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    public function querydeleteDireccion($id_direccion)
    {
        $query = "DELETE FROM `direcciones` 
                WHERE `direcciones`.`id_direccion` = ".$id_direccion;
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
}