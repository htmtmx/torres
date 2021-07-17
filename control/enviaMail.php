<?php
//datos que llegan por POST / o funcion dependiendo el uso
function enviaCorreo($nombre, $correo)
{
    //Determinar horario y zona
    date_default_timezone_set('America/Mexico_City');
    setlocale(LC_TIME, 'es_MX.UTF-8');
    $fecha_hora = date("Y-m-d H:i:s");
    require ("./lib-mail/class.phpmailer.php");
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
}