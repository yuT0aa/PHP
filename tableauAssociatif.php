<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
  $fruit=["nom"=>"pomme","prix"=>13.5,"ve"=>60,"origine"=>"Maroc"];
  print_r($fruit);
  echo"<br/>";
 echo "<dl>";

foreach($fruit as $k=>$v){
    echo "<dt>$k</dt><dd>$v</dd>";
}



?>
</body>
</html>