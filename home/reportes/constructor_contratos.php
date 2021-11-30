<?php

require './../vendor/autoload.php';
use Luecano\NumeroALetras\NumeroALetras;

function getTemplateContrato($contrato,$dirCliente,$dirVendedor, $inventario){
    $restante= $contrato['total']-$contrato['enganche'];
    $mensualidad = round($restante/$contrato['plazo'],2) ;
    $formatter = new NumeroALetras();
    $formatter->conector = ' PESOS ';
    $WordTotal =  $formatter->toInvoice($contrato['total'], 2, "MXN");
    $WordSaldo =  $formatter->toInvoice($mensualidad, 2,"MXN");
    $WordEnganche =  $formatter->toInvoice($contrato['enganche'], 2,"MXN");
    $letraTotal= $WordTotal;
    $letraSaldo= $WordSaldo;
    $letraEnganche= $WordEnganche;
    $direccion="";
    $verificacion= $contrato['verificaciones_coche']>0? "SI": "NO";
    $estadoVendedor=getEstadoRepublica($dirVendedor['estado']);
    $estadoComprador=getEstadoRepublica($dirCliente['estado_republica']);
    $mes=getMesLetra($contrato['mes']);
    $años=getFechasTenencia($contrato['ultima_tenencia'],$contrato['anio']);
    $direccion .= $dirVendedor['calle'].", No.Ext ".$dirVendedor['no_ext'].", ";
    $direccion .= strlen($dirVendedor['no_int'])>0? " No.Int ".$dirVendedor['no_int'].", ": "";
    $direccion .= "Col. ".$dirVendedor['colonia'].", CP. ".$dirVendedor['cp'].", ".$dirVendedor['de_mun'].", ".$estadoVendedor;
    $direccionCliente="";
    $direccionCliente .= $dirCliente['calle'].", No.Ext ".$dirCliente['no_ext'].", ";
    $direccionCliente .= strlen($dirCliente['no_int'])>0? " No.Int ".$dirCliente['no_int'].", ": "";
    $direccionCliente .= "Col. ".$dirCliente['colonia'].", CP. ".$dirCliente['CP'].", ".$dirCliente['municipio'].", ".$estadoComprador;
    $expedicion = getExpedicion($contrato['medio_identificación']);
    $tipocarro=getTipoCarro($contrato['tipo_carro']);
    $plantilla = '
    <body class="body-legal">
        <div class="container">
            <div class="row">
                <h1>AUTOS TORRES</h1>
            </div>
            <div class="row">
                <div><h1>CONTRATO PRIVADO DE PROMESA DE VENTA DE VEHÍCULOS</h1></div>
            </div>
            <p class="legal">
                En el municipio de Nicolás Romero, Estado de México; día <span class="fecha res">'.$contrato['dia'].' </span>de <span class="fecha res">'.$mes.' </span>
                del <span class="fecha res">'.$contrato['anio_contrato'].' </span>; estando presentes:
                El (la) C. <span class="res">'.$contrato['vendido_comprado_por'].' </span>, a quien en lo sucesivo y para efectos del presente contrato se le
                denominará  “EL VENDEDOR”  y  por  la  otra, el (la) C. <span class="res">'.$contrato['cliente'].' </span>, a quien en
                adelante se le denominará “EL COMPRADOR”, quienes de conformidad con lo previsto en los artículos
                7.30, 7.31, 7.32, 7.33, 7.38, 7.43, 7.52, 7.366, 7.532, 7.533, 7.535, 7.539, 7.552, 7,562, 7.563, 7.564, 7.568, 7.571,
                7.573, 7.580, 7.598, 7.599 y demás relativos y aplicables del Código Civil del Estado de México vigente; convienen en
                celebrar el presente contrato de COMPRAVENTA al tenor de las Siguientes:
            </p>
            <h2 class="centrar titulo-legal">D E C L A R A C I O N E S </h2>
            <p class="legal">
                <strong>PRIMERA.-</strong>  “E L   V E N D E D O R”,  manifestó ser mayor de edad, con domicilio en la calle de <span class="res">'.$direccion.' </span>, 
                IDENTIFICANDOSE PLENAMENTE  con CREDENCIAL PARA VOTAR, expedida por EL INSTITUTO NACIONAL ELECTORAL.  
            </p>
            <p class="legal">
                <strong>SEGUNDA.-</strong> “E L  V E N D E D O R”, es actual propietario del vehículo de la MARCA: <span class="res">'.$contrato['nombre_marca'].' </span>, 
                TIPO: <span class="res">'.$tipocarro.' </span>, MODELO: <span class="res">'.$contrato['nombre_modelo'].' </span>, PLACAS: <span class="res"> '.$contrato['placa'].' </span>, 
                NUMERO DE SERIE: <span class="res">'.$contrato['numero_serie_vehicular'].' </span>, COLOR: <span class="res">'.$contrato['color'].' </span>, 
                NUMERO DE MOTOR:<span class="res">'.$contrato['no_motor'].' </span>, acreditándolo con los documentos propios y respectivos.  
            </p>
            <p class="legal">
                <strong>TERCERA.-</strong>   “E L   C O M P R A D O R”, manifestó ser mayor de edad, con domicilio en la 
                calle <span class="res"> '.$direccionCliente.'  </span>, identificándole con <span class="res">'.$contrato['medio_identificación'].' </span>, 
                expedida por <span class="res">'.$expedicion.' </span>. 
            </p>
            <p class="legal">
                <strong>CUARTA.-</strong> Ambas partes de conformidad manifiestan y reconocen tener la capacidad jurídica para celebrar el presente contrato, en términos del artículo 7.38 del Código Civil del Estado de México vigente. 
            </p>
            <p class="legal">
                <strong>QUINTA.-</strong> 
                Haciendo la aclaración desde este momento que el comprador se obliga desde este momento hacer los trámites legales para los respectivos cambios de propietarios en su momento. 
            </p>
            <p class="legal">
                <strong>SEXTA.-</strong> 
                Que cuenta con la infraestructura y capacidad necesaria para la comercialización de vehículos usados y que los mismos cumplen con los lineamientos en materia de control de emisión de contaminantes, protección al medio ambiente y todas las especificaciones legales y comerciales para poder ser comercializado y cuenta con las licencias, permisos, avisos o autorizaciones necesarias para llevar acabo su actividad. 
            </p>
            <p class="legal">
                <strong>SEPTIMA.-</strong> 
                Que cuenta con personal capacitado y responsable para atender dudas, aclaraciones, reclamaciones que se 
                originen de la prestación del servicio o para proporcionar servicios de orientación , para lo cual se señala el 
                teléfono <span class="res">'.$dirVendedor['telefono'].' </span>, con un horario de atención al público de las horas a las 
                horas <span class="res">9:30 A 18:00 </span>, los días lunes, martes, miércoles, jueves, sábado y domingo. 
                Estos servicios se proporcionarán de manera gratuita. 
            </p>
            <p class="legal">
                <strong>OCTAVA.-</strong> 
                Informó al COMPRADOR el monto total a pagar por la operación de compraventa, así como las restricciones que, 
                en su caso, son aplicables en la comercialización del bien objeto de este contrato. 
            </p>
            <p class="legal">
                <strong>OCTAVA.-</strong> 
                Informó al COMPRADOR el monto total a pagar por la operación de compraventa, así como las restricciones que, 
                en su caso, son aplicables en la comercialización del bien objeto de este contrato. 
            </p>
            <h2 class="titulo-legal">II.- DECLARA “EL COMPRADOR”: </h2>
            <p class="legal">
                a)   Llamarse como ha quedado plasmado en el rubro del presente contrato y tener su domicilio en 
                <span class="res">'.$direccionCliente.' </span> con Registro Federal de Contribuyentes, 
                teléfono <span class="res">'.$contrato['telefono'].' </span> y que tiene capacidad jurídica para obligarse en los 
                términos del presente contrato. 
            </p>
            <h2 class="centrar titulo-legal">C L A U S U L A S</h2>
            <p class="legal">
                <strong>PRIMERA.-</strong> EL VENDEDOR vende y el COMPRADOR compra el vehículo usado, que tiene las siguientes características generales: 
            </p>
            <p class="legal">
                Características de vehículo: 
            </p>
            <p class="legal">
                Número de Identificación Vehicular: <span class="res">'.$contrato['NIV'].' </span> Marca: <span class="res">'.$contrato['nombre_marca'].' </span> 
                Submarca: <span class="res">'.$contrato['nombre_modelo'].' </span> Versión ó tipo: <span class="res">'.$tipocarro.' </span>
                Modelo ó año: <span class="res">'.$contrato['anio'].' </span> Color: <span class="res">'.$contrato['color'].' </span> 
                Kilometraje: <span class="res">'.$contrato['kilometros'].' </span> Número de constancia de inscripción al Repuve: <span class="res">'.$contrato['numero_serie_vehicular'].' </span>
                Placas: <span class="res">'.$contrato['placa'].' </span> Número de motor: <span class="res">'.$contrato['no_motor'].' </span> 
                Otros datos de identificación exigidos por las disposiciones legales locales y federales aplicables
            </p>
            <p class="legal">
                Cuenta con el siguiente inventario:
            </p>
            <table class="tablaLegal">
                <tbody>
                    '.getTableInventario($inventario).'
                </tbody>
            </table>
            <p class="legal">
                Las condiciones generales (Aspectos físicos- mecánicos) en que se encuentra el vehículo usado materia de esta compraventa, son las siguientes: 
            </p>            
            <p class="legal">
                Carrocería: <span class="res"> '.$contrato['carroceria'].' </span>, Pintura: <span class="res"> '.$contrato['pintura'].' </span>, Llantas: <span class="res"> '.$contrato['llantas'].' </span>, Otros
            </p>
            <p class="legal">
                <strong>SEGUNDA.-</strong> 
                El precio de compraventa del vehículo es de $<span class="res"> '.$contrato['total'].' </span> (<span class="res"> '.$letraTotal.' </span> ), 
                el cual será cubierto de la siguiente Manera: 
            </p>
            <p class="legal">
                <ol class="legal">
                    <li class="legal">
                        a la presente fecha de la celebración de este contrato “EL COMPRADOR” HACE ENTREGA “AL VENDEDOR” de  la cantidad de 
                        $<span class="res"> '.$contrato['enganche'].' </span> (<span class="res"> '.$letraEnganche.' </span> ) de manera líquida
                        y en efectivo, por el concepto de enganche, siendo el precio total de esta operación de compra la cantidad de
                        $<span class="res">'.$contrato['total'].' </span> (<span class="res"> '.$letraTotal.' </span> ).
                    </li>
                    <li class="legal">
                        2)	el comprador en consecuencia se declara deudor del vendedor y se compromete a pagar en <span class="res"> '.$contrato['plazo'].' </span> entregas  iguales mensuales de  
                        $<span class="res"> '.$mensualidad.' </span> (<span class="res"> '.$letraSaldo.' </span>)
                         cada una a partir del día <span class="res"> '.$contrato['fecha_primer_pago'].' </span> 
                         y una entrega final de $<span class="res"> '.$contrato['total'].' </span> (<span class="res"> '.$letraTotal.' </span>).
                    </li>
                </ol>
            </p>
            <p class="legal">
                <strong>TERCERA.-</strong> 
                “EL  COMPRADOR”,  manifestó su conformidad de las condiciones físicas y mecánicas en las que se encuentran los vehículos al momento de la operación de compraventa que se formalizara en el momento en él   sea liquidado el adeudo contraído para tal operación, por lo que a la fecha de la celebración del presente contrato “EL VENDEDOR” entrega a “EL COMPRADOR” el vehículo objeto de este contrato, los desperfectos que pudieran presentarse con posterioridad no darán lugar a reclamación alguna por parte del comprador. 
            </p>
            <p class="legal">
                <strong>CUARTA.-</strong> 
                EL VENDEDOR se obliga a entregar en este acto a EL COMPRADOR, en el establecimiento del primero, el vehículo usado materia de este contrato. 
            </p>            
            <p class="legal">
                <strong>QUINTA.-</strong> 
                EL COMPRADOR acepta que por tratarse de una unidad usada adquiere el vehículo objeto del presente contrato, en el estado de uso en el que se encuentra, el cual le fue facilitado para su revisión general, por cuyo motivo el vehículo usado se vende: 
            </p>
            <p class="legal">
                 ( ) Sin garantía; en este caso; EL VENDEDOR no está obligado a realizar ningún tipo de reparación, por lo que EL COMPRADOR asumirá los costos por reparaciones, suministro de refacciones, mano de obra calificada, entre otros. 
            </p>
            <p class="legal">
                <strong>SEXTA.-</strong> 
                Al momento de la entrega del vehículo, EL VENDEDOR dará al COMPRADOR a su entera satisfacción y previa validación de su legal procedencia la siguiente documentación: 
            </p>
            <p class="legal">
                Factura No.<span class="res"> '.$contrato['no_factura'].' </span> de fecha: '.$contrato['fecha_factura'].' expedida por: <span class="res"> '.$contrato['empresa_factura'].' </span> 
                con domicilio:<span class="res"> '.$contrato['domicilio_empresa'].' </span> Pagos de tenencia vehicular de los años:<span class="res"> '.$años.' </span>
                Tarjeta de circulación no.<span class="res"> '.$contrato['folio_tarje_circul'].' </span> Comprobantes de verificación vehicular: <span class="res"> '.$verificacion.' </span>
                Manual del usuario (en su caso).
            </p>
            <p class="legal">
                <strong>SÉPTIMA.-</strong> 
                Los contratantes convienen que, por el incumplimiento de cualquiera de sus obligaciones contenidas en el presente contrato, se aplicará al responsable una pena convencional, equivalente al 15% del precio de contado del vehículo materia del presente contrato. 
            </p>
            <p class="legal">
                <strong>OCTAVA.-</strong> 
                EL COMPRADOR, tendrá derecho a demandar la rescisión del presente contrato en términos de los artículos 70 y 71 de la Ley Federal de Protección al Consumidor en los siguientes casos: 
            </p>
            <p class="legal">
                <ol class="legal" type="a">
                    <li class="legal">
                        Por incumplimiento del VENDEDOR a cualesquiera de las obligaciones estipuladas  en  el  presente contrato. 
                    </li>
                    <li class="legal">
                        Si el vehículo presentare vicios ocultos que no hayan sido informados a EL COMPRADOR, a través del presente contrato. 
                    </li>
                    <li class="legal">
                        Si EL VENDEDOR no entrega el vehículo en la fecha estipulada en la cláusula Cuarta, del presente contrato. 
                    </li>                    
                    <li class="legal">
                        Si el vehículo le fuera entregado a EL COMPRADOR en condiciones con características distintas a las señalas en la cláusula primera del presente contrato. 
                    </li>
                </ol>    
            </p>
            <p class="legal">
                <strong>NOVENA.-</strong> 
                El COMPRADOR asumirá al momento de recibir el vehículo, todo tipo de responsabilidad sobre el buen uso de este, así como de los daños que pudiera ocasionar con el mismo. 
            </p>
            <p class="legal">
                <strong>DÉCIMA.-</strong> 
                EL VENDEDOR se hace responsable de cualquier situación legal que anteceda a la fecha de compraventa, relacionada con el vehículo objeto de este contrato. Asimismo, EL VENDEDOR libera a EL COMPRADOR de cualquier responsabilidad que hubiere surgido o pudiese surgir con relación al origen, propiedad, posesión o cualquier otro derecho inherente al vehículo o partes o componentes de este, hasta antes de ser entregado el vehículo a EL COMPRADOR obligándose asimismo a responder por el saneamiento para el caso de evicción. 
            </p>
            <p class="legal">
                <strong>DÉCIMA PRIMERA.-</strong> 
                En caso de optar por la rescisión de “el vendedor”, recibirá por concepto de renta de los efectos materia de 
                esta compraventa, las cuales se fijan por perito designado por las partes, señor LICENCIADO JOSE OCTAVIO GARCIA CRUZ 
                con cedula profesional 3705171, perito en materia de valuación de daños automotrices serán el monto del importe de 
                los pagos mensuales que “el comprador” se obliga a hacer a cuenta de precio aplazado, en términos de la cláusula 
                tercera de este contrato, ara suyas dichas cantidades pagadas como renta mensual igualmente, para el caso de que 
                “el vendedor” optase por la recisión, podrá hacer suya, sin necesidad de recurrir a procedimiento judicial alguno, 
                la cantidad que “el comprador” ha pagado en el momento de la firma de este contrato a cuenta del precio de los efectos 
                vendidos, ya que en dicha cantidad se ha fijado el importe de la pena convencional que el comprador debe pagar al 
                vendedor en caso de incumplimiento por concepto de daños y perjuicios; sin perjuicio de que si los daños fuesen mayores, 
                quedan a salvo los derechos del vendedor para exigirlos.
            </p>
            <p class="legal">
                <strong>DÉCIMA SEGUNDA.-</strong> 
                Si el “COMPRADOR”, abonara mayores o menores cantidades de las estipuladas y lo admitiere el vendedor, 
                no se entenderá modificado ni novado el contrato, pues dichos abonos serán a cuenta de abonos mensuales 
                vencidos o no satisfechos o de los que estén por vencerse, Los abonos o parte de abonos que se adeuden devengaran 
                interés del 10% mensual desde la fecha de sus respectivos vencimientos y hasta su pago total sin que ello 
                constituya una prórroga de los plazos.
            </p>
            <p class="legal">
                <strong>DÉCIMA SEGUNDA.- CLAUSULA PENAL:</strong> 
                Se estipula como clausula penal la siguiente en caso de incumplimiento POR PARTE DEL COMPRADOR (a los pagos) 
                tratándose de la recisión del presente contrato causara además de la restitución del (los) bienes así como del (los) 
                montos y/o cantidades en dinero una penalización  del 10 % del total del valor de cada vehículo (PRECIO FACTURA), 
                Tratándose de cumplimiento del contrato por el incumplimiento a las obligaciones que  Se contrae, la que podrá ser 
                cobrada por la vía ejecutiva sin constitución en mora Ni requerimiento alguno será al 10% del valor total de la operación. 
            </p>
            <p class="legal">
                <strong>DÉCIMA TERCERA.-</strong> 
                “EL COMPRADOR”, será responsable de mantener al corriente los impuestos y derechos de control vehicular 
                que devengue del mismo. De igual forma, dentro de los 30 días siguientes a la enajenación total, de acuerdo 
                con lo previsto en el segundo párrafo del artículo 30 del Reglamento de Tránsito del Estado de México, y 
                responderá de los daños y perjuicios que se ocasionen por el mal uso o manejo que se le dé al vehículo. 
            </p>
            <p class="legal">
                <strong>DÉCIMA CUARTA.-</strong> 
                “EL VENDEDOR”,  se deslinda de cualquier responsabilidad civil o penal que pudiera resultar por el uso, 
                manejo o funcionamiento del vehículo Materia del presente contrato a partir de la fecha de entrega del mismo, 
                presentando al efecto, ante la autoridad Fiscal correspondiente y dentro del término de 17 días siguientes a la fecha 
                de la compraventa, aviso por escrito de la enajenación de los vehículos, de acuerdo a lo establecido en el artículo 41 
                fracción XV, párrafo segundo del Código Financiero del Estado de México y Municipios, vigente.
            </p>            
            <p class="legal">
                <strong>DÉCIMA QUINTA.-</strong> 
                “el comprador” deja en depósito del vendedor la factura que ampara esta operación en tanto que cumple todas 
                las obligaciones del presente contrato.
            </p>            
            <p class="legal">
                <strong>DÉCIMA SEXTA.-</strong> 
                Para el caso de fallecimiento del comprador, la unidad quedara a disposición del vendedor hasta en tanto 
                se acredite con documento fehaciente ser heredero o albacea del decujus y/o en su caso el aval que firme 
                como deudor principal, asimismo para el caso de que la unidad se encuentre a disposición de la autoridad 
                ministerial, solo “EL VENDEDOR” podrá solicitar la devolución de la unidad acreditando la propiedad con la 
                factura correspondiente, siendo responsable de todos los gastos erogados  “el comprador”.
            </p>
            <p class="legal">
                <strong>DÉCIMA SEPTIMA.-</strong> 
                La Procuraduría Federal del Consumidor es competente en la vía administrativa para resolver cualquier controversia que 
                se suscite sobre la interpretación o cumplimiento del presente contrato. Sin perjuicio de lo anterior, las partes se 
                someten a la jurisdicción de los Tribunales competentes en Nicolás Romero, Estado de México, renunciando expresamente 
                a cualquier otra jurisdicción que pudiera corresponderles, por razón de sus domicilios presentes o futuros o por cualquier
                 otra razón. 
            </p>
               Leído que fue por las partes el contenido del presente contrato y sabedoras de su alcance legal, lo firman por duplicado 
               en la Ciudad NICOLAS ROMERO, ESTADO DE MEXICO siendo las <span class="res"> '.$contrato['hora'].' </span> del día <span class="res"> '.$contrato['dia'].' </span>
                de <span class="res"> '.$mes.' </span> del <span class="res"> '.$contrato['anio_contrato'].' </span>. 
            </p>
            </p>
               <br><br><br>            </p>
               <table>
                    <tbody>
                        <tr>
                    <td>
                        <h2 class="centrar titulo-legal">VENDEDOR</h2>
                    </td>
                    <td></td>
                    <td>
                        <h2 class="centrar titulo-legal">COMPRADOR</h2>
                    </td>               
                        <tr>
                           <td class="firma espacio">            </td>
                           <td class="espacio"></td>
                           <td class="firma espacio">            </td>
                        </tr>
                        <tr>
                            <td class="legal centrar">'.$contrato['vendido_comprado_por'].'</td>
                            <td></td>
                            <td class="legal centrar">'.$contrato['cliente'].'</td>
                        </tr>
                        <tr>
                            <td colspan="3"><h2 class="centrar titulo-legal">AVALES</h2></td>
                        </tr>
                        <tr>
                           <td class="firma espacio">            </td>
                           <td class="espacio"></td>
                           <td class="firma espacio">            </td>
                        </tr>
                        <tr>
                            <td class="legal centrar">Nombre y Firma</td>
                            <td></td>
                            <td class="legal centrar">Nombre y Firma</td>
                        </tr>
                    </tbody>
                </table>
        </div>
    </body>
