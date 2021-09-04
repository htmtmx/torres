<?php

function getTemplateCartaResponsiva($contrato){
    $plantilla = '
    <body>
        <div class="container">
            <div class="row">
                    <h1>AUTOS TORRES</h1>
            </div>
            <div class="row">
                <div class="left"><h1>RESPONSIVA DE COMPRA VENTA DE PARTICULAR A PARTICULAR</h1></div>
                <div class="right"><h1>23 de Enero de 2021</h1></div>
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
                    <td class="res" colspan="3">'.$contrato['color'].'</td>
                    <td>SERIE:</td>
                    <td class="res" colspan="3">'.$contrato['color'].'</td>
                </tr>
                <tr>
                    <td colspan="8"><h3>Con los siguientes documentos:</h3></td>
                </tr>
                <tr>
                    <td>FACTURA No.</td>
                    <td colspan="3"class="res">4151</td>
                    <td>de</td>
                    <td colspan="3"class="res">Autos Chidos SA. de CV.</td>
                </tr>
                <tr>
                    <td>TARJETON:</td>
                    <td class="res">SI</td>
                    <td>FOLIO:</td>
                    <td class="res">4561</td>
                    <td>TENENCIAS:</td>
                    <td colspan="3" class="res">2016, 2017, 2018, 2019, 2020, 2021 </td>
                </tr>
                <tr>
                    <td colspan="2">TARJETA DE CIRCULACION:</td>
                    <td class="res">SI</td>
                    <td>FOLIO:</td>
                    <td class="res">4561</td>
                    <td>PLACAS:</td>
                    <td colspan="2" class="res">HDM1561</td>
                </tr>
                <tr>
                    <td>VERIFICACIONES:</td>
                    <td class="res">SI</td>
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
                Se realiza la Compra - Venta de dicha unidad en la cantidad de <span class="res">$ 150,000</span>
                <br>
                Cantidad con letra  <span class="res">( Ciento Cincuenta y Cinco Mil Pesos MXN NM)</span>
            </p>
            <p>
                Estando de conformidad ambas partes con los derechos y obligaciones correspondientes,
                firmado la presente para constancia. <br>
                En caso de cancelar esta operación el Sr.  <span class="res">PEDRO PEREZ LOPEZ</span> acepta pagar el
                <span class="res">40%</span>  del valor de la operación que corresponde a <span class="res">$ 150,000</span>
            </p>
            <p>
                Esta operación se realizará bajo el RÉGIMEN DE RESERVA DE DOMINIO esto es,
                que el comprador otorga al vendedor poder absoluto, de recuperar la unidad detallada,
                en caso de no efectuar los pagos en las fechas ya especificadas, además de cubrir los gastos
                que esto genere. SIN PREVIO JUICIO PENAL O CIVIL.
            </p>
            <p>
                Observaciones:
                <span class="res"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium
                aperiam aspernatur, assumenda deleniti et ex explicabo libero omnis optio quasi. Alias eaque
                labore laboriosam magnam molestiae officia quibusdam voluptate voluptatibus! Lorem ipsum dolor
                sit amet, consectetur adipisicing elit. Dolore ipsum minima nobis repellat. Cupiditate eos id
                placeat porro tempora. Adipisci aliquid, aut eius excepturi placeat reprehenderit. Adipisci
                laudantium non tempore.
                </span>
            </p>
            <p>
                Firmado en
                <span class="fecha res">Nicolas Romero, Edomex</span> a
                <span class="fecha res">16</span> de
                <span class="fecha res "> Agosto</span> del año
                <span class="fecha res">2020</span>
                a las <span class="fecha res">2020</span> horas.
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
                    <td><span class="fecha res">JUAN PEREZ SANCHES</span></td>
                    <td>NOMBRE:</td>
                    <td><span class="fecha res">JUAN PEREZ SANCHES</span></td>
                </tr>
                </tr>
                <tr>
                    <td>DOMICILIO:</td>
                    <td><span class="fecha res">CONOCIDO 1</span></td>
                    <td>DOMICILIO:</td>
                    <td><span class="fecha res">CONOCIDO 2</span></td>
                </tr>
                <tr>
                    <td>COLONIA:</td>
                    <td><span class="fecha res">JUAREZ</span></td>
                    <td>COLONIA:</td>
                    <td><span class="fecha res">MANANTIALES</span></td>
                </tr>
                <tr>
                    <td>TELEFONO:</td>
                    <td><span class="fecha res">45115156</span></td>
                    <td>TELEFONO:</td>
                    <td><span class="fecha res">1561651</span></td>
                </tr>
                <tr>
                    <td>SE IDENTIFICA CON:</td>
                    <td><span class="fecha res">INE (5115156)</span></td>
                    <td>SE IDENTIFICA CON:</td>
                    <td><span class="fecha res">INE (2454542)</span></td>
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

?>

