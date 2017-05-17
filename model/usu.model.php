<?php
include "model/conn.model.php";
require_once('library/PHPMailer/PHPMailerAutoload.php');
include "views/include/anexo/include.php";


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
        $sql="SELECT usuario.usu_cod,usu_nom,usu_ape,usu_documento,acc_pass,acc_token,acc_est FROM usuario INNER JOIN acceso ON acceso.usu_cod = usuario.usu_cod WHERE usu_email = ?";
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

    $email->Username = EMAIL;
    $email->Password = PASSWORD;


    $email->setFrom(EMAIL,'LifeSaver');
    $email->addAddress($correo);
    $email->Subject = 'Recuperar contraseña - LifeSaver';
    $email->AltBody = 'Sigo sin saber pa que sirve esto...';
    $email->msgHTML("
    <h1>RECUPERAR CONTRASEÑA</h1></br>
    <p>Clic en el siguiente enlace para recuperar su contraseña: </p></br>
    <a href='http://localhost/LifeSaver/newpass'>Recuperar Contraseña</a>
    ");

    if (!$email->send()) {
        echo "Error: ".$email->ErrorInfo;
    } else {
        echo $correo;
    }
  }

public function mailAct(
  $email = new PHPMailer;
  $email->isSMTP();
  $email->Host = 'smtp.gmail.com';
  $email->SMTPSecure = 'tls';
  $email->Port = 587;
  $email->SMTPAuth = true;

  $email->Username = EMAIL;
  $email->Password = PASSWORD;


  $email->setFrom(EMAIL,'LifeSaver');
  $email->addAddress($correo);
  $email->Subject = 'Activar cuenta - LifeSaver';
  $email->AltBody = 'Sigo sin saber pa que sirve esto...';
  $email->msgHTML("
  <h1>ACTIVAR CUENTA</h1></br>
  <p>Clic en el siguiente enlace para activar su cuenta: </p></br>
  <a href='http://localhost/LifeSaver/login'>Activar cuenta</a>
  ");

  if (!$email->send()) {
      echo "Error: ".$email->ErrorInfo;
    } else {
      echo $correo;
    }
)

  public function new_pass($data){
    try {
      $sql = "UPDATE acceso SET acc_pass = ? WHERE usu_email = ?";
      $query = $this->pdo->prepare($sql);
      $query->execute(array($data[1],$data[0]));
    } catch (PDOException $e) {
      $cod = $e->getCod();
      $file = $e->getFile();
      $line = $e->getLine();
      $text = $e->getMessage();
      DataBase::errorLog($cod,$file,$line,$text);
    }

  }

  public function __DESTRUCT(){
    DataBase::disconnect();
  }
}
?>
