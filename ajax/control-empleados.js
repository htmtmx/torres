$(document).ready(function(){
    $("#frm-add-usuario").on("submit", function(e){
        //let tipocontrato = $('input[name="contrato"]:checked').val();
        var f = $(this);
        var formData = new FormData(document.getElementById("frm-add-usuario"));
        formData.append("dato", "valor");
        //formData.append(f.attr("name"), $(this)[0].files[0]);
        $.ajax({
            url: "../webhook/users-add.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
            .done(function(res){
                $('#frm-add-usuario').trigger('reset');
                getAllUsers();
            });
        e.preventDefault();
    });
});


