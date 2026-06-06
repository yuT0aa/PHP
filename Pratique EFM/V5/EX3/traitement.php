<?php
// 1. Recevoir la valeur (1 pt)
$t1 = $_POST['t1'] ?? '';

// 2. Vérifier si elle est saisie et numérique (1 pt)
if ($t1 !== '' && is_numeric($t1)) {
    $n = (int)$t1;
    $produit = 1;
    $liste_impairs = [];

    // 3. Calculer le produit des valeurs impaires inférieures au nombre perçu (2 pts)
    for ($i = 1; $i < $n; $i += 2) {
        $produit *= $i;
        $liste_impairs[] = $i;
    }

    // 4. Affichage du résultat (1 pt)
    if (!empty($liste_impairs)) {
        echo implode(' * ', $liste_impairs) . ' = ' . $produit;
    } else {
        echo "Aucun nombre impair inférieur à $n.";
    }
} else {
    echo "Veuillez saisir un entier valide.";
}
?>