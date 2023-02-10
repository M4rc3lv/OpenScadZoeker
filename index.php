<!DOCTYPE html>
<html>
 <head>
  <title>OpenScad-zoeker</title>
  <link rel="stylesheet" href="client/w3.css" />
  <link rel="stylesheet" href="client/openscadzoeker.css" />
  <script src="client/jquery-3.6.3.min.js"></script>
  <script src="client/openscadzoeker.js"></script>
 </head>
 <body>

<?php


 // https://localhost:8083/?path=/home/marcel/ff
 if(isset($_GET["path"])) $P=$_GET["path"];
 else $P="~";

 // Algoritme: haal eerst recursief alle scadbestanden op en maak dan de UI, via Ajax roep je dan OpenScad weer aan.
 //var_dump($P);
 //var_dump(getDirContents($P));
 $ScadFiles=getDirContents($P);


 function getDirContents($dir, &$results = array()) {
  $files = scandir($dir);
  foreach ($files as $key => $value) {
   $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
   if (!is_dir($path)) {
    if(endsWith($path,".scad"))
     $results[] = $path;
   }
   else if ($value != "." && $value != "..") {
    getDirContents($path, $results);
    //$results[] = $path;
   }
  }
  return $results;
 }

 function startsWith($haystack, $needle) {
  $length = strlen( $needle );
  return substr( $haystack, 0, $length ) === $needle;
 }

 function endsWith( $haystack, $needle ) {
  $length = strlen( $needle );
  if(!$length) return true;
  return substr( $haystack, -$length ) === $needle;
 }

?>

  <div id="m"><img id="test">

   <?php echo "<div class='w3-panel  w3-sand w3-padding'>$P</div>";
    echo '<div class="w3-row ROW">';
    foreach($ScadFiles as $value){
     $v=htmlspecialchars($value);
     $dir=dirname($value);
     $fname =basename($value);
     echo "<div class='w3-col KOL' data-fil=\"$v\"><a target=_blank href=\"folder.php?dir=$dir\" title='Open folder' class='icon2'><img src=pix/folder.png></a><a target=_blank href=\"folder.php?scad=$v\" title='Open in OpenScad' class='icon1' href='#'><img src=pix/scad.png></a><img class='a i' src=pix/ph.png><div>$fname</div></div>\n";
    }
   ?>
   </div>
  </div><!-- m -->

 </body>
</html>
