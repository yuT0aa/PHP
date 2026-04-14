<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
       $tab=["clavier","souris","écran","micro","caméra"];
       $newTab=array_map(function($x){
                 //return count($x);
                 return $x[0];
       },$tab);
        print_r($tab);
        echo"<br/>";
        print_r($newTab);
       /*$odd=[];
       foreach($tab as $x){
            if($x%2==0){
                array_push($odd,$x);
            }
       }*/
    ?>
</body>
</html>