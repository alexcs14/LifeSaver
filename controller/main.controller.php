<?php
require_once("model/usu.model.php");
class MainController{
  private $UsuarioM;

  public function __CONSTRUCT(){
    $this->UsuarioM = new UsuModel();
  }

  public function index(){
    require_once 'views/include/header.php';
    require_once 'views/module/usu_mod/login.php';
    require_once 'views/include/footer.php';
  }
  public function validarEmail(){
    $data[0] = $_POST["email"];
    $result = $this->UsuarioM->readUsuariobyEmail($data);
    if(count($result[0])<=0){
      $return = array(false,"El correo no existe");
    }else{
      $return = array(true,"");
    }
    echo json_encode($return);
  }
  public function login(){
    $data = $_POST["datalogin"];
    $result = $this->UsuarioM->readUsuariobyEmail($data);

    if(password_verify($data[1],$result["acc_password"])){
      $_SESSION["user"]["token"] = $result["acc_id"];
      $_SESSION["user"]["id"] = $result["usu_id"];
      $_SESSION["user"]["nombre"] = $result["usu_nombre"];
      $_SESSION["user"]["apellido"] = $result["usu_apellido"];
      $_SESSION["user"]["rol"] = $result["rol_id"];
      $_SESSION["user"]["email"] = $data[0];
      if ($result["acc_tour"]>=1) {
        $url="dashboard";
      }else{
        $url="completar";
      }
      $return = array(true,"$url",$_SESSION["user"]["token"]);
    }else{
      $return = array(false,"Contraseña incorrecta","");
    }
    echo json_encode($return);
  }
  public function error(){
    require_once 'views/include/header.php';
    require_once 'views/module/error.php';
    require_once 'views/include/footer.php';
  }
  public function dashboard(){
    require_once 'views/include/header.php';
    require_once 'views/include/menu.php';
    require_once 'views/include/footer.php';
  }
}
?>
