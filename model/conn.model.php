<?php
class DataBase{

  private static $dbhost="localhost";
  private static $dbname="proyecto_grado";
  private static $dbuser="root";
  private static $dbpass="";
  private static $dbconn=null;

  public static function connect(){
    if(self::$dbconn==null){
      try{
        self::$dbconn = new PDO("mysql:host=".self::$dbhost.";dbname=".self::$dbname,self::$dbuser,self::$dbpass);
        self::$dbconn->exec("SET CHARACTER SET utf8");
      }catch(PDOException $e){
        die("Mensaje: ".$e->getMessage()." -- Linea: ".$e->getLine()." -- Archivo: ".$e->getFile());
      }
    }
    return self::$dbconn;
  }
  public static function disconnect(){
    self::$dbconn=null;
  }
}
?>
