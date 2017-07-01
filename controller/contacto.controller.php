<?php

  class ContactoController{

    public function index(){
      require_once 'views/include/header.php';
      require_once 'views/include/menu.php'; 
      require_once 'views/module/contacto_mod/contacto.php';
      require_once 'views/include/footer.php';
    }
  }

?>
