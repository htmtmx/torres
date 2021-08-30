<?php

include_once "CONEXION.php";
class TIPO_ARCHIVO extends CONEXION
{
    private $id_tipo_archivo;
    private $nombre;
    private $tipo_uso;
    private $prioridad;
    private $estatus;

    /**
     * @return mixed
     */
    public function getIdTipoArchivo()
    {
        return $this->id_tipo_archivo;
    }

    /**
     * @param mixed $id_tipo_archivo
     */
    public function setIdTipoArchivo($id_tipo_archivo)
    {
        $this->id_tipo_archivo = $id_tipo_archivo;
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
    public function getTipoUso()
    {
        return $this->tipo_uso;
    }

    /**
     * @param mixed $tipo_uso
     */
    public function setTipoUso($tipo_uso)
    {
        $this->tipo_uso = $tipo_uso;
    }

    /**
     * @return mixed
     */
    public function getPrioridad()
    {
        return $this->prioridad;
    }

    /**
     * @param mixed $prioridad
     */
    public function setPrioridad($prioridad)
    {
        $this->prioridad = $prioridad;
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

    function consultaTiposArchivo(){
        $query = "SELECT `id_tipo_archivo`, `nombre`, `tipo_Archivo`, `prioridad`, `estatus` 
                  FROM `tipo_archivo` WHERE `estatus`>0 ORDER BY `tipo_archivo`.`prioridad`,`tipo_archivo`.`nombre` ASC";
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    function queryAddTipoArchivo(){
        $query="INSERT INTO `tipo_archivo` (`id_tipo_archivo`, `nombre`, `tipo_Archivo`, `prioridad`, `estatus`) VALUES (NULL, '".$this->getNombre().
            "', '".$this->getTipoUso()."', '".$this->getPrioridad()."', '".$this->getEstatus()."')";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    function queryUpdateTipoArchivo(){
        $query="UPDATE `tipo_archivo` SET `nombre`='".$this->getNombre()."',`tipo_Archivo`='".$this->getIdTipoArchivo()."',
                `prioridad`='".$this->getPrioridad()."'WHERE `id_tipo_archivo`=".$this->getIdTipoArchivo();
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    function queryDeleteTipoArchivo(){
        $query="DELETE FROM `tipo_archivo` WHERE id_tipo_archivo= ".$this->getIdTipoArchivo();
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    function queryUpdateStatusTipoArchivo(){
        $query="UPDATE `tipo_archivo` SET `estatus`='".$this->getEstatus()."' 
        WHERE id_tipo_archivo=".$this->getIdTipoArchivo();
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
}