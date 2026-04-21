<!--Contexte
Liste de produits :
$produits = ["pc", "telephone", "tablette", "clavier"];
Travail demandé
• Mettre tous les mots en majuscules avec array_map()
• Ajouter le préfixe "PROD_" à chaque élément
• Calculer la longueur de chaque mot-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transformation de données</title>
</head>
<body>
    <?php
    $produits=["pc","telephone","tablette","clavier"];
    $produitsMaj=array_map('strtoupper',$produits);
    print_r($produitsMaj);
    echo"<br/>";
    $produitsPrefix=array_map(function($produits){
        return "PROD_".$produits;
    },$produits);
    print_r($produitsPrefix);
    echo"<br/>";
    $longueurs=array_map('strlen',$produits);
    print_r($longueurs);
    ?>
</body>
</html>