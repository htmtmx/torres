<?php
function getTemplateContrato($contrato){
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
                En el municipio de Nicolás Romero, Estado de México; día <span class="fecha res">15 </span>de <span class="fecha res">ENERO </span>
                del<span class="fecha res">2021 </span>; estando presentes:
                El (la) C. <span class="res">_______NAME VENDEDOR_______ </span>, a quien en lo sucesivo y para efectos del presente contrato se le
                denominará  “EL VENDEDOR”  y  por  la  otra, el (la) C. <span class="res">'.$contrato['cliente'].' </span>, a quien en
                adelante se le denominará “EL COMPRADOR”, quienes de conformidad con lo previsto en los artículos
                7.30, 7.31, 7.32, 7.33, 7.38, 7.43, 7.52, 7.366, 7.532, 7.533, 7.535, 7.539, 7.552, 7,562, 7.563, 7.564, 7.568, 7.571,
                7.573, 7.580, 7.598, 7.599 y demás relativos y aplicables del Código Civil del Estado de México vigente; convienen en
                celebrar el presente contrato de COMPRAVENTA al tenor de las Siguientes:
            </p>
            <h2 class="centrar titulo-legal">D E C L A R A C I O N E S </h2>
            <p class="legal">
                <strong>PRIMERA.-</strong>  “E L   V E N D E D O R”,  manifestó ser mayor de edad, con domicilio en la calle de <span class="res">________________ </span>, 
                IDENTIFICANDOSE PLENAMENTE  con CREDENCIAL PARA VOTAR, expedida por EL INSTITUTO NACIONAL ELECTORAL.  
            </p>
            <p class="legal">
                <strong>SEGUNDA.-</strong> “E L  V E N D E D O R”, es actual propietario del vehículo de la MARCA: <span class="res">NISSAN </span>, 
                TIPO: <span class="res">VERSA </span>, MODELO: <span class="res">2015 </span>, PLACAS: <span class="res"> HMK1651 </span>, 
                NUMERO DE SERIE: <span class="res">________________ </span>, COLOR: <span class="res">________________ </span>, 
                NUMERO DE MOTOR:<span class="res">________________ </span>, acreditándolo con los documentos propios y respectivos.  
            </p>
            <p class="legal">
                <strong>TERCERA.-</strong>   “E L   C O M P R A D O R”, manifestó ser mayor de edad, con domicilio en la 
                calle <span class="res"> DIvicion del norte No 52  </span>, identificándole con <span class="res">________________ </span>, 
                expedida por <span class="res">________________ </span>. 
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
                teléfono <span class="res">________________ </span>, con un horario de atención al público de las horas a las 
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
                <span class="res">________________ </span> con Registro Federal de Contribuyentes, 
                teléfono <span class="res">________________ </span> y que tiene capacidad jurídica para obligarse en los 
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
                Número de identificación vehicular <span class="res">________________ </span> Marca <span class="res">________________ </span> 
                Submarca <span class="res">________________ </span>Versión ó tipo<span class="res">________________ </span>
                Modelo ó año<span class="res">________________ </span> Color<span class="res">________________ </span> 
                Kilometraje<span class="res">________________ </span>Número de constancia de inscripción al Repuve<span class="res">________________ </span>
                Placas<span class="res">________________ </span> Número de motor<span class="res">________________ </span> 
                Otros datos de identificación exigidos por las disposiciones legales locales y federales aplicables
            </p>
            <p class="legal">
                Cuenta con el siguiente inventario:
            </p>
            <table class="tablaLegal">
                <tbody>
                    <tr>
                        <td class="tablaLegal">EXTERIORES</td>
                        <td class="tablaLegal">SI</td>
                        <td class="tablaLegal">NO</td>
                        <td class="tablaLegal">INVENTARIO</td>
                        <td class="tablaLegal">SI</td>
                        <td class="tablaLegal">NO</td>
                        <td class="tablaLegal">ACCESORIOS</td>
                        <td class="tablaLegal">SI</td>
                        <td class="tablaLegal">NO</td>
                    </tr>
                    '.getTableInventario().'
                </tbody>
            </table>
            <p class="legal">
                Las condiciones generales (Aspectos físicos- mecánicos) en que se encuentra el vehículo usado materia de esta compraventa, son las siguientes: 
            </p>            
            <p class="legal">
                Carrocería: <span class="res"> BUENA </span>, Pintura: <span class="res"> BUENA </span>, Llantas: <span class="res"> 1/2 Vida </span>, Otros
            </p>
            <p class="legal">
                <strong>SEGUNDA.-</strong> 
                El precio de compraventa del vehículo es de $<span class="res"> 150,000.00 </span> (<span class="res"> Ciento Cincuenta MIl Pesos </span> 00/100 M. N.), 
                el cual será cubierto de la siguiente Manera: 
            </p>
            <p class="legal">
                <ol class="legal">
                    <li class="legal">
                        a la presente fecha de la celebración de este contrato “EL COMPRADOR” HACE ENTREGA “AL VENDEDOR” de  la cantidad de 
                        $<span class="res"> 150,000.00 </span> (<span class="res"> Ciento Cincuenta MIl Pesos </span> 00/100 M. N.) de manera líquida
                        y en efectivo, por el concepto de enganche, siendo el precio total de esta operación de compra la cantidad de
                        $<span class="res"> 150,000.00 </span> (<span class="res"> Ciento Cincuenta MIl Pesos </span> 00/100 M. N.).
                    </li>
                    <li class="legal">
                        2)	el comprador en consecuencia se declara deudor del vendedor y se compromete a pagar en entregas iguales mensuales de  
                        $<span class="res"> 150,000.00 </span> (<span class="res"> Ciento Cincuenta MIl Pesos </span> 00/100 M. N.)
                         cada una a partir del día <span class="res"> 15 AGO 2021 </span> y una entrega final de $<span class="res"> 150,000.00 </span> (<span class="res"> Ciento Cincuenta MIl Pesos </span> 00/100 M. N.).
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
                Factura No.<span class="res"> _______________ </span> de fecha: expedida por: <span class="res"> _________________ </span> 
                con domicilio:<span class="res"> _______________ </span> Pagos de tenencia vehicular de los años:<span class="res"> _______________ </span>
                Tarjeta de circulación no.<span class="res"> _______________ </span> Comprobantes de verificación vehicular: <span class="res"> _______________ </span>
                Manual del usuario (en su caso), Documentos oficiales que acrediten su legal existencia en el país: <span class="res"> _______________ </span> Otros:<span class="res"> _______________ </span>.
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
               en la Ciudad NICOLAS ROMERO, ESTADO DE MEXICO siendo las <span class="res"> _______________ </span> del día <span class="res"> _______________ </span>
                de <span class="res"> _______________ </span> del <span class="res"> _______________ </span>. 
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
                            <td class="legal centrar">ADRIANA IVETTE TORRES RAMIREZ</td>
                            <td></td>
                            <td class="legal centrar">ADRIANA IVETTE TORRES RAMIREZ</td>
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

