$(document).ready(function(){
    getMarcas();

});

window.onload = function() {
    getModelos(2);

};


/***************FUNCIONES PARA OBTENER MARCAS Y MODELOS ******************/
function getMarcas() {
    //-------------- AJAX pedira la info de los datos se ejecuta cuando entra inicio
    $.ajax({
        url: "../webhook/marcas-list.php",
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
            $("#marcaCoche").html(template);
        },
    });
}

try {
    function getModelos(id_marca) {
        var modelo = $("#modeloCoche");
        $.ajax({
            url: "../webhook/modelos-list.php",
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
                $("#modeloCoche").html(template);
            }
        });
    }
}catch (e) {

}

$("#marcaCoche").change(function ()
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


//FUNCIONES PARA BUSCADOR Y BOTONES SIGUIENTE Y ANTERIOR
$("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tbl-clientes tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
});

var current_fs, next_fs, previous_fs; //fieldsets
var opacity;

$(".next").click(function(){

    current_fs = $(this).parent();
    next_fs = $(this).parent().next();

//Add Class Active
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
    next_fs.show();
//hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function(now) {
// for making fielset appear animation
            opacity = 1 - now;

            current_fs.css({
                'display': 'none',
                'position': 'relative'
            });
            next_fs.css({'opacity': opacity});
        },
        duration: 600
    });
});

$(".previous").click(function(){

    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();

//Remove class active
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
    previous_fs.show();

//hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function(now) {
// for making fielset appear animation
            opacity = 1 - now;

            current_fs.css({
                'display': 'none',
                'position': 'relative'
            });
            previous_fs.css({'opacity': opacity});
        },
        duration: 600
    });
});

$('.radio-group .radio').click(function(){
    $(this).parent().find('.radio').removeClass('selected');
    $(this).addClass('selected');
});

$(".submit").click(function(){
    return false;
})