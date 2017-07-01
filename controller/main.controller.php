<?php
class MainController{

  public function index(){
    require_once 'views/include/header.php';
    require_once 'views/module/usu_mod/login.php';
    require_once 'views/include/footer.php';
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
