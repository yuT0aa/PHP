<!--Contexte
Panier d’achat :
$prix = [120, 45, 30, 75, 200];
Travail demandé
• Calculer le total avec array_reduce()
• Trouver le prix maximum
• Calculer la moyenne des prix
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculs avec réduction</title>
</head>
<body>
    <?php
    $prix=[120,45,30,75,200];
    $total=array_reduce($prix,function($acc,$prix){
        return $acc+$prix;
    },0);
    echo "Total: ".$total."<br/>";
    $maxPrix=array_reduce($prix,function($max,$prix){
        return max($max,$prix);
    },0);
    echo "Prix maximum: ".$maxPrix."<br/>";
    $moyenne=$total/count($prix);
    echo "Moyenne des prix: ".$moyenne."<br/>";
    ?>    
</body>
</html>