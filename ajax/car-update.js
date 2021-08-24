$("#frm-update-datos-coche").on("submit", function(e){
    //let tipocontrato = $('input[name="contrato"]:checked').val();
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
            console.log(response);

        },
    })
    e.preventDefault();
});