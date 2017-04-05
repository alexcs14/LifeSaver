<?php

function randCod($length){
  $char = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $charLen = strlen($char);
  $ranAl = '';

  for($i=0; $i<$length;$i++){
    $ranAl .= $char[rand(0,$charLen -1)];
  }
  return $ranAl;
}

?>
