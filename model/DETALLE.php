<?php

include_once "CONEXION.php";
class DETALLE extends CONEXION
{
    private $id_detalle;
    private $nombre;
    private $categoria;
    private $visible;
    private $oblogatorio;
    private $estatus;

    /**
     * @return mixed
     */
    public function getIdDetalle()
    {
        return $this->id_detalle;
    }

    /**
     * @param mixed $id_detalle
     */
    public function setIdDetalle($id_detalle)
    {
        $this->id_detalle = $id_detalle;
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
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param mixed $categoria
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    /**
     * @return mixed
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * @param mixed $visible
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;
    }

    /**
     * @return mixed
     */
    public function getOblogatorio()
    {
        return $this->oblogatorio;
    }

    /**
     * @param mixed $oblogatorio
     */
    public function setOblogatorio($oblogatorio)
    {
        $this->oblogatorio = $oblogatorio;
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

    //QUERY para traer los detalles
    public function queryConsultaDetalles($id_detalle)
    {
        $filter = $id_detalle>0 ? " WHERE id_detalle=".$id_detalle : "";
        $query="SELECT `id_detalle`, `nombre`, `categoria`, `visible`, `oblogatorio`, `estatus` FROM `detalle` ". $filter ." ORDER BY `detalle`.`categoria`, `detalle`.`nombre` ASC ";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    //QUERY para traer los detalles
    public function queryConsultaDetallesInventario()
    {
        $query="SELECT `id_detalle`, `nombre`, `categoria`, `visible`, `oblogatorio`, `estatus` FROM `detalle` WHERE oblogatorio > 0";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    public function queryAddDetalle(){
        $query="INSERT INTO `detalle` (`id_detalle`, `nombre`, `categoria`, `visible`, `oblogatorio`, `estatus`) 
        VALUES (NULL, '".$this->getNombre()."', '".$this->getCategoria()."', '".$this->getVisible()."', 
        '".$this->getOblogatorio()."', '".$this->getEstatus()."')";
        $this->connect();
        $result=$this->executeInstruction($query);
        $this->close();
        return $result;
    }

    public function queryUpdateDetalle($id_detalle){
        $query="UPDATE `detalle` SET `nombre`='".$this->getNombre()."',`categoria`='".$this->getCategoria()."',
        `visible`='".$this->getVisible()."',`oblogatorio`='".$this->getOblogatorio()."'
        WHERE id_detalle=".$id_detalle;
        $this->connect();
        $result=$this->executeInstruction($query);
        $this->close();
        return $result;
    }

    public function queryDeleteDetalle($id_detalle){
        $query= "DELETE FROM `detalle` WHERE id_detalle= ".$id_detalle;
        $this->connect();
        $result=$this->executeInstruction($query);
        $this->close();
        return $result;
    }
}