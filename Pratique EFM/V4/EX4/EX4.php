<!--
1. Créer un cookie nommé "theme" ayant la valeur "sombre" et expirant après 7 jours. 
2. Si le cookie existe afficher "Thème actuel : sombre", sinon afficher "Aucun thème sélectionné". 
-->
<?php
// 1. Créer un cookie nommé "theme" ayant la valeur "sombre" et expirant après 7 jours.
if (!isset($_COOKIE['theme'])) {
    setcookie("theme", "sombre", time() + (7 * 24 * 60 * 60)); // Expire après 7 jours
}

// 2. Vérifier si le cookie existe
if (isset($_COOKIE['theme'])) {
    echo "Thème actuel : " . $_COOKIE['theme'];
} else {
    echo "Aucun thème sélectionné";
}
?>