';
    return $plantilla;
}

function getExpedicion($identificacion){
    switch ($identificacion){
        case "INE":
            return "INSTITUTO NACIONAL ELECTORAL";
            break;
        case "PASAPORTE":
            return "EMBAJADA";
            break;
        case "CEDULA":
            return "DIRECCION GENERAL DE PROFESIONES";
            break;
        case "CARTILLA":
            return "SERVICIO MILITAR NACIONAL";
            break;

        default:
            return "Desconocida";
            break;
    }

}

function getEstadoRepublica($estado){
    switch ($estado){
        case "AGU":
            return "Aguascalientes";
            break;
        case "BCN":
            return "Baja California";
            break;
        case "BCS":
            return "Baja California Sur";
            break;
        case "CAM":
            return "Campeche";
            break;
        case "CHP":
            return "Chiapas";
            break;
        case "CHH":
            return "Chihuahua";
            break;
        case "CDMX":
            return "Ciudad de México";
            break;
        case "COA":
            return "Coahuila";
            break;
        case "COL":
            return "Colima";
            break;
        case "DUR":
            return "Durango";
            break;
        case "MEX":
            return "Estado de México";
            break;
        case "GUA":
            return "Guanajuato";
            break;
        case "GRO":
            return "Guerrero";
            break;
        case "HID":
            return "Hidalgo";
            break;
        case "JAL":
            return "Jalisco";
            break;
        case "MIC":
            return "Michoacán";
            break;
        case "MOR":
            return "Morelos";
            break;
        case "NAY":
            return "Nayarit";
            break;
        case "NLE":
            return "Nuevo León";
            break;
        case "OAX":
            return "Oaxaca";
            break;
        case "PUE":
            return "Puebla";
            break;
        case "QUE":
            return "Queretaro";
            break;
        case "ROO":
            return "Quintana Roo";
            break;
        case "SLP":
            return "San Luis Potosí";
            break;
        case "SIN":
            return "Sinaloa";
            break;
        case "SON":
            return "Sonora";
            break;
        case "TAB":
            return "Tabasco";
            break;
        case "TAM":
            return "Tamaulipas";
            break;
        case "TLA":
            return "Tlaxcala";
            break;
        case "VER":
            return "Veracruz";
            break;
        case "YUC":
            return "Yucatán";
            break;
        case "ZAC":
            return "Zacatecas";
            break;
        default:
            return "Este estado no Existe";
            break;
    }
}

