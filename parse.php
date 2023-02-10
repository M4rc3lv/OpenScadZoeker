<?php
 $ScadExecutable="/usr/bin/openscad";

 $fil=$_GET["fil"];
 //echo "Aap: $fil";
 $filcmd = escapeshellarg($fil);

 $dir = dirname(getcwd()."/tmp".$fil);
 if(!file_exists($dir))
  mkdir($dir,0777,true);

 $filout=escapeshellarg(getcwd()."/tmp".$fil.".png");
 if(!file_exists(getcwd()."/tmp".$fil.".png") || filemtime(getcwd()."/tmp".$fil.".png")<filemtime($fil))
  exec("$ScadExecutable  -o $filout $filcmd");

 echo $fil.".png";//$filout;
?>

