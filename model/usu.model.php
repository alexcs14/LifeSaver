<?php
//require_once('library/PHPMailer/PHPMailerAutoload.php');
//include "views/include/anexo/include.php"; DANIELLLL MIRE ESE ARCHIVO SON CONSTATNTES PARA PHPMAILER


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
      $msn="Ha ocurrido un error";
    }
  }

  /*public function create($data){
    try {
      $sql="INSERT INTO usuario (usu_cod,rol_cod,usu_nom,usu_ape,usu_email,usu_fechna,usu_sex) VALUES(?,?,?,?,?,?,?)";
      $query=$this->pdo->prepare($sql);
      $query->execute(array($data[7],$data[6],$data[0],$data[1],$data[2],$data[4],$data[5]));
      $sql="INSERT INTO acceso VALUES(?,?,?,?,?)";
      $query=$this->pdo->prepare($sql);
      $query->execute(array($data[8],$data[7],$data[3],$data[9],$data[10]));

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
    $email->msgHTML("<!DOCTYPE html>
    <html>
      <head>
        <meta charset='utf-8'>
        <title></title>
      </head>
      <body>
        <table width='100%' cellpadding='0' cellspacing='0' border='0' style='border-collapse:collapse;line-height:24px;margin:0;padding:0;width:100%;font-size:17px;color:#373737;background:#f9f9f9'><tbody><tr><td valign='top' style='font-family:'Helvetica Neue',Helvetica,Arial,sans-serif!important;border-collapse:collapse'>
          <table width='100%' cellpadding='0' cellspacing='0' border='0' style='border-collapse:collapse'><tbody><tr><td valign='bottom' style='font-family:'Helvetica Neue',Helvetica,Arial,sans-serif!important;border-collapse:collapse;padding:20px 16px 12px'>
            </td>
            <tr>
              <td  style='display:flex;justify-content:center;align-items:center;width:46%;background-color:#0091FF;height:10vh;font-size:20px;margin-left:27%;border-radius:5px'><img src='views/assets/img/logo.png' alt='LefeSaver'></td>
            </tr>
          </tr></tbody></table></td>
      		</tr><tr><td valign='top' style='font-family:'Helvetica Neue',Helvetica,Arial,sans-serif!important;border-collapse:collapse'>
            <table cellpadding='32' cellspacing='0' border='0' align='center' style='border-collapse:collapse;background:white;border-radius:0.5rem;margin-bottom:1rem'><tbody><tr><td width='546' valign='top' style='font-family:'Helvetica Neue',Helvetica,Arial,sans-serif!important;border-collapse:collapse'>
              <div style='max-width:600px;margin:0 auto'>
                <div style='background:white;border-radius:0.5rem;margin-bottom:1rem'>
                  <h2 style='color:#003D6B;line-height:30px;margin-bottom:12px;margin:0 0 12px;text-align:center;'>Vaya! Has olvidado tu contraseña...</h2>
                  <p style='font-size:17px;line-height:24px;margin:0 0 16px'>
                    Hola Jhony,
                  </p>
                  <p style='font-size:17px;line-height:24px;margin:0 0 16px'>
                  Hemos registrado tu solicitud de cambio de contraseña.
                  </p>
                    <p style='font-size:17px;line-height:24px;margin:0 0 16px'>
                      Gracias,<br>
                      Equipo desarrollador de <span class='il'>LifeSaver.</span>
                    </p>
                    <a href='http://localhost/LifeSaver/newpass' type='submit' class='btn btn-default' style='text-decoration:none;color:black;border-radius:5px;margin-left:30%;border:2px solid #0091FF;height:20;background-color:white;width:32%;height:7vh;font-size:16px;font-weight:bold'>Recuperar Contraseña</a>
                  </div>

                </div>
              </td>
            </tr></tbody></table></td>
          </tr></tbody></table>
      </body>
    </html>

");

    if (!$email->send()) {
        echo "Error: ".$email->ErrorInfo;
    } else {
        echo $correo;
    }
  }

public function mailAct($data){
  $correo = $data[2];
  $token = $data[8];

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
  $email->msgHTML("
  <h1>ACTIVAR CUENTA</h1></br>
  <p>Clic en el siguiente enlace para activar su cuenta: </p></br>
  <a href='http://localhost/LifeSaver/index.php?c=usu&a=autenticar&auth=true&token=$token'>Activar cuenta</a>
  ");

  if (!$email->send()) {
    echo "Error: ".$email->ErrorInfo;
  } else {
    echo $correo;
  }
}

public function updateUserByToken($data){
  try {
    $sql = "UPDATE acceso SET acc_est = ? WHERE acc_token = ?";
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

  }*/

  public function __DESTRUCT(){
    DataBase::disconnect();
  }
}
?>
