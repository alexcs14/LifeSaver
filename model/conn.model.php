<?php
class DataBase{

  private static $dbhost="localhost";
  private static $dbname="lifesaver";
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

  //Errores DataBase
  public function errorLog($cod,$file,$line,$text){
    $log = fopen("system.log","a");
    fwrite($log,date("d-m-Y h:i:s")."  Error: #".$cod." -> ".$text." Archivo: ".$file." Linea: (".$line.")"."\r\n");
    fclose($log);
  }
}
?>
