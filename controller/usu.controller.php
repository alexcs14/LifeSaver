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
    if($ver===$data[5]){

      $data[8] = "USUARIO-".date('Ymd')."-".date('hms');
      $data[7] = 1;
      $data[5] = password_hash($data[5],PASSWORD_DEFAULT);
      $data[10] = $data[8];
      $data[9] = randCod(50);
      $data[12] = "Inactivo";
      $data[11] = 0;

      $result=$this->model->create($data);
      header("location: index.php?c=main&msn=$result");
    }else{
      $msn="Las contraseñas no son similares";
      header("location: index.php?c=main&a=viewCreate&msn=$msn");
    }
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
    header("Location: inicio");
  }
}
?>
