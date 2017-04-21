<?php
class MainController{

  public function index(){
    require_once 'views/include/header.php';
    require_once 'views/module/usu/login.php';
    require_once 'views/include/footer.php';
  }

  public function viewCreate(){
    require_once 'views/include/header.php';
    require_once 'views/module/usu/create.php';
    require_once 'views/include/footer.php';
  }

  public function login(){
    require_once 'views/include/.php';
    require_once 'views/module/usu/login.php';
    require_once 'views/include/.php';
}

  public function inicio(){
    require_once 'views/include/header.php';
    require_once 'views/index.php';
    require_once 'views/include/footer.php';
  }
  public function recoverPass(){
    require_once 'views/include/header.php';
    require_once 'views/module/usu/recuperar.php';
    require_once 'views/include/footer.php';
  }
}
?>
