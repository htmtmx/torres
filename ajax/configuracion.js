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

            let emp = obj_result[0];

            console.log(emp);

            $("#calleEmpresa").val(emp.calle);
            $("#empresaE").html(emp.nombre);
            $("#idEmpresa").val(emp.id_empresa);
            $("#nombreEmpresa").val(emp.nombre);
            $("#rfcEmpresa").val(emp.rfc);
            $("#noExtEmp").val(emp.no_ext);
            $("#noIntEmp").val(emp.no_int);
            $("#coloniaEmpr").val(emp.colonia);
            $("#cpEmpr").val(emp.cp);
            $("#estadoEmp").val(emp.estado);
            $("#telEmpr").val(emp.telefono);
            $("#correoEmp").val(emp.correo);
            $("#webEmpr").val(emp.sitio_web);
            $("#municipio").val(emp.de_mun);
            $("#dateEmpr").val(emp.date_incorp);
            $("#version").val(emp.version);
            $("#clavLic").val(emp.licencia);

        },
    });
}