function getTipoCarro($tipo){
    switch ($tipo){
        case "0":
            return "URBANO";
            break;
        case "1":
            return "SUBCOMPACTO";
            break;
        case "2":
            return "COMPACTO";
            break;
        case "3":
            return "FAMILIAR";
            break;
        case "4":
            return "SEDAN";
            break;
        case "5":
            return "BERLINA";
            break;
        case "6":
            return "DESCAPOTABLE";
            break;
        case "7":
            return "COUPE";
            break;
        case "8":
            return "DEPORTIVO";
            break;
        case "9":
            return "SUV";
            break;
        case "10":
            return "TODO TERRENO";
            break;
        case "11":
            return "PICK UP";
            break;
        default:
            return "Marca no conocida";
            break;
    }
}

function getMesLetra($mes){
    switch ($mes){
        case '1':
            return "ENERO";
            break;
        case '2':
            return "FEBRERO";
            break;
        case '3':
            return "MARZO";
            break;
        case '4':
            return "ABRIL";
            break;
        case '5':
            return "MAYO";
            break;
        case '6':
            return "JUNIO";
            break;
        case '7':
            return "JULIO";
            break;
        case '8':
            return "AGOSTO";
            break;
        case '9':
            return "SEPTIEMBRE";
            break;
        case '10':
            return "OCTUBRE";
            break;
        case '11':
            return "NOVIEMBRE";
            break;
        case '12':
            return "DICIEMBRE";
            break;
        default:
            return "Este mes no existe";
            break;
    }
}

