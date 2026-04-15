<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //vérifier si l utilisateur à cliqué sur le bouton submit 
     //le clic sur submit => $_SERVER[REQUEST_METHOD]="GET"
     /*foreach($_GET as $key=>$value){
        //vérifer si $value est string 
        echo"$key => $value <br>";
        //sinon 
        echo"$key => :";
        print_r($value); 
        echo"<br>";
     }*/
    //utilser $_POST si la method=POST
    if($_SERVER["REQUEST_METHOD"]=="POST"){
            echo"<ul>";
            echo"<li>".$_POST["fname"]."</li>";
            echo"<li>".$_POST["annee"]."</li>";
            echo"<li>".$_POST["town"]."</li>";
            echo"<li>".implode(',',$_POST["lng"])."</li>";
         echo"</ul>";
    }
    else{
      echo"accés non autorisé !!!!";
    }
     ?>
</body>
</html>