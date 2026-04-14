<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php  
         $numbers=[3,20,10,33,50];
         $len=count($numbers);
         echo "la taille du tableau est : $len élements <br/>";
         for($i=0;$i<$len;$i++){
            //echo "$i"."<br/>";//echo $i
              echo "l'élement de position $i => $numbers[$i]<br/>";
            }
      array_push($numbers,111);//ajouter à la fin
      //afficher le tableau en utilisant print_r
      print_r($numbers);
      echo"<br/>";
    //ajouter au début
    array_unshift($numbers,7);
    var_dump($numbers);
    //echo $numbers; //erreur
    /*
        commentaire sur
        plusieurs
        lignes
    */
    ?>
</body>
</html>