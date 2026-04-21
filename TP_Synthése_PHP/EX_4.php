<!--Contexte
$produits = [
"PC" => 1200,
"Souris" => 25,
"Clavier" => 45,
"Écran" => 300
];
Travail demandé
• Afficher tous les produits et prix
• Calculer le total avec foreach
• Afficher uniquement les produits > 100
• Compter les produits chers
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logique métier avec foreach</title>
</head>
<body>
    <?php
    $produits=[
        "PC"=>1200,
        "Souris"=>25,
        "Clavier"=>45,
        "Écran"=>300
    ];
    $total=0;
    foreach($produits as $key=>$value){
        echo $key." : ".$value."<br/>";
    }
    $produitsfiltr=array_filter($produits,function($value,$key){
        return $value>100;
    },ARRAY_FILTER_USE_BOTH);


    print_r($produitsfiltr);
    echo"<br/>";
    ?>

</body>
</html>