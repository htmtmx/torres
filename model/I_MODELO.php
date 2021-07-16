<?php
interface I_MODELO
{
    function consultaModelos ($id_marca);
    function consultaModelo ($id_modelo);
    function addModelo ();
    function updateModelo ();
    function deleteModelo($id_modelo);
}