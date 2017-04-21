<?php
class EmailController{

  public static $msg = null;

//   public static function send(){
//     if (isset($_POST["phpmailer"])) {
//     $nombre = htmlspecialchars($_POST("nombre"));
//     $email = htmlspecialchars($_POST("email"));
//     $asunto = htmlspecialchars($_POST("asunto"));
//     $mensaje = $_POST("mensaje");
//     $adjunto = $_FILES("adjunto");
//
//     require "phpmailer/class.phpmailer.php";
//     $mail = new PHPMailer;
//     $mail->Host = "localhost";
//     $mail->From = "shatanoga.yp@gmail.com";
//     $mail->FromName = "Administrador";
//     $mail->subject = $asunto;
//     $mail->addAddress($email,$nombre);
//     $mail-MsgHTML($mensaje);
//
//     if ($adjunto["size"] > 0){
//       $mail->addAttachment($adjunto["temp_name"], $adjunto["name"]);
//     }
//     if($mail->Send()){
//        $msg = "En hora buenAa enviado con exito!! enviado a $email";
//     }else{
//       $msg = " ha ocurrido un error al enviar a  $email";
//     }
//     }
// }

require ('library/PHPMailer-master/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;

$mail->Username = "alexandercos14@gmail.com";
$mail->Password = "jhony321123";

$mail->setFrom('alexandercos14@gmail.com', 'First Last');
$mail->addReplyTo('alexandercos14@gmail.com', 'First Last');
$mail->addAddress('kyon.1498@gmail.com', 'John Doe');
$mail->Subject = 'PHPMailer GMail SMTP test';
$mail->msgHTML("<strong>Mensaje enviado</strong>");
$mail->AltBody = 'This is a plain-text message body';

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
?>
