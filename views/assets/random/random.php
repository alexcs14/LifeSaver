<?php

function randomAlpha($lenght){
  $character="ABCDEFGHIJKLMNOPQRSTUVXYZabcdefghijklmnopqrstuvxyz0987654321";
  $characterLen=strlen($character);
  $random="";
  for ($i=0; $i <$lenght ; $i++) {
    $random.=$character[rand(0,$characterLen-1)];
  }
  return $random;
}

 ?>
