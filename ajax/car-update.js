$("#frm-update-datos-coche").on("submit", function(e){
    var f = $(this);
    var formData = new FormData(document.getElementById("frm-update-datos-coche"));
    formData.append("dato", "valor");
    //formData.append(f.attr("name"), $(this)[0].files[0]);

    $.ajax({
        url: "../webhook/car-update.php",
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
            $("#mensajeUpdateCoche").html(template);
            consultaDetallesCoche();
        },
    })
    e.preventDefault();
});