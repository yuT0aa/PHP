<?php
    session_start();
    require 'db.php';

    if(!isset($_SESSION['idStagiaire'])){
        header("Location:connexion.php");
        exit();
    }

    $idStagiaire=$_SESSION['idStagiaire'];
    $heure=date('H');
    $Salutation=($heure>=18)?"Bonsoir":"Bonjour";

    $sql="SELECT f.titre, i.dateInscription FROM inscriptions i JOIN formations f ON i.idFormation=f.idFormation WHERE i.idStagiaire=:idStagiaire";
    $stmt=$pdo->prepare($sql);
    $stmt->execute(['idStagiaire'=>$idStagiaire]);
    $inscriptions=$stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Mes inscriptions</h2>
<table border="1">
    <tr><th>ID</th><th>Date</th><th>Formation</th><th>Durée</th><th>Prix</th><th>Action</th></tr>
    <?php foreach ($inscriptions as $i): ?>
    <tr>
        <td><?= $i['idInscription'] ?></td>
        <td><?= $i['dateInscription'] ?></td>
        <td><?= htmlspecialchars($i['titre']) ?></td>
        <td><?= $i['duree'] ?>h</td>
        <td><?= $i['prix'] ?> €</td>
        <td>
            <a href="annuler.php?id=<?= $i['idInscription'] ?>" onclick="return confirm('Confirmer l\'annulation ?')">Annuler</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<a href="nouvelleInscription.php">Nouvelle inscription</a> | <a href="deconnexion.php">Déconnexion</a>
</body>
</html>