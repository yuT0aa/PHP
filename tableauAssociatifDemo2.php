<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $fruits=[["nom"=>"pomme","prix"=>13.5,"ve"=>60,"origine"=>"Maroc"],
    ["nom"=>"banane","prix"=>15,"ve"=>80,"origine"=>"Maroc"],
    ["nom"=>"kiwi","prix"=>20,"ve"=>40,"origine"=>"Maroc"],
    ["nom"=>"fraise","prix"=>18,"ve"=>35,"origine"=>"Maroc"]];
     ?>
 <table border="1" cellspacing="6">
   <thead><tr><th>Nom</th><th>Prix</th><th>Ve</th><th>origine</th></tr></thead>
   <tbody>
   <?php
    foreach($fruits as $f){
    //echo"<tr><td>".$f["nom"]."</td><td>".$f["prix"]."</td><td>".$f["ve"]."</td><td>".$f["origine"]."</td></tr>";
echo"<tr><td>".$f["nom"]."</td><td>".$f["prix"]."</td><td>".$f["ve"]."</td><td>".$f["origine"]."</td></tr>";
    }
   echo"</tbody>";
 echo"</table>";
    ?>
 </table>
</body>
</html>