<!--Objectif
Créer une mini application de gestion de produits
Fonctionnalités
• Ajouter un produit (nom + prix+ catégorie + image )
• Afficher la liste des produits
• Supprimer un produit
• Calculer le total du stock
Contraintes
• Utiliser $_POST
• Utiliser foreach
• Utiliser array_reduce() pour le total
• Valider les entrées
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini application</title>
</head>
<body>
    <?php
    $produits=[];
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $nom=$_POST['nom'];
        $prix=$_POST['prix'];
        $categorie=$_POST['categorie'];
        $image=$_POST['image']; 
        if(!empty($nom) && is_numeric($prix) && $prix>0 && !empty($categorie) && !empty($image)){
            $produits[]= [
                'nom'=>$nom,
                'prix'=>$prix,
                'categorie'=>$categorie,
                'image'=>$image
            ];
        }
    }
    ?>
    <h2>Ajouter un produit:</h2>
    <form method="post">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" required/><br/>
        <label for="prix">Prix:</label>
        <input type="text" name="prix" id="prix" required/><br/>
        <label for="categorie">Catégorie:</label>   
        <input type="text" name="categorie" id="categorie" required/><br/>
        <label for="image">Image URL:</label>
        <input type="text" name="image" id="image" required/><br/>
        <button type="submit">Ajouter</button>
    </form>
    <h2>Liste des produits:</h2>
    <ul>
        <?php foreach($produits as $index=>$produit): ?>
            <li>
                <img src="<?php echo htmlspecialchars($produit['image']); ?>" alt="<?php echo htmlspecialchars($produit['nom']); ?>" width="100"/><br/>
                <?php echo htmlspecialchars($produit['nom']); ?> - <?php echo htmlspecialchars($produit['prix']); ?>€ - <?php echo htmlspecialchars($produit['categorie']); ?>
                <form method="post" style="display:inline;">
                    <input type="hidden" name="delete_index" value="<?php echo $index; ?>"/>
                    <button type="submit">Supprimer</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php
    if(isset($_POST['delete_index'])){
        $index=$_POST['delete_index'];
        if(isset($produits[$index])){
            unset($produits[$index]);
            $produits=array_values($produits);
        }
    }
    if(count($produits)>0){
        $total=array_reduce($produits,function($acc,$produit){
            return $acc+$produit['prix'];
        },0);
        echo "<p>Total du stock: ".$total."€</p>";
    }
    ?>
</body>
</html>