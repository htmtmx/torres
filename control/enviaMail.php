<?php
function enviaCorreoRegistro($correo,$nombre,$username, $empresaName)
{
    $body = getHtmlBody_Registro($nombre,$username,$empresaName);
    return objMailSend($correo,"Registro","Registro en ProyecTracker",$body);
}
function objMailSend($toMail, $intencion, $asunto, $body)
{
    //creando un obj de PHPMailer
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->CharSet = 'UTF-8';
    $mail->SMTPDebug  = 1;
    //destinos
    /*
     * tracker@reckreastudios.com
     * pruebasmail@reckreastudios.com
     * */
    $contacto = USER_MAIL;
    $pass_contacto = PW_COUNT;
    $para = $toMail; // PARA ENVIAR EL CORREO AL QUE SE ANUNCIA
    //PUede ser segun sea el caso empresa.com.mx
    $mail->Host = HOST_SERVER_MAIL;  // mail. o solo dominio - Servidor de Salida. (recomiendo sin mail.)
    $mail->SMTPAuth = true;
    $mail->Username = $contacto;  // Correo Electrónico para SMTP correo@dominio.tld
    $mail->Password = $pass_contacto; // Contraseña para SMTP


    //destino
    $mail->From     = $contacto;    // Correo Electronico para SMTP
    $mail->FromName = 'ProyecTracker | '.$intencion;
    $mail->AddAddress($para); // Dirección a la que llegaran los mensajes

    $mail->Port = PORT_SMTP;
    $mail->IsHTML(true);
    $mail->Subject  = $asunto;
    $mail->Body = $body;
    return $mail->Send();

    $Envio = $mail ->Send();
    $Intentos = 1;

    while((!$Envio) && ($Intentos < 5)){
        sleep(5);
        $Envio = $mail ->Send();
        $Intentos += 1;
    }

    if($Envio == 'true'){
        $Salida = true;
    }
    else{
        $Salida = $mail->ErrorInfo;
    }

    return $Salida;
}

