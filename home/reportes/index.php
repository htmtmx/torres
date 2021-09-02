<?php
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

