cargaAnios();
function cargaAnios() {
    const fecha = new Date();
    const anioActual = fecha.getFullYear();
    const anioInicial = 2010;
    let template = "";
    for (let i = anioInicial; i <= anioActual; i++){
        template+= `<option value="${i}">${i}</option>`;
    }
    cargaAniosTenencia(anioInicial);
    $("#anio").html(template);
}

$("#anio").change(function ()
{
    let anioInicial = $("#anio").val();
    cargaAniosTenencia(anioInicial);
});

function cargaAniosTenencia(anioInicial) {
    const fecha = new Date();
    const anioActual = fecha.getFullYear();
    let template = "";
    for (let i = anioInicial; i <= anioActual; i++){
        template+= `<option value="${i}">${i}</option>`;
    }
    $("#ultimaTenencia").html(template);
}