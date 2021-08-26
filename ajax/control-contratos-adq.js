$(document).ready(function(){
    consultaContratosTodos();
});

function consultaContratosTodos(){
    $.ajax({
        url: "../webhook/consulta-detalles-contrato.php",
        type: 'POST',
        data: {
            id: 0
        },
        success: function (response) {
            let objContratos = JSON.parse(response);
            console.log(objContratos);
            $("#tblContratosAdquisicion").html(discriminaContratos(objContratos,0));
            $("#tblContratosVenta").html(discriminaContratos(objContratos,1))
        }
    });
}

function discriminaContratos(contratos,tipo){
    let contratosDisc = [];
    contratos.forEach((contrato)=>{
       if(contrato.tipo_contrato==tipo){
           contratosDisc.push(contrato);
       }
    });
    let templateGenerado="";
    templateGenerado= tipo==0 ? construyeTablaContratosAdq(contratosDisc) : construyeTablaContratosVta(contratosDisc);
    return templateGenerado;
}


function construyeTablaContratosVta(contratos){
    let template="";
    let contador=0;
    contratos.forEach((contrato)=>{

        let forma_pago=contrato.forma_pago>0 ? "Credito" : "Contado";
        let estatus= contrato.cont_status>0 ? "Liquidado": "Pendiente";
        contador ++;

        template +=`
                <tr>
                    <th scope="row">
                        ${contador}
                    </th>
                    <td>
                         <a href="./detalles-coche.php?idCoche=${contrato.no_vehiculo_fk}#conteinerContratos">
                            ${contrato.no_contrato}
                         </a>
                    </td>
                    <td>
                        <i class="fas fa-user"></i>
                        <a href="./detalles-cliente.php?idCliente=${contrato.no_cliente_fk}">
                            ${contrato.cliente}
                        </a>
                    </td>
                    <td>
                        <i class="fas fa-file-contract"></i> ${contrato.empleado}
                    </td>
                    <td>
                        ${contrato.vehiculo}
                    </td>
                    <td>
                        ${forma_pago}
                    </td>
                    <td>
                        ${contrato.plazo}
                    </td>
                    <td>
                        $ ${contrato.total}
                    </td>
                    <td>
                        $ ${contrato.saldo}
                    </td>
                    <td>
                        ${estatus}
                    </td>
                    <td>
                        <a href="./detalles-coche.php?idCoche=${contrato.no_vehiculo_fk}#conteinerContratos">
                            <button class="btn btn-icon btn-secondary" type="button">
                                <span class="btn-inner--icon">
                                    <i class="fas fa-eye text-blue"></i> VER DETALLES
                                </span>
                            </button>
                        </a>
                    </td>
                </tr>
        `;

        /*

         */
    });
    return template;
}

function construyeTablaContratosAdq(contratos){
    let template="";
    let contador=0;
    contratos.forEach((contrato)=>{
        let forma_pago=contrato.forma_pago>0? "Credito":"Contado";
        contador ++;
        template +=`
        <tr>
                                <th scope="row">
                                    ${contador}
                                </th>
                                <td>
                                    <a href="./detalles-coche.php?idCoche=${contrato.no_vehiculo_fk}#conteinerContratos">
                                        ${contrato.no_contrato}
                                    </a>
                                </td>
                                <td>
                                    <i class="fas fa-user"></i>
                                    <a href="./detalles-cliente.php?idCliente=${contrato.no_cliente_fk}">
                                        ${contrato.cliente}
                                    </a>
                                </td>
                                <td>
                                    <i class="fas fa-file-contract"></i> ${contrato.empleado}
                                </td>
                                <td>
                                    ${contrato.vehiculo}
                                </td>
                                <td>
                                    ${forma_pago}
                                </td>
                                <td>
                                   $ ${contrato.total}
                                </td>
                                <td> 
                                    <a href="./detalles-coche.php?idCoche=${contrato.no_vehiculo_fk}#conteinerContratos">
                                    <button class="btn btn-icon btn-secondary" type="button">
                                        <span class="btn-inner--icon">
                                            <i class="fas fa-eye text-blue"></i> VER DETALLES
                                        </span>
                                    </button>
                                    </a>
                                </td>
                            </tr>
        `;
    });
    return template;

}