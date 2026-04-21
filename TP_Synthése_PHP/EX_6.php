<!--Objectif
Créer un mini système de gestion de notes
Travail demandé
• Ajouter des notes via un formulaire
• Stocker les notes dans un tableau PHP
• Afficher toutes les notes
• Calculer la moyenne avec array_reduce()
• Afficher les étudiants admis avec array_filter()
• Empêcher les notes invalides (0 à 20)
• Colorer les résultats (admis / non admis)
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini système de gestion de notes</title>
</head>
<body>
    <?php
    $notes=[];
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $note=$_POST['note'];   
        if(is_numeric($note) && $note>=0 && $note<=20){
            $notes[]=$note;
        }else{
            echo "<p style='color:red;'>Note invalide. Veuillez entrer une note entre 0 et 20.</p>";
        }
    }
    ?>
    <form method="post">
        <label for="note">Ajouter une note (0-20):</label>
        <input type="text" name="note" id="note"/>
        <button type="submit">Ajouter</button>
    </form>
    <h2>Notes ajoutées:</h2>
    <ul>
        <?php foreach($notes as $note): ?>
            <li style="color:<?php echo $note>=10 ? 'green' : 'red'; ?>">
                <?php echo $note; ?> - <?php echo $note>=10 ? 'Admis' : 'Non admis'; ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php
    if(count($notes)>0){
        $total=array_reduce($notes,function($acc,$note){
            return $acc+$note;
        },0);
        $moyenne=$total/count($notes);
        echo "<p>Moyenne: ".$moyenne."</p>";
        $admis=array_filter($notes,function($note){
            return $note>=10;
        });
        echo "<h3>Étudiants admis:</h3><ul>";
        foreach($admis as $note){
            echo "<li>".$note."</li>";
        }
        echo "</ul>";
    }
    ?>
</body>
</html>