function getTableInventario($USOS){
    #inventario general del suistema
    include_once("./../control/controlDetalles.php");
    $DETALLES = json_decode(consultaDetallesParaInventarioContrato(),true);

    //verificar si el inventario actual corresponde al inventario que se agrego
    $ext = [];
    $inv = [];
    $acc = [];
    $template = "";
    foreach ($DETALLES as $d)
    {
        $existe = false;
        if (count($USOS)>0){
            foreach ($USOS as $u){
                if ($u['id_detalle_fk']==$d['id_detalle']){
                    $existe = true;
                }
                //constuyo el array obj
                $obj = array(
                    "nombre"=> $d['nombre'],
                    "existe"=> $existe,
                    "cat" => $d['categoria']
                );
            }
        }
        else
        {
            //constuyo el array obj
            $obj = array(
                "nombre"=> $d['nombre'],
                "existe"=> false,
                "cat" => $d['categoria']
            );
        }

        //asignarlo a su categoria
        switch ($d['categoria']){
            case "0":
                array_push($ext,$obj);
                break;
            case "1":
                array_push($inv,$obj);
                break;
            default:
                array_push($acc,$obj);
                break;
        }
    }
    $template .= '<tr class="tablaLegal" >
			        <td class="tablaLegal" colspan="3"><strong>E X T E R I O R E S</strong></td>
		        </tr>
		        <tr>
                    <td class="tablaLegal"><strong>NOMBRE</strong></td>
                    <td class="tablaLegal"><strong>SI</strong></td>
                    <td class="tablaLegal"><strong>NO</strong></td>
                </tr>
		        ';
    foreach ($ext as $obj){
        $template .= '		
		<tr class="tablaLegal">
			<td class="tablaLegal">'.$obj['nombre'].'</td>
			<td class="tablaLegal">'.($obj['existe'] ? "X":"").'</td>
			<td class="tablaLegal">'.($obj['existe'] ? "":"X").'</td>
		</tr>';
    }
    $template .= '<tr class="tablaLegal">
			        <td class="tablaLegal" colspan="3"><strong>I N V E N T A R I O</strong> </td>
		        </tr>
		        <tr>
                    <td class="tablaLegal"><strong>NOMBRE</strong></td>
                    <td class="tablaLegal"><strong>SI</strong></td>
                    <td class="tablaLegal"><strong>NO</strong></td>
                </tr>
		        ';
    foreach ($inv as $obj){
        $template .= '		
		<tr class="tablaLegal">
			<td class="tablaLegal">'.$obj['nombre'].'</td>
			<td class="tablaLegal">'.($obj['existe'] ? "X":"").'</td>
			<td class="tablaLegal">'.($obj['existe'] ? "":"X").'</td>
		</tr>';
    }
    $template .= '<tr class="tablaLegal">
			        <td class="tablaLegal" colspan="3"><strong>A C C E S O R I O S</strong></td>
		        </tr>
		        <tr>
                    <td class="tablaLegal"><strong>NOMBRE</strong></td>
                    <td class="tablaLegal"><strong>SI</strong></td>
                    <td class="tablaLegal"><strong>NO</strong></td>
                </tr>
		        ';
    foreach ($acc as $obj){
        $template .= '		
		<tr class="tablaLegal">
			<td class="tablaLegal">'.$obj['nombre'].'</td>
			<td class="tablaLegal">'.($obj['existe'] ? "X":"").'</td>
			<td class="tablaLegal">'.($obj['existe'] ? "":"X").'</td>
		</tr>';
    }
    return $template;
}


