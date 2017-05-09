<?php
include "model/conn.model.php";
require_once('library/PHPMailer/PHPMailerAutoload.php');


class UsuModel{

  private $pdo;

  public function __CONSTRUCT(){
    try{
      $this->pdo = DataBase::connect();
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
      $cod = $e->getCod();
      $file = $e->getFile();
      $line = $e->getLine();
      $text = $e->getMessage();
      DataBase::errorLog($cod,$file,$line,$text);
      $msn="Ha ocurrido un error";    }
  }

  public function create($data){
    try {
      $sql="INSERT INTO usuario (usu_cod,rol_cod,usu_nom,usu_ape,tipo_docu,usu_documento,usu_email,usu_fechna,usu_sex) VALUES(?,?,?,?,?,?,?,?,?)";
      $query=$this->pdo->prepare($sql);
      $query->execute(array($data[9],$data[8],$data[0],$data[1],$data[2],$data[3],$data[4],$data[6],$data[7]));

      $sql="INSERT INTO acceso VALUES(?,?,?,?,?)";
      $query=$this->pdo->prepare($sql);
      $query->execute(array($data[10],$data[9],$data[5],$data[11],$data[12]));

      $msn= "login";
    } catch (PDOException $e) {
      $cod = $e->getCode();
      $file = $e->getFile();
      $line = $e->getLine();
      $text = $e->getMessage();
      DataBase::errorLog($cod,$file,$line,$text);
      $msn="error";
    }
  return $msn;
  }

  public function readUserbyEmail($data){
    try{
        $sql="SELECT usuario.usu_cod,usu_nom,usu_ape,acc_pass,acc_token,acc_est FROM usuario INNER JOIN acceso ON acceso.usu_cod = usuario.usu_cod WHERE usu_email = ?";
        $query = $this->pdo->prepare($sql);
        $query -> execute(array($data[0]));
        $result = $query->fetch(PDO::FETCH_BOTH);
    }catch(PDOException $e){
      $cod = $e->getCod();
      $file = $e->getFile();
      $line = $e->getLine();
      $text = $e->getMessage();
      DataBase::errorLog($cod,$file,$line,$text);
    }
      return $result;
  }

  public function mail($correo){
    $email = new PHPMailer;
    $email->isSMTP();
    $email->Host = 'smtp.gmail.com';
    $email->SMTPSecure = 'tls';
    $email->Port = 587;
    $email->SMTPAuth = true;

    $email->Username = 'alexandercos14@gmail.com';
    $email->Password = 'jhony321123';


    $email->setFrom('alexandercos14@gmail.com','El Gris');
    $email->addAddress($correo);
    $email->Subject = '¡¡¡FELICIDAD!!!';
    $email->AltBody = 'Sigo sin saber pa que sirve esto...';
    $email->msgHTML("<strong>MUY BUENAS</strong>
    <p>Bueno Esteban, creo que con esto damos por concluido este dolor de cabeza que fue 'phpMailer' jajaja, aunque aun faltan cositas</p>
    </br>
    <h1>SI, AUN ESTOY JUGANDO A VER COMO FUNCIONA ESTO XD POR ESO EL MENSAJE</H1></br>
    <h2>Mas pequeño</h2></br>
    <h3>y más</h3></br>
    <h4>y aun más</h4></br>

    <p>mejor lo dejo hasta acá jajaja </p>
    ");

    if (!$email->send()) {
        echo "Error: ".$email->ErrorInfo;
    } else {
        echo "Mensaje enviado";
    }
  }

  public function __DESTRUCT(){
    DataBase::disconnect();
  }
}
?>
