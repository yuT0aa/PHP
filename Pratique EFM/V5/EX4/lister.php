<?php
    session_start();
    require_once("db.php");

    $sql="SELECT * FROM Professeur";
    $res=$cnx->query($sql);
    $pro=$res->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listes de Professeurs</title>
</head>
<body>
    <h2>Liste des Professeurs</h2>
    <table>
        <thead>
            <tr>
                <th>code_Pro</th>
                <th>Nom_Pro</th>
                <th>Status_Pro</th>
                <th>Adresse_Pro</th>
                <th>Date_Naissance</th>
                <th>salaire</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($pro as $p){?>
                <tr>
                    <td><?php echo $p['code_Pro']; ?></td>
                    <td><?php echo $p['Nom_Pro']; ?></td>
                    <td><?php echo $p['Status_Pro']; ?></td>
                    <td><?php echo $p['Adresse_Pro']; ?></td>
                    <td><?php echo $p['Date_Naissance']; ?></td>
                    <td><?php echo $p['salaire']; ?></td>
                </tr>
            <?php }?> 
        </tbody>
    </table>
</body>
</html>