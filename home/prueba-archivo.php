<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload de archivos con Ajax</title>
</head>
<body>

    <form enctype="multipart/form-data" id="formuploadajax" method="post">
        <input type="text" id="idContrato" name="idContrato" value="555555">
        <select name="tipoArchivo" id="tipoArchivo">
            <option value="1">Foto</option>
            <option value="2">Placa</option>
            <option value="3">Tenencia</option>
            <option value="4">Ultima Verificacion</option>
            <option value="5">Factura</option>
            <option value="6">Targeta de Circulacion</option>
        </select>
<!--
https://developer.mozilla.org/es/docs/Web/HTML/Attributes/accept
-->
        <input  type="file" id="archivo1" name="archivo1" accept="image/*"/>
        <select name="visibilidad" id="visibilidad">
            <option value="1">Vible</option>
            <option value="0">Oculto</option>
        </select>
        <input type="submit" value="Subir archivos"/>
    </form>
    <div id="mensaje"></div>


    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>
$(function(){
    $("#formuploadajax").on("submit", function(e){
        e.preventDefault();
        var f = $(this);
        var formData = new FormData(document.getElementById("formuploadajax"));
        formData.append("dato", "valor");
        //formData.append(f.attr("name"), $(this)[0].files[0]);
        $.ajax({
                url: "../webhook/recibe-documento-contrato.php",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
	     processData: false
            })
                .done(function(res){
                    console.log(res);
            $("#mensaje").html("Respuesta: " + res);
        });
        });
});
    </script>
</body>
</html>