<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload de archivos con Ajax</title>
</head>
<body>
    <h1>Subir Documentos Contrato</h1>
    <form enctype="multipart/form-data" id="frm_Subir_Doc_Contrato" method="post">
        <input type="text" id="noVehiculo" name="noVehiculo" value="6872360036531502" >
        <input type="text" id="idContrato" name="idContrato" value="2303443741032755">
        <select name="tipoArchivo" id="tipoArchivo">
        </select>
<!--
https://developer.mozilla.org/es/docs/Web/HTML/Attributes/accept
    -->
        <input  type="file" id="archivo1" name="archivo1" >
        <h4>¿Desea que el archivo aparezca en el catalogo?</h4>
        <select name="visibilidad" id="visibilidad">
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>
        <input type="submit" value="Subir archivos"/>
    </form>
    <div id="mensaje"></div>
    <hr>
    <h1>Subir Documentos Coches</h1>
    <form enctype="multipart/form-data" id="frm_Doc_Coch" method="post">
        <input type="text" id="noVehiculo" name="noVehiculo" value="2903067539687445">
        <select name="tipoArchivo2" id="tipoArchivo3">
        </select>
<!--
https://developer.mozilla.org/es/docs/Web/HTML/Attributes/accept
    -->
        <input  type="file" id="archivo1" name="archivo1" >
        <h4>¿Desea que el archivo aparezca en el catalogo?</h4>
        <select name="visibilidad" id="visibilidad">
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>
        <input type="submit" value="Subir archivos"/>
    </form>
    <div id="mensaje3"></div>
    <hr>
    <h1>Subir Imagenes Coches</h1>
    <form enctype="multipart/form-data" id="frm_Foto_Coch" method="post">
        <input type="text" id="noVehiculo" name="noVehiculo" value="2903067539687445">
<!--
https://developer.mozilla.org/es/docs/Web/HTML/Attributes/accept
    -->
        <input  type="file" id="archivo1" name="archivo1" accept="image/*">
        <input type="submit" value="Subir archivos"/>
    </form>
    <div id="mensaje4"></div>


    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="../ajax/sendDocmentos.js"></script>
</body>
</html>