<?php
class EmailController{

  public static $msg = null;

  public static function send(){
    if (isset($_POST["phpmailer"])) {
    $nombre = htmlspecialchars($_POST("nombre"));
    $email = htmlspecialchars($_POST("email"));
    $asunto = htmlspecialchars($_POST("asunto"));
    $mensaje = $_POST("mensaje");
    $adjunto = $_FILES("adjunto");

    require "phpmailer/class.phpmailer.php";
    $mail = new PHPMailer;
    $mail->Host = "localhost";
    $mail->From = "shatanoga.yp@gmail.com";
    $mail->FromName = "Administrador";
    $mail->subject = $asunto;
    $mail->addAddress($email,$nombre);
    $mail-MsgHTML($mensaje);

    if ($adjunto["size"] > 0){
      $mail->addAttachment($adjunto["temp_name"], $adjunto["name"]);
    }
    if($mail->Send()){
       $msg = "En hora buenAa enviado con exito!! enviado a $email";
    }else{
      $msg = " ha ocurrido un error al enviar a  $email";
    }
    }
}
}
?>
