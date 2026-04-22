<!--créer un formulaire avec les champs : 
input text pour  le nom de l'étudiant (obligatoire et doit contenir que des majuscules et espace)
select pour choisir le module (M101 , M102,M103...)
input number pour saisir la note (obligatoire  , valide si note entre 0 et 20)
deux radios : R et NR
input type submit 
Aprés clic sur submit : 
vérifier si les valeurs sont valides
ajouter le nouvel éléments dans un tableau notes
afficher le tableau notes dans une table html ( après le nom du module afficher un badge contenant R (en vert) ou NR(en jaune) 
veux devez travailler la question c de deux façon  différentes : avec array_map et avec foreach 
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    ?>
    <form method="post">
        <label for="name">Nom de l'étudiant:</label>
        <input type="text" name="name" id="name" required/><br/>

        <label for="module">Module:</label>
        <select name="module" id="module">
            <option value="M101">M101</option>
            <option value="M102">M102</option>
            <option value="M103">M103</option>
        </select><br/>

        <label for="note">Note:</label>
        <input type="number" name="note" id="note" required/><br/>

        <label>Résultat:</label>
        <input type="radio" name="result" value="R" id="R"/>

        <label for="R">R</label>
        <input type="radio" name="result" value="NR" id="NR"/>

        <label for="NR">NR</label><br/>

        <button type="submit">Ajouter</button>
    </form>
</body>
</html>