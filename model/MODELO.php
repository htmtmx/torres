<?php
include_once "CONEXION.php";
include_once "I_MODELO.php";
class MODELO extends CONEXION implements I_MODELO
{
    private $id_modelo;
    private $id_marca_fk;
    private $nombre;
    private $estatus;

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
    public function setIdModelo($id_modelo)
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
    public function setIdMarcaFk($id_marca_fk)
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

    function consultaModelos ($id_marca)
    {
        $query = "SELECT `id_modelo`, `id_marca_fk`, `nombre`, 
       `estatus` FROM `modelo` WHERE `id_marca_fk` = ".$id_marca;
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }
    public function consultaModelo($id_modelo)
    {
        $query = "SELECT mo.`id_modelo`, mo.`id_marca_fk`,mar.`nombre` 
                AS nombre_marca, mo.`nombre` AS nombre_modelo, mo.`estatus` 
                FROM `modelo` mo, `marca` mar 
                WHERE mo.`id_modelo`= ".$id_modelo."
                AND mar.`id_marca`= mo.`id_marca_fk`";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    function addModelo ()
    {
        $query = "INSERT INTO `modelo` 
                (`id_modelo`, `id_marca_fk`, `nombre`, `estatus`) 
                VALUES (NULL, '".$this->getIdMarcaFk()."', '".$this->getNombre()."', '1')";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    function updateModelo ()
    {
        $query = "UPDATE `modelo` 
                SET `id_marca_fk` = '".$this->getIdMarcaFk()."', 
                    `nombre` = '".$this->getNombre()."', 
                    `estatus` = '".$this->getEstatus()."' 
                WHERE `modelo`.`id_modelo` = ".$this->getIdModelo();
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }

    public function deleteModelo($id_modelo)
    {
        $query = "DELETE FROM `modelo` 
                WHERE `modelo`.`id_modelo` = ".$id_modelo;
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
}