function getTableInventario(){
    $template = '
                    <tr class="tablaLegal">
                        <td class="tablaLegal">Unidad de luces</td>
                        <td class="tablaLegal">X</td>
                        <td class="tablaLegal"></td>
                        <td class="tablaLegal">Instrumentos de tablero</td>
                        <td class="tablaLegal">X</td>
                        <td class="tablaLegal"></td>
                        <td class="tablaLegal">Gato</td>
                        <td class="tablaLegal">X</td>
                        <td class="tablaLegal"></td>
                    </tr>
                    <tr class="tablaLegal">
                        <td class="tablaLegal">Luces</td>
                        <td class="tablaLegal">X</td>
                        <td class="tablaLegal"></td>
                        <td class="tablaLegal">Calefacción </td>
                        <td class="tablaLegal">X</td>
                        <td class="tablaLegal"></td>
                        <td class="tablaLegal">Llave de tuercas</td>
                        <td class="tablaLegal"></td>
                        <td class="tablaLegal">X</td>
                    </tr>';

    return $template;
}


function getTemplateCartaResponsiva($contrato, $arrayDatos, $dirCliente, $dirVendedor){
    $fecha= getFechasTenencia($contrato['ultima_tenencia'],$contrato['anio']);
    $tarjeton= getExistenciaTarjeta($contrato['tarjeton']);
    $tarjeta = getExistenciaTarjeta($contrato['tarjeta_circulacion']);
    $folioTarjeta= $tarjeta=="SI"? $contrato['folio_tarje_circul']: "NA";
    $folioTarjeton= $tarjeton=="SI"? $contrato['folio_tarjeton']: "NA";
    $verificaciones= getExistenciaTarjeta($contrato['verificaciones_coche']);
    $plantilla = '
    <body>
        <div class="container">
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
                    <td class="res">'.$contrato['tipo_carro'].'</td>
                    <td>COLOR:</td>
                    <td class="res">'.$contrato['color'].'</td>
                </tr>
                <tr>
                    <td>MOTOR:</td>
                    <td class="res" colspan="3">'.$contrato['no_motor'].'</td>
                    <td>SERIE:</td>
                    <td class="res" colspan="3">'.$contrato['numero_serie_vehicular'].'</td>
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
                Cantidad con letra  <span class="res">( Ciento Cincuenta y Cinco Mil Pesos MXN NM)</span>
            </p>
            <p>
                Estando de conformidad ambas partes con los derechos y obligaciones correspondientes,
                firmado la presente para constancia. <br>
                En caso de cancelar esta operación el Sr.  <span class="res">'.$contrato['cliente'].'</span> acepta pagar el
                <span class="res">40%</span>  del valor de la operación que corresponde a <span class="res">$ '.$contrato['total'].'</span>
            </p>
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
                <span class="fecha res">Nicolas Romero, Edomex</span> a
                <span class="fecha res">'.$arrayDatos['fecha'].'</span> 
                a las <span class="fecha res">'.$arrayDatos['hora'].'</span> horas.
            </p>
            <h2 class="centrar">Lugar Fecha Hora de la Operación</h2>
            <table>
                <tbody>
                <tr>
                    <td colspan="2">
                        <div class="titulostable">VEDNEDOR</div>
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
                    <td><span class="fecha res">'.$dirVendedor['colonia'].'</span></td>
                    <td>COLONIA:</td>
                    <td><span class="fecha res">'.$dirCliente['colonia'].'</span></td>
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
                        <div class="titulostable">ENTREGO POR MI VOLUNTAD</div>
                    </td>
                    <td colspan="2">
                        <div class="titulostable">RECIBI DE CONFORMIDAD</div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="firma">            </td>
                    <td colspan="2" class="firma">            </td>
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
                        <div class="titulostable">TESTIGO</div>
                    </td>
                    <td colspan="2">
                        <div class="titulostable">TESTIGO</div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="firma">            </td>
                    <td colspan="2" class="firma">            </td>
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
