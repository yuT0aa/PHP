<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php $arr=["banane","pomme","orange","fraise"];     ?>
</head>
<body>
  <?php
  /*foreach($tableName as $item){
            ...........    }*/
        echo"<ul>";
    foreach($arr as $ele){
        echo"<li>$ele</li>";
    }
    echo"</ul>";
    //supprimer le dernier element du tableau 
   /* $a=array_pop($arr);
    print_r($arr);
    echo "<br/>".$a;*/
   //supprimer le premier element du tableau 
    $a=array_shift($arr);
    print_r($arr);
    echo "<br/>".$a;
?>
</body>
</html>