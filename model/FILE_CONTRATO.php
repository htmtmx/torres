<?php

include_once "CONEXION.php";
class FILE_CONTRATO extends CONEXION
{
    private $id_file_c;
    private $id_tipo_archivo_fk;
    private $no_contrato_fk;
    private $nombre;
    private $path;
    private $ext;
    private $nivel_acceso;
    private $estatus;
    private $ruta;

    /**
     * @return mixed
     */
    public function getRuta()
    {
        return $this->obtenerRuta();
    }

    /**
     * @return mixed
     */
    public function getIdFileC()
    {
        return $this->id_file_c;
    }

    /**
     * @param mixed $id_file_c
     */
    public function setIdFileC($id_file_c)
    {
        $this->id_file_c = $id_file_c;
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
    public function getNoContratoFk()
    {
        return $this->no_contrato_fk;
    }

    /**
     * @param mixed $no_contrato_fk
     */
    public function setNoContratoFk($no_contrato_fk)
    {
        $this->no_contrato_fk = $no_contrato_fk;
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

    public function queryaddFileContrato()
    {
        $query = "INSERT INTO `file_contrato` (`id_file_c`, `id_tipo_archivo_fk`, `no_contrato_fk`, 
                             `nombre`, `path`, `ext`, `nivel_acceso`, `estatus`) 
                    VALUES (NULL, '".$this->getIdTipoArchivoFk()."', '".$this->getNoContratoFk()."', '"
                            .$this->getNombre()."', '".$this->getPath()."', '".$this->getExt()."', '"
                            .$this->getNivelAcceso()."', '1')";
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    public function queryremoveFileContrato()
    {
        $query = "DELETE FROM `file_contrato` WHERE ".$this->getIdFileC();
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    public function queryupdateNivelAcceso()
    {
        $query = "UPDATE `file_contrato` 
                SET `nivel_acceso` = '".$this->getNivelAcceso()."' 
                WHERE `file_contrato`.`id_file_c` = ".$this->getIdFileC();
        $this->connect();
        $result = $this->executeInstruction($query);
        $this->close();
        return $result;
    }
    private function obtenerRuta(){
        $query="SELECT `path`  as ruta FROM `file_contrato` WHERE `id_file_c`=".$this->getIdFileC();
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }

    function queryConsultaDocumentosContrato()
    {
        $query = "select fc.id_file_c, fc.nombre , fc.nivel_acceso, fc.path, fc.ext, fc.nivel_acceso , ta.* 
                    from file_contrato fc ,   tipo_archivo ta
                    where ta.id_tipo_archivo = fc.id_tipo_archivo_fk  
                    and fc.no_contrato_fk  = ".$this->getNoContratoFk();
        $this->connect();
        $result = $this->getData($query);
        $this->close();
        return $result;
    }


}