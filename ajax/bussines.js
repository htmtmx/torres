$(document).ready(function(){
    console.log('JQUERY workin in Bussines');
          //escuchando al item seleccionado
    loadInfoBussines();

    window.setTimeout(function() {
        $(".alert1").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 4000);

    function loadInfoBussines() {
        var rfc = $("#rfc").val();
        //enviamos los datos al server para regresar los datos correctos
        $.post('../control/bussiness-info.php',{rfc},function (response)
        {
            const datos = JSON.parse(response);
            //LO mostramos en el formulario
            $('#rfc').val(datos[0].rfc);
            $('#nombre').val(datos[0].nombre);
            $('#tel').val(datos[0].telefono);
            $('#email').val(datos[0].correo);
            $('#web').val(datos[0].sitio_web);
            $('#calle').val(datos[0].calle);
            $('#no_int').val(datos[0].no_int);
            $('#no_ext').val(datos[0].no_ext);
            $('#colonia').val(datos[0].colonia);
            $('#de_mun').val(datos[0].de_mun);
            $('#estado').val(datos[0].estado);
            $('#cp').val(datos[0].cp);
            $('#version').val(datos[0].version);
            $('#licencia').val(datos[0].licencia);
        });
    }

    //-------------------seleccionando el elemento boton agregar elemento
    $('#form_1').submit(function (e) {
        const valoresCajas = {
            rfc: $("#rfc").val(),
            nombre: $("#nombre").val(),
            tel: $("#tel").val(),
            email: $("#email").val(),
            web: $('#web').val(),
            seccion: "1"
        };
        let url = '../control/bussines-edit-data.php';
        $.post(url,valoresCajas,function (response) {
            console.log(response);
            var template = `<div class=" alert1 alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Excelnte!</strong> Se han guardado los cambios correctamente
          </div>`;
            var mensaje = document.getElementById("mensaje");
            mensaje.innerHTML = template;
        });
        e.preventDefault();
    });
            //-------------------seleccionando el elemento boton agregar elemento

                //-------------------seleccionando el elemento boton agregar elemento
    $('#form_2').submit(function (e) {
        const valoresCajas = {
            calle: $("#calle").val(),
            no_ext: $("#no_ext").val(),
            no_int: $("#no_int").val(),
            colonia: $("#colonia").val(),
            de_mun: $('#de_mun').val(),
            estado: $('#estado').val(),
            cp: $('#cp').val(),
            seccion: "2"
        };
        let url = '../control/bussines-edit-data.php';
        $.post(url,valoresCajas,function (response) {
            console.log(response);
            var template = `<div class=" alert1 alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Excelnte!</strong>  Se guardó la direccion correctamente
          </div>`;
            var mensaje = document.getElementById("mensaje2");
            mensaje.innerHTML = template;
        });
        e.preventDefault();
    });
            //-------------------seleccionando el elemento boton agregar elemento
});


