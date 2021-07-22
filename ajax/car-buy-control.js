$(document).ready(function(){
    if (id_page != 1) {
        getMarcas();
        getModelos();
        getAnios();
    }else {

    }
});
function getMarcas() {
    //-------------- AJAX pedira la info de los datos se ejecuta cuando entra inicio
    $.ajax({
        url: "../control/marcas-list.php",
        type: "POST",
        success: function (response)
        {
            //COnvertimos el string a JSON
            let obj_result = JSON.parse(response);
            //Utilizamos los objetos a y los tratamos en una plantilla en tbody
            let template = "";
            obj_result.forEach((obj_result) =>
                {
                    template += `<option value="${obj_result.id_marca}">${obj_result.nombre}</option>`;

                }
            );
            $("#marcas").html(template);
        },
    });
    //-------------- AJAX pedira la info de los datos
}

try {
    function getModelos(id_marca) {
        var modelo = $("#modelos");
        $.ajax({
            url: "../control/modelos-list.php",
            data: {idMarca : id_marca},
            type: "POST",
            beforeSend:function () {
                modelo.prop('disabled',false);
            },
            success: function (response) {
                let obj_result = JSON.parse(response);
                let template = "";
                obj_result.forEach((obj_result) =>
                {
                    template += `<option value="${obj_result.id_modelo}">${obj_result.nombre}</option> `;
                });
                $("#modelos").html(template);
            }
        });
    }
}catch (e) {
    
}

function getAnios() {
    $.ajax({
            url:"",
            data:"",
            success: function () {
                let anioBase = 1950;
                var today = new Date();
                let yearToday = today.getFullYear();
                yearToday++;
                let template = "";
                for (i=yearToday;i>=1950;i--) {
                    template += `<option value="${i}">${i}</option>`;
                }
                $("#anio").html(template);
            }
        }
    )
}

$("#marcas").change(function ()
{
    var marcaSelected = $(this);
    var id = marcaSelected.val();
    if (id != '') {
        getModelos(id);
    } else {
        var modelo = $("#modelos");
        alert("No selecciono ningun elemento");
        modelo.find('option').remove();
    }
});