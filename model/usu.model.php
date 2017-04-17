<?php
include "model/conn.model.php";

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
      $sql="INSERT INTO usuario (usu_cod,usu_rol_cod,usu_nom,usu_ape,tipo_docu,usu_documento,usu_email,usu_sex) VALUES(?,?,?,?,?,?,?,?)";
      $query=$this->pdo->prepare($sql);
      $query->execute(array($data[8],$data[7],$data[0],$data[1],$data[2],$data[3],$data[4],$data[6]));

      $sql="INSERT INTO acceso VALUES(?,?,?,?,?)";
      $query=$this->pdo->prepare($sql);
      $query->execute(array($data[9],$data[8],$data[5],$data[10],$data[11]));

      $msn="Usuario guardado con exito";
    } catch (PDOException $e) {
      $cod = $e->getCode();
      $file = $e->getFile();
      $line = $e->getLine();
      $text = $e->getMessage();
      DataBase::errorLog($cod,$file,$line,$text);
      $msn="Ha ocurrido un error";
    }
    return $msn;
  }

  public function readUserbyEmail($data){
    try{
        $sql="SELECT usuario.usu_cod,usu_nom,usu_ape,acc_pass,acc_token FROM usuario INNER JOIN acceso ON acceso.usu_cod = usuario.usu_cod WHERE usu_email = ?";
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

  public function __DESTRUCT(){
    DataBase::disconnect();
  }
}
?>
