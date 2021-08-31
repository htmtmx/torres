<?php
//incluimos la libreria
include_once "../config/SERVER.php";
require("lib-mail/class.phpmailer.php");
// determinar el horario y zona
date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');


/* General obj send mail*/
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
    $mail->FromName = 'Info | '.$intencion;
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

function enviaCorreoAddUser($correoSend, $pwtmp, $nombre,$empresaName)
{
    $body = getHtmlBody_RegistroAdd($correoSend,  $pwtmp, $nombre, $empresaName);
    return objMailSend($correoSend,"Te han creado una cuenta","Registro en".$empresaName,$body);
}

function getHtmlBody_RegistroAdd($correoSend,$pwtmp, $nombre, $empresaName)
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
                                                        HOLA ".$nombre." Te damos la bienvenida a ".$empresaName."
                                                    </h1>
                                                    <h6>Se te ha creado una cuenta para acceder a autos Torres.</h6>
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
                                                                                                    <a href='http://autostorres.com' rel='noopener' style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';border-radius:4px;color:#fff;font-size:16px;display:inline-block;overflow:hidden;text-decoration:none;background-color:#2e5ee9;border-bottom:11px solid #2e5ee9;border-left:20px solid #2e5ee9;border-right:20px solid #2e5ee9;border-top:11px solid #2e5ee9' target='_blank'>
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
                                                    Tu correo de acceso es:  ".$correoSend."<br>
                                                    TU contraseña temporal es:  ".$pwtmp."<br><br><br>
                                                    Saludos Cordiales <br>
Equipo ProyecTracker
</p>
                                                    <table width='100%' cellpadding='0' cellspacing='0' role='presentation' style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';border-top:1px solid #d1d3db;margin-top:25px;padding-top:25px'>
                                                        <tbody>
                                                            <tr>
                                                                <td style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol''>
                                                                    <p style='box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';color:#45506d;line-height:1.5em;margin-top:0;text-align:left;font-size:14px'>
Te sugerimos cambiar tu contraseña inmediatamente, puedes hacerlo una vez entrando al sistema > cuenta > modificar contraseña
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
                                                        Sistema creado por ReCkreaStudios © 2021 - Todos los derechos reservados</p>
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
    </div>
";
    return $body;
}



