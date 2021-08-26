$(document).ready(function(){
    consultaInfoEmpresa();
});

function consultaInfoEmpresa() {
    $.ajax({
        url: "../webhook/bussiness-info.php",
        success: function (response)
        {
            let obj_result = JSON.parse(response);
            console.log(obj_result);
            $("#empresaE").html(obj_result[0]['nombre']);
            $("#idEmpresa").val(obj_result[0]['id_empresa']);
            $("#nombreEmpresa").val(obj_result[0]['nombre']);
            $("#rfcEmpresa").val(obj_result[0]['rfc']);
            $("#calleEmpresa").val(obj_result[0]['calle']);
            $("#noExtEmp").val(obj_result[0]['no_ext']);
            $("#noIntEmp").val(obj_result[0]['no_int']);
            $("#coloniaEmpr").val(obj_result[0]['colonia']);
            $("#cpEmpr").val(obj_result[0]['cp']);
            $("#estadoEmp").val(obj_result[0]['estado']);
            $("#telEmpr").val(obj_result[0]['telefono']);
            $("#correoEmp").val(obj_result[0]['correo']);
            $("#webEmpr").val(obj_result[0]['sitio_web']);
            //$("#dateEmpr").val(date('Y-m-d'));
        },
    });
}