function getTemplateCartaResponsiva($contrato, $arrayDatos, $dirCliente, $dirVendedor){

    $formatter = new NumeroALetras();
    $formatter->conector = ' PESOS ';
    $WordTotal =  $formatter->toInvoice($contrato['total'], 2, "MXN");
    $letraTotal=  $WordTotal;
    $valorCancelacion = ($contrato['total']*.4)." (". $formatter->toInvoice($contrato['total']*.4, 2, "MXN").")";
    $letraTotal = strtoupper($letraTotal);
    $fecha= getFechasTenencia($contrato['ultima_tenencia'],$contrato['anio']);
    $tarjeton= getExistenciaTarjeta($contrato['tarjeton']);
    $tarjeta = getExistenciaTarjeta($contrato['tarjeta_circulacion']);
    $folioTarjeta= $tarjeta=="SI"? $contrato['folio_tarje_circul']: "NA";
    $folioTarjeton= $tarjeton=="SI"? $contrato['folio_tarjeton']: "NA";
    $verificaciones= getExistenciaTarjeta($contrato['verificaciones_coche']);
//var_dump($contrato);
//die();
    $plantilla = '
    <body >
    <div class="bgMarcas" style="background: url(./reportes/bg-min.jpg) center center no-repeat">
    <div class="container" >
            <div class="row">
                    <h1>AUTOS TORRES</h1>
            </div>
            <div class="row">
                <div class="left"><h1>RESPONSIVA DE COMPRA VENTA DE PARTICULAR A PARTICULAR</h1></div>
                <div class="right"><h1>'.$arrayDatos['fecha'].'</h1></div>
            </div>
            <h2>Manifiesto que recibí a mi entera satisfacción y de conformidad el vehículo descrito:</h2>
            <table>
                <tbody>
                <tr>
                    <td>MARCA:</td>
                    <td class="res">'.$contrato['nombre_marca'].'</td>
                    <td>MODELO:</td>
                    <td class="res">'.$contrato['nombre_modelo'].'</td>
                    <td>TIPO:</td>
                    <td class="res">'.getTipoCarro($contrato['tipo_carro']).'</td>
                    <td>COLOR:</td>
                    <td class="res">'.strtoupper($contrato['color']).'</td>
                </tr>
                <tr>
                    <td>AÑO:</td>
                    <td class="res" colspan="">'.$contrato['anio'].'</td>
                    <td>MOTOR:</td>
                    <td class="res" colspan="2">'.$contrato['no_motor'].'</td>
                    <td>SERIE:</td>
                    <td class="res" colspan="2">'.$contrato['numero_serie_vehicular'].'</td>
                </tr>
                <tr>
                    <td colspan="8"><h3>Con los siguientes documentos:</h3></td>
                </tr>
                <tr>
                    <td>FACTURA No.</td>
                    <td class="res">'.$contrato['no_factura'].'</td>
                    <td>de</td>
                    <td class="res" colspan="4">'.$contrato['empresa_factura'].'</td>
                </tr>
                <tr>
                    <td>TARJETON:</td>
                    <td class="res">'.$tarjeton.'</td>
                    <td>FOLIO:</td>
                    <td class="res">'.$folioTarjeton.'</td>
                    <td>TENENCIAS:</td>
                    <td colspan="3" class="res">'.$fecha.' </td>
                </tr>
                <tr>
                    <td colspan="2">TARJETA DE CIRCULACION:</td>
                    <td class="res">'.$tarjeta.'</td>
                    <td>FOLIO:</td>
                    <td class="res">'.$folioTarjeta.'</td>
                    <td>PLACAS:</td>
                    <td colspan="2" class="res">'.$contrato['placa'].'</td>
                </tr>
                <tr>
                    <td>VERIFICACIONES:</td>
                    <td class="res">'.$verificaciones.'</td>
                </tr>
                </tbody>
            </table>
            <p>
                Las que por ahora, no están a mi nombre pero que, dentro del término legal mediante los
                procedimientos administrativos correspondientes ante las autoridades presentes de
                cualquier estado de la República Mexicana, la unidad de qué se trata quedará circulando a
                nombre mío.
            </p>
            <p>
                <ol>
                    <li>
                        El comprador revisó por su propia cuenta la unidad
                    </li>
                    <li>
                        El comprador recibe el vehículo usado en el estado material que se encuentra cómo es:
                        carrocería, pintura y mecánicamente.
                    </li>
                    <li>
                        El vendedor acepta toda responsabilidad civil como penal o de tránsito en que se haya visto
                        involucrado la unidad objeto de la compra y que a partir de la fecha de operación coma el
                        comprador asume una nueva responsabilidad.
                    </li>
                </ol>
            </p>
            <h3>
                Las partes manifiestan bajo protesta de decir verdad que los datos asentados en esta responsiva son ciertos.
            </h3>
            <p>
                Se realiza la Compra - Venta de dicha unidad en la cantidad de <span class="res">$ '.$contrato['total'].'</span>
                <br>
                Cantidad con letra  <span class="res">('.$letraTotal.')</span>
            </p>';

    if ($contrato['tipo_contrato']== "0")
    {
        if ($contrato['forma_pago']=="1"){
            $plantilla .= '
                    <p>
                        Estando de conformidad ambas partes con los derechos y obligaciones correspondientes,
                        firmado la presente para constancia. <br>
                        En caso de cancelar esta operación el Sr.  <span class="res">'.$contrato['cliente'].'</span> acepta pagar el
                        <span class="res">&nbsp;&nbsp;40%&nbsp;&nbsp;</span> del valor de la operación que corresponde a <br> <span class="res">&nbsp;&nbsp;$ '.$valorCancelacion.'</span>
                    </p>';
        }
    }
    $plantilla .= '
            <p>
                Esta operación se realizará bajo el RÉGIMEN DE RESERVA DE DOMINIO esto es,
                que el comprador otorga al vendedor poder absoluto, de recuperar la unidad detallada,
                en caso de no efectuar los pagos en las fechas ya especificadas, además de cubrir los gastos
                que esto genere. SIN PREVIO JUICIO PENAL O CIVIL.
            </p>
            <p>
                Observaciones:
                <span class="res"> '.$contrato['observaciones'].'
                </span>
            </p>
            <p>
            <!-- Aqui va la division de las fechas por DIA, MES Y AÑO-->
                Firmado en
                <span class="fecha res">Nicolás Romero, Edomex</span> a
                <span class="fecha res">'.$arrayDatos['fecha'].'</span> 
                a las <span class="fecha res">'.$arrayDatos['hora'].'</span> horas.
            </p>
            <h2 class="centrar">Lugar Fecha Hora de la Operación</h2>
            <table>
                <tbody>
                <tr>
                    <td colspan="2">
                        <div class="titulostable">VENDEDOR</div>
                    </td>
                    <td colspan="2">
                        <div class="titulostable">COMPRADOR</div>
                    </td>
                </tr>
                <tr>
                    <td>NOMBRE:</td>
                    <td><span class="fecha res">'.$arrayDatos['vendedor'].'</span></td>
                    <td>NOMBRE:</td>
                    <td><span class="fecha res">'.$arrayDatos['comprador'].'</span></td>
                </tr>
                </tr>
                <tr>
                    <td>DOMICILIO:</td>
                    <td><span class="fecha res">'.$dirVendedor['calle'].'</span></td>
                    <td>DOMICILIO:</td>
                    <td><span class="fecha res">'.$dirCliente['calle'].'</span></td>
                </tr>
                <tr>
                    <td>COLONIA:</td>
                    <td><span class="fecha res">Col. '.$dirVendedor['colonia'].'</span></td>
                    <td>COLONIA:</td>
                    <td><span class="fecha res">Col. '.$dirCliente['colonia'].'</span></td>
                </tr>
                <tr>
                    <td>TELEFONO:</td>
                    <td><span class="fecha res">'.$arrayDatos['telefono_vendedor'].'</span></td>
                    <td>TELEFONO:</td>
                    <td><span class="fecha res">'.$arrayDatos['telefono_comprador'].'</span></td>
                </tr>
                <tr>
                    <td>SE IDENTIFICA CON:</td>
                    <td><span class="fecha res">'.$arrayDatos['identificacion_vendedor'].'</span></td>
                    <td>SE IDENTIFICA CON:</td>
                    <td><span class="fecha res">'.$arrayDatos['identificacion_comprador'].'</span></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="titulostable"><br>ENTREGO POR MI VOLUNTAD</div>
                    </td>
                    <td colspan="2">
                        <div class="titulostable"><br>RECIBI DE CONFORMIDAD</div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="firma"><br><br></td>
                    <td colspan="2" class="firma"><br><br></td>
                </tr>
                <tr>
                    <td colspan="2">
                        Firma del Vendedor
                    </td>
                    <td colspan="2">
                        Firma del Comprador
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="titulostable"><br>TESTIGO</div>
                    </td>
                    <td colspan="2">
                        <div class="titulostable"><br>TESTIGO</div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="firma"><br></td>
                    <td colspan="2" class="firma"><br></td>
                </tr>
                <tr>
                    <td colspan="2">
                        Firma del Testigo
                    </td>
                    <td colspan="2">
                        Firma del Testigo
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
        
        
        </body>
    ';
    return $plantilla;
}

