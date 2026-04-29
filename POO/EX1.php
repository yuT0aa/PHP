<?php /* 

1.Crée une classe Produit avec les attributs privés
	  nom 
     prix 
2.Définir la méthode afficherProduit()
3.Ajoute une méthode :calculerTVA() (ex: prix * 0.2) Rend prix privé
4. Ajouter deux constructeurs : par défaut et d'initialisation
5.définir la méthoes toString 
6. Créer un tableau produits
7. ajouter dans le tableau produits 6 instances de type Produit 
    3 instances crées en utilisant le constructeur par défaut 
    3 instances en utilisant le constructeur d'initialisation
8 . afficher la liste des produits dans une table HTML : avec les boutons d'actions : edit , delete et show


*/
?> 



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        class Produit{
            private $nom;
            private $prix;
            public function __construct($nom="",$prix=0){
                $this->nom=$nom;
                $this->prix=$prix;
            }

            public function afficherProduit($this){
                echo "Nom:". $this->nom.","."Prix:". $this->prix;
            }
            public function calculerTVA($prix){
                return $prix*0.2;
            }
            public function __toString(){
                return "Nom:". $this->nom.","."Prix:". $this->prix;
            }

        }
    ?>
    
</body>
</html>