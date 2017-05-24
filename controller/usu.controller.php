<?php
require_once "model/random.php";
require_once 'model/usu.model.php';

class UsuController{

  private $model;

  public function __CONSTRUCT(){
    $this->model = new UsuModel();
  }

// Crear cuenta
  public function create(){

      $data=$_POST["data"];
      $ver=$_POST["ver"];
      $data[7] = "USER-".date('Ymd')."-".date('hms');
      $data[6] = 1;
      $data[3] = password_hash($data[3],PASSWORD_DEFAULT);
      $data[8] = randCod(50);
      $data[10] = "Inactivo";
      $data[9] = 0;

      $result=$this->model->create($data);
      // if((rowcount($data[9])) > 0){
        // $valor = true;
        // echo json_encode($valor);
      // }
      $msn = $this->model->mailAct($data);

      echo $result;
      header("location: $result");

  }


//Validar correo
  public function validar(){
    $email[0] = $_POST["email"];
    $response = $this->model->readUserbyEmail($email);
    if(count($response[0])<=0){
      $return = array("El correo no existe",false);
    }else{
      if($response["acc_est"] != "activo"){
        $estado = $response["acc_est"];
        $return = array("El usuario esta $estado",false);
      }else{
        $return = array("",true);
      }
  }
  echo json_encode($return);
}

// Correo existente - Registro
public function validarEmail(){
  $email[0] = $_POST["email"];
  $response = $this->model->readUserbyEmail($email);
  if(count($response[0])>0){
    $return = array("El correo ya existe",false);
  }else{
    $return = array("",true);
  }
  echo json_encode($return);
}


//Validar contraseña segun el correo ingresado
  public function userAut(){
    $data[0] = $_POST["email"];
    $data[1] = $_POST["pass"];

    $userData = $this->model->readUserbyEmail($data);

    if(password_verify($data[1],$userData["acc_pass"])){

      $_SESSION["user"]["token"] = $userData["acc_token"];
      $_SESSION["user"]["cod"] = $userData["usu_cod"];
      $_SESSION["user"]["name"] = $userData["usu_nom"];
      $_SESSION["user"]["lastn"] = $userData["usu_ape"];
      $_SESSION["user"]["email"] = $_POST["email"];
      $return = array(true,"Bienvenido",$_SESSION["user"]["token"]);
    }else{
      $return = array(false,"Contraseña incorrecta","");
    }
    echo json_encode($return);
  }


//Recuperar contraseña {

// --> Recuperar
public function recover(){
  $correo[0] = $_POST["email"];
  // $documento = $_POST["documento"];
  $result = $this->model->readUserbyEmail($correo);
  if(count($result[0])<=0){
    $return = array("El correo no existe",false);
  }else{
    // if($result["usu_documento"] != $documento){
    //   $return = array("El correo no conincide con la cuenta",false);
    // }else{
      $return = array("",true);
      // $enviar = $this->model->mail($correo);
      // header("location: ../login");
    // }
  }
  echo json_encode($return);
}

public function enviar_email(){
  $email=$_POST["email"];
  $result = $this->model->mail($email);
  echo json_encode($result);
}

//verificar email
public function verificar_email(){
  $email = $_POST["email"];
  $result = $this->model->readUserbyEmail($email);
  if(count($result[0])<=0){
    $return = array("El correo no existe",false);
  }else{
    $return = array("",true);
  }
  echo json_encode($return);
}

//var auth
public function autenticar(){
  if($_GET["auth"]==true){
    $data[0] = $_GET["token"];
    $data[1] = "activo";
    $result = $this->model->updateUserByToken($data);
    header("location: login");
  }
}

//Cambiar contraseña
public function cambio(){
  $data = $_POST["data"];
  $result = $this->model->new_pass($data);
  echo $result;
}
//}

  public function logout(){
    session_destroy();
    header("location: login");
  }
}
?>