function getHtmlBody_Registro($nombre,$username,$empresaName)
{
    $body = "
        <div style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';background-color:#ffffff;color:#45506d;height:100%;line-height:1.4;margin:0;padding:0;width:100%!important'>
    <table width='100%' cellpadding='0' cellspacing='0' role='presentation' style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';background-color:#f8f8f9;margin:0;padding:0;width:100%'>
        <tbody>
            <tr>
                <td align='center' style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol''>
                    <table width='100%' cellpadding='0' cellspacing='0' role='presentation' style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';margin:0;padding:0;width:100%'>
                        <tbody>
                            <tr>
                                <td style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';padding:45px 0 35px 0;text-align:center'>
                                    <a href='https://reckreastudios.com/tracker' style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';color:#3d4852;font-size:19px;font-weight:bold;text-decoration:none;display:inline-block' target='_blank' data-saferedirecturl='https://www.google.com/url?q=https://api.positus.global&amp;source=gmail&amp;ust=1592625966775000&amp;usg=AFQjCNEPExPnyh82o_lbVUFefYsdkgOGuQ'>
                                    <img src='https://reckreastudios.com/tracker/logo.min.png' alt='Positus Logo' style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';max-width:100%;border:none;width:175px;height:46px' class='CToWUd'></a>
                                </td>
                            </tr>
                            <tr>
                                <td width='100%' cellpadding='0' cellspacing='0' style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';background-color:#f8f8f9;border-bottom:1px solid #f8f8f9;border-top:1px solid #f8f8f9;margin:0;padding:0;width:100%'>
                                    <table align='center' width='570' cellpadding='0' cellspacing='0' role='presentation' style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';background-color:#ffffff;border-radius:6px;border-width:1px;border-style:solid;border-color:#d1d3db;margin:0 auto;padding:0;width:570px'>
                                        <tbody>
                                            <tr>
                                                <td style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';max-width:100vw;padding:32px'>
                                                    <h1 style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';color:#172449;font-size:30px;font-weight:bold;margin-top:0;text-align:left'>
                                                        HOLA ".$nombre." Te damos la bienvenida a ProyecTracker
                                                    </h1>
                                                    <h6>Gracias por registrarte, tu empresa ".$empresaName." ya podran crear proyectos, compartir su liga para que le den seguimiento.</h6>
                                                    <h3>¿Que puedes hacer en ProyecTracker?</h3>
                                                    <h6>Registra colaboradores</h6>
                                                    <h6>Crea grupos de colaboracion</h6>
                                                    <h6>Cada grupo puede estar realizando un proyecto distinto</h6>
                                                    <h6>-Registra tus prouectos, ponle un nombre y selecciona el sector (Tambien pueden ser tesis)</h6>
                                                    <h6>-Asignale etapas y sub etapas</h6>
                                                    <h6>-Cuando hayas terminado una sub-etapa, marcala como terminada</h6>
                                                    <h6>-Tracker calculara tu avance en funcion de las subetapas dandote un porcentaje de avance por etapa</h6>
                                                    <h6>-Y tambien calculamos tu avance total del proyecto</h6>
                                                    <h6>-Y lo mejor de todo: comparte con quien gustes el avance de tu proyecto</h6>
                                                    <p style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';color:#45506d;font-size:16px;line-height:1.5em;margin-top:0;text-align:left'>
                                                    
                                                    </p>
                                                    <table align='center' width='100%' cellpadding='0' cellspacing='0' role='presentation' style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';margin:30px auto;padding:0;text-align:center;width:100%'>
                                                        <tbody>
                                                            <tr>
                                                                <td align='center' style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol''>
                                                                    <table width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol''>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td align='center' style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol''>
                                                                                    <table border='0' cellpadding='0' cellspacing='0' role='presentation' style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol''>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol''>
                                                                                                    <a href='https://reckreastudios.com/tracker/APP/' rel='noopener' style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';border-radius:4px;color:#fff;font-size:16px;display:inline-block;overflow:hidden;text-decoration:none;background-color:#2e5ee9;border-bottom:11px solid #2e5ee9;border-left:20px solid #2e5ee9;border-right:20px solid #2e5ee9;border-top:11px solid #2e5ee9' target='_blank'>
                                                                                                    Iniciar Sesión</a>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <p style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';color:#45506d;font-size:16px;line-height:1.5em;margin-top:0;text-align:left'>
                                                    Nuevamente gracias por registrarte<br><br><br><br>
                                                    Te enviamos un saludo enorme <br>
Equipo ProyecTracker
</p>
                                                    <table width='100%' cellpadding='0' cellspacing='0' role='presentation' style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';border-top:1px solid #d1d3db;margin-top:25px;padding-top:25px'>
                                                        <tbody>
                                                            <tr>
                                                                <td style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol''>
                                                                    <p style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';color:#45506d;line-height:1.5em;margin-top:0;text-align:left;font-size:14px'>
Accede con tu correo y contraseña que registraste. Inicia sesion y forma parte de la comunidad Tracker.
                                                                    <span style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';word-break:break-all'>
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol''>
                                    <table align='center' width='570' cellpadding='0' cellspacing='0' role='presentation' style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';margin:0 auto;padding:0;text-align:center;width:570px'>
                                        <tbody>
                                            <tr>
                                                <td align='center' style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';max-width:100vw;padding:32px'>
                                                    <p style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';line-height:1.5em;margin-top:0;color:#a2a7b6;font-size:12px;text-align:center'>
ProyecTracker © 2021 - Todos los derechos reservados</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <div class='yj6qo'></div>
    <div class='adL'></div>
    </div>
";
    return $body;
}

