$("#frm-add-cliente-inicio").on("submit", function(e){
    var formData = new FormData(document.getElementById("frm-add-cliente-inicio"));
    formData.append("dato", "valor");
    //formData.append(f.attr("name"), $(this)[0].files[0]);
    $.ajax({
        url: "./webhook/client-add.php",
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false
    })
        .done(function(res){
            Swal.fire({
                title: '¡Usuario registrado!',
                text: 'Te has registrado correctamente.',
                icon: 'success',
                confirmButtonText: 'Continuar'
            })
        });
    $('#frm-add-cliente-inicio').trigger('reset');
    e.preventDefault();

});
