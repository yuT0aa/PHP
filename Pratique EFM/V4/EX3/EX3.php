<!--
Écrire un script PHP qui lit le contenu du fichier notes.txt et affiche uniquement les lignes contenant le mot "admis".
Si le fichier n'existe pas, afficher "Fichier introuvable".
-->
<?php
$fichier = 'notes.txt';

// Vérifier si le fichier existe
if (!file_exists($fichier)) {
    echo "Fichier introuvable";
    exit;
}

// Ouvrir le fichier en mode lecture
$handle = fopen($fichier, 'r');

if ($handle) {
    // Lire ligne par ligne
    while (($ligne = fgets($handle)) !== false) {
        // Vérifier si la ligne contient "admis" (insensible à la casse si besoin)
        if (stripos($ligne, 'admis') !== false) {
            echo $ligne;
        }
    }
    fclose($handle);
} else {
    echo "Impossible d'ouvrir le fichier.";
}
?>
