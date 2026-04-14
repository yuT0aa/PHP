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
       $odd=array_filter($tab,function($x){
                 return $x%2==0;
       });
        print_r($odd);
       /*$odd=[];
       foreach($tab as $x){
            if($x%2==0){
                array_push($odd,$x);
            }
       }*/
    ?>
</body>
</html>