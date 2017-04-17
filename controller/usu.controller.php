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
    // Validar contraseña con expresiones regulares
    // if((strlen($data[5])<8) || strlen($data[5])>16){
      // $res=("La contraseña debe tener entre 8 y 16 caracteres",false);
    // }else{

      //Crear usuario
      $data=$_POST["data"];
      $ver=$_POST["ver"];
      $data[8] = "USUARIO-".date('Ymd')."-".date('hms');
      $data[7] = 1;
      $data[5] = password_hash($data[5],PASSWORD_DEFAULT);
      $data[9] = randCod(50);
      $data[11] = "Inactivo";
      $data[10] = 0;

      $result=$this->model->create($data);

      $res=("",true);
      echo $result;
    // }
    // echo json_encode($res);
  }


//Validar correo
  public function validar(){
    $email[0] = $_POST["email"];
    $response = $this->model->readUserbyEmail($email);
    if(count($response[0])<=0){
      $return = array("El correo no existe",false);
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
      $return = array(true,"Bienvenido");

      $_SESSION["user"]["token"] = $userData["acc_token"];
      $_SESSION["user"]["cod"] = $userData["usu_cod"];
      $_SESSION["user"]["name"] = $userData["usu_nom"];
      $_SESSION["user"]["lastn"] = $userData["usu_ape"];
      $_SESSION["user"]["email"] = $_POST["email"];
    }else{
      $return = array(false,"Contraseña incorrecta");
    }
    echo json_encode($return);
  }


  public function logout(){
    session_destroy();
    header("location: login");
  }
}
?>
