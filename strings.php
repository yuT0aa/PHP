<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php  
      //récuperer la longueur d'une chaine    
     $name="firstN lastN";
     echo strlen($name)."<br/>";
     //convertir un tableau en string
     $tab=['item1','item2','item3','item4'];
     $mystr=implode(",",$tab);//en js => tab.join(",")
     echo"$mystr<br/>";
    // convertir une string en tableau
     $message="bonjour le monde !!!!";
     $newArr=explode(" ",$message);
     print_r($newArr);
     echo"<br/>";
?>
</body>
</html>