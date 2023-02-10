<?php
 $ScadExecutable="openscad";

 if(isset($_GET["dir"])) {
  echo $_GET["dir"];
  $p=escapeshellarg($_GET["dir"]);
  exec("nemo $p &"); 
 }
 else if(isset($_GET["scad"])) {
  //echo $_GET["scad"];
  $p=escapeshellarg($_GET["scad"]);
  echo $p;
  exec("$ScadExecutable $p >> /dev/null 2>&1 &"); 
 }
 // Dit sluit het venster zodat je alleen Nemo (of OpenScad) ziet
 echo "<script>window.close();</script>";
?>

