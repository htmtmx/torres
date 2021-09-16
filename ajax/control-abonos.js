//FUNCION SUBMIT PARA EL FORM DE DOC CONTRATO ADQUISICION
$("#frm-add-abono-contrato").on("submit", function(e){
    var formData = new FormData(document.getElementById("frm-add-abono-contrato"));
    formData.append("dato", "valor");
    $.ajax({
        url: "../webhook/addAbonoContrato.php",
        type: "POST",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response)
        {
            let template =  `<div class="alert alert-success alert-dismissible fade show" role="alert">
                                ${response}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            `;
            $("#mensajeAddAbono").html(template);
            consultaDetallesContrato();
        },
    })
    $('#exampleModal1').modal('hide');
    e.preventDefault();

});