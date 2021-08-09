<?php

interface I_FILE_CONTRATO
{
    function addFileContrato();
    function removeFileContrato($idFileContrato);
    function updateNivelAcceso($idFileContrato,$nivel_acceso);
}