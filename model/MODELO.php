<?php
include_once "CONEXION.php";
include_once "I_MODELO.php";
class MODELO extends CONEXION implements I_MODELO
{

    private $id_marca_fk;
    private $nombre;
    private $estatus;
    private $id_modelo;

    /**
     * @return mixed
     */
    public function getIdModelo()
    {
        return $this->id_modelo;
    }

    /**
     * @param mixed $id_modelo
     */
    public function setIdModelo($id_modelo): void
    {
        $this->id_modelo = $id_modelo;
    }

    /**
     * @return mixed
     */
    public function getIdMarcaFk()
    {
        return $this->id_marca_fk;
    }

    /**
     * @param mixed $id_marca_fk
     */
    public function setIdMarcaFk($id_marca_fk): void
    {
        $this->id_marca_fk = $id_marca_fk;
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
    public function setNombre($nombre): void
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
    public function setEstatus($estatus): void
    {
        $this->estatus = $estatus;
    }


    function queryconsultaModelos ($id_marca)
    {
        $query = "SELECT `id_modelo`, `id_marca_fk`, `nombre`, 
       `estatus` FROM `modelo` WHERE `id_marca_fk` = ".$id_marca;
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    function queryaddModelo(){
        $query="INSERT INTO `modelo` (`id_modelo`, `id_marca_fk`, `nombre`, `estatus`) 
        VALUES (NULL, '".$this->getIdMarcaFk()."', '".$this->getNombre()."', '1')";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    function queryupdateModelo(){
        $query="UPDATE `modelo` SET `id_marca_fk`='".$this->getIdMarcaFk()."',`nombre`='".$this->getNombre()."'
        WHERE id_modelo = ".$this->getIdModelo();
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    function queryupdateEstatusModelo(){
        $query="UPDATE `modelo` SET `estatus`='".$this->getEstatus()."' WHERE id_modelo = ".$this->getIdModelo();
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
}