function getPlantilla($contratos){
    $plantilla = '
    <body>
    <header class="clearfix">
      <div id="logo">
        <img class="logo" src="./../assets/img/logo.png">
      </div>
      <h1>Responsiva de Compra Venta de Particular a Particular</h1>
      <div id="company" class="clearfix">
        <div>Company Name</div>
        <div>455 Foggy Heights,<br /> AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      <div id="project">
        <div><span>PROJECT</span> Website development</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">No</th>
            <th class="desc">Descripción</th>
            <th>Fecha de Venta</th>
            <th>Vehiculo</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            '.getRow($contratos).'
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
    Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
    ';
    return $plantilla;
}

function getRow($elements){
    $rows='';
    foreach($elements as $ele){
        $rows .= '<tr>
                <td class="service">'.$ele['no_contrato'].'</td>
                <td class="desc">'.$ele['vehiculo'].'</td>
                <td class="unit">'.$ele['fecha_venta'].'</td>
                <td class="qty">'.$ele['no_vehiculo'].'</td>
                <td class="total">[ ]</td>
              </tr>';
    }
    return $rows;
}

function getExistenciaTarjeta($tipoTarjeta){
    if($tipoTarjeta=="1"){
        return "SI";
    }
    return "NO";
}
function getFechasTenencia($ultimaTenencia,$anio){
    $fechas="";
    for($i=$anio;$i<=$ultimaTenencia;$i++){
        $fechas.=$i;
        if($ultimaTenencia!=$i){
            $fechas.=",";
        }
    }
    return $fechas;
}
