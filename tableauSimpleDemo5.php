<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $tab=[10,11,13,8,7,22];
        $total=array_reduce($tab,function($sum,$x){
               return $sum+$x;
        },0);
        echo "la somme des élement du tableau est $total";
       $mult=array_reduce($tab,function($prod,$x){
               return $prod*$x;
        },1);
      /* $sum=0;
        foreach($tab as $x){
            $sum+=$x;
        }
*/
    ?>
</body>
</html>