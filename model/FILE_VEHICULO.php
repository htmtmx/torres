<?php

include_once "CONEXION.php";
class FILE_VEHICULO extends  CONEXION
{
    private $id_file_v;
    private $id_tipo_archivo_fk;
    private $no_vehiculo_fk;
    private $nombre;
    private $path;
    private $ext;
    private $nivel_acceso;
    private $estatus;

    /**
     * @return mixed
     */
    public function getIdFileV()
    {
        return $this->id_file_v;
    }

    /**
     * @param mixed $id_file_v
     */
    public function setIdFileV($id_file_v)
    {
        $this->id_file_v = $id_file_v;
    }

    /**
     * @return mixed
     */
    public function getIdTipoArchivoFk()
    {
        return $this->id_tipo_archivo_fk;
    }

    /**
     * @param mixed $id_tipo_archivo_fk
     */
    public function setIdTipoArchivoFk($id_tipo_archivo_fk)
    {
        $this->id_tipo_archivo_fk = $id_tipo_archivo_fk;
    }

    /**
     * @return mixed
     */
    public function getNoVehiculoFk()
    {
        return $this->no_vehiculo_fk;
    }

    /**
     * @param mixed $no_vehiculo_fk
     */
    public function setNoVehiculoFk($no_vehiculo_fk)
    {
        $this->no_vehiculo_fk = $no_vehiculo_fk;
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
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getExt()
    {
        return $this->ext;
    }

    /**
     * @param mixed $ext
     */
    public function setExt($ext)
    {
        $this->ext = $ext;
    }

    /**
     * @return mixed
     */
    public function getNivelAcceso()
    {
        return $this->nivel_acceso;
    }

    /**
     * @param mixed $nivel_acceso
     */
    public function setNivelAcceso($nivel_acceso)
    {
        $this->nivel_acceso = $nivel_acceso;
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

    public function queryArchivosVehiculo($no_vehiculo){
        $query = "SELECT fv.`id_file_v`, fv.`id_tipo_archivo_fk`, fv.`no_vehiculo_fk`, fv.`nombre` AS nombreArchivo, fv.`path`, 
            fv.`ext`, fv.`nivel_acceso`, fv.`estatus`, tp.nombre AS nombreTipo ,tp.id_tipo_archivo,tp.tipo_Archivo FROM `file_vechiculo` 
            fv, tipo_archivo tp 
            WHERE tp.id_tipo_archivo=fv.id_tipo_archivo_fk AND fv.no_vehiculo_fk=".$no_vehiculo;
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    function queryAddArchivosCoche(){
        $query = "INSERT INTO `file_vechiculo` (`id_file_v`, `id_tipo_archivo_fk`, `no_vehiculo_fk`, `nombre`, `path`, `ext`, `nivel_acceso`, `estatus`) 
                VALUES (NULL, '".$this->getIdTipoArchivoFk()."', '".$this->getNoVehiculoFk()."', '".$this->getNombre()."'
                , '".$this->getPath()."', '".$this->getExt()."', '".$this->getNivelAcceso()."', '1')";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    public function queryupdateNivelAcceso()
    {
        $query = "UPDATE `file_contrato` 
                SET `nivel_acceso` = '".$this->getNivelAcceso()."' 
                WHERE `file_contrato`.`id_file_c` = ".$this->getIdFileV();
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
}