//datos que llegan por POST / o funcion dependiendo el uso
/*function enviaCorreo($nombre, $correo)
{
    //Determinar horario y zona
    date_default_timezone_set('America/Mexico_City');
    setlocale(LC_TIME, 'es_MX.UTF-8');
    $fecha_hora = date("Y-m-d H:i:s");
    require("./lib-mail/class.phpmailer.php");
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->CharSet = 'UTF-8';

    $contacto = "pruebasmail@reckreastudios.com";
    $pwd_contacto = "holaMundo123";
    $para = $correo; //Para enviar el correo al que se anuncia

    //Asignar al host que manejaremos
    $mail->Host = "smtp.hostinger.com";
    $mail->SMTPAuth = true;
    $mail->Username = $contacto;//Correo electronico para SMTP
    $mail->Password = $pwd_contacto;//Contraseña para SMTP

    //destino
    $mail->From = $contacto;
    $mail->FromName = 'Portal Autos Torres';
    $mail->AddAddress($para);
    //opcional
    $mail->addCC('cesar.hpp96@hotmail.com');

    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->Subject = "Gracias por contactarnos";
    $mail->Body = '
        <div style="background-color:#f4f4f4">
   <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;"></span>   
   <div style="Margin:0px auto;max-width:600px">
      <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%">
         <tbody>
            <tr>
               <td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:0px;padding-top:0px;text-align:center;vertical-align:top">
                  <div class="m_2518046461046522955mj-column-per-100 m_2518046461046522955outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%">
                     <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top" width="100%">
                        <tbody>
                           <tr>
                              <td align="center" style="font-size:0px;padding:10px 25px;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;word-break:break-word">
                                 <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px">
                                    <tbody>
                                       <tr>
                                          <td style="width:600px">
                                             <a href="https://houselink.info" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://houselink.info">
                                             <img alt="" height="auto" src="https://ci4.googleusercontent.com/proxy/Po-LEee6KkQ92jHbvXJOCjdUxW2gKhzL8ZJB09VrOLxrLnpRqx-6_aiyPFHZsRM5tKrOAUer8wr2f522e0wEC8Q=s0-d-e1-ft#http://kj1x.mjt.lu/img/kj1x/b/lmnt4/mwtmx.jpeg" style="border:none;border-radius:px;display:block;outline:none;text-decoration:none;height:auto;width:100%" title="" width="600" class="CToWUd">
                                             </a>
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </td>
            </tr>
         </tbody>
      </table>
   </div>
   <div style="background:#ffffff;background-color:#ffffff;Margin:0px auto;max-width:600px">
      <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#ffffff;background-color:#ffffff;width:100%">
         <tbody>
            <tr>
               <td style="direction:ltr;font-size:0px;padding:20px 0px 20px 0px;padding-bottom:5px;padding-top:5px;text-align:center;vertical-align:top">
                  <div class="m_2518046461046522955mj-column-per-100 m_2518046461046522955outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%">
                     <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top" width="100%">
                        <tbody>
                           <tr>
                              <td align="left" style="font-size:0px;padding:0px 25px 0px 25px;padding-top:5px;padding-bottom:0px;word-break:break-word">
                                 <div style="font-family:Arial,sans-serif;font-size:13px;line-height:22px;text-align:left;color:#55575d">
                                    <h1 style="font-size:20px;font-weight:bold"><span style="font-size:16px">Xin chào ${user},</span></h1>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td align="left" style="font-size:0px;padding:0px 25px 0px 25px;padding-top:0px;padding-bottom:0px;word-break:break-word">
                                 <div style="font-family:Arial,sans-serif;font-size:13px;line-height:22px;text-align:left;color:#55575d">
                                    <p style="font-size:13px;margin:10px 0">${message}</p>
                                 </div>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </td>
            </tr>
         </tbody>
      </table>
   </div>
   <div style="background:#ffffff;background-color:#ffffff;Margin:0px auto;max-width:600px">
      <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#ffffff;background-color:#ffffff;width:100%">
         <tbody>
            <tr>
               <td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:0px;padding-top:0px;text-align:center;vertical-align:top">
                  <div class="m_2518046461046522955mj-column-per-100 m_2518046461046522955outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%">
                     <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top" width="100%">
                        <tbody>
                           <tr>
                              <td align="left" style="font-size:0px;padding:0px 25px 0px 25px;padding-top:5px;padding-bottom:0px;word-break:break-word">
                              </td>
                           </tr>
                           <tr>
                              <td align="left" style="font-size:0px;padding:0px 25px 0px 25px;padding-top:0px;padding-bottom:0px;word-break:break-word">
                                 <div style="font-family:Arial,sans-serif;font-size:13px;line-height:22px;text-align:left;color:#55575d">
                                    ${customArea}
                                 </div>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </td>
            </tr>
         </tbody>
      </table>
   </div>
   <div style="background:#ffffff;background-color:#ffffff;Margin:0px auto;max-width:600px">
      <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#ffffff;background-color:#ffffff;width:100%">
         <tbody>
            <tr>
               <td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:1px;padding-top:10px;text-align:center;vertical-align:top">
                  <div class="m_2518046461046522955mj-column-per-100 m_2518046461046522955outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%">
                     <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top" width="100%">
                        <tbody>
                           <tr>
                              <td align="left" style="font-size:0px;padding:10px 25px;padding-top:5px;padding-right:20px;padding-bottom:5px;padding-left:20px;word-break:break-word">
                                 <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:separate;line-height:100%">
                                    <tbody>
                                       <tr>
                                          <td align="center" bgcolor="#1675A9" role="presentation" style="border:1px solid #e7e7e7;border-radius:3px;padding:10px 15px 10px 15px;background:#1675a9" valign="middle">
                                             <p style="background:#1675a9;color:#ffffff;font-family:Arial,sans-serif;font-size:13px;font-weight:normal;line-height:120%;Margin:0;text-decoration:none;text-transform:none">
                                                <a href="https://houselink.info" style="color:#ffffff;text-decoration:none;"><span style="color:#ffffff;"><b>Truy cập HOUSELINK</b></span></a>
                                             </p>
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </td>
            </tr>
         </tbody>
      </table>
   </div>
   <div style="background:#ffffff;background-color:#ffffff;Margin:0px auto;max-width:600px">
      <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#ffffff;background-color:#ffffff;width:100%">
         <tbody>
            <tr>
               <td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:10px;padding-top:1px;text-align:center;vertical-align:top">
                  <div class="m_2518046461046522955mj-column-per-100 m_2518046461046522955outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%">
                     <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top" width="100%">
                        <tbody>
                           <tr>
                              <td style="font-size:0px;padding:10px 25px;padding-right:0px;padding-left:0px;word-break:break-word">
                                 <p style="border-top:solid 2px #e7e7e7;font-size:1;margin:0px auto;width:100%">
                                 </p>
                              </td>
                           </tr>
                           <tr>
                              <td align="left" style="font-size:0px;padding:10px 25px;padding-top:0px;padding-bottom:0px;word-break:break-word">
                                 <div style="font-family:Arial,sans-serif;font-size:13px;line-height:22px;text-align:left;color:#55575d">
                                    <p style="font-size:13px;line-height:8px;margin:10px 0"><b>HOUSELINK JSC.,</b></p>
                                    <p style="font-size:13px;line-height:8px;margin:10px 0">Level 9, Sannam tower, 78 Duy Tan St,&nbsp;Cau Giay Dist , Hanoi, Vietnam</p>
                                    <p style="font-size:13px;line-height:8px;margin:10px 0">T:&nbsp;(84-24) 3795 5620 | F:&nbsp;(84-24) 3795 5620</p>
                                    <p style="font-size:13px;line-height:8px;margin:10px 0">E: <a href="mailto:support@houselink.com.vn" target="_blank">support@houselink.com.vn</a></p>
                                    <p style="font-size:13px;line-height:8px;margin:10px 0"><u>Terms of Use</u>&nbsp;|&nbsp;<u>Privacy Policy©</u>&nbsp;</p>
                                 </div>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </td>
            </tr>
         </tbody>
      </table>
   </div>
   <div style="Margin:0px auto;max-width:600px">
      <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%">
         <tbody>
            <tr>
               <td style="direction:ltr;font-size:0px;padding:20px 0px 20px 0px;padding-bottom:0px;padding-top:0px;text-align:center;vertical-align:top">
                  <div class="m_2518046461046522955mj-column-per-100 m_2518046461046522955outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%">
                     <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top" width="100%">
                        <tbody>
                           <tr>
                              <td align="center" style="font-size:0px;padding:0px 20px 0px 20px;padding-top:0px;padding-right:15px;padding-bottom:0px;word-break:break-word">
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </td>
            </tr>
         </tbody>
      </table>
   </div>
</div>
    ';
   return $mail->Send();
}*/