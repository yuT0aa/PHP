<?php
    require('config.php');
    $sql="select * from immobilier";
    $res=$cnx->query($sql);
    $immobiliers=$res->fetchAll(PDO::Fetch_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h2>Liste des immobilier</h2>
        <div class="d-flex justify-content-end">
            <a href="ajouter.php" class="btn btn-sm btn-primary">Add New</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>id</th>
                    <th>titre</th>
                    <th>adresse</th>
                    <th>prix location</th>
                    <th>type</th>
                    <th>disponibilite</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($immobiliers as $I):?>
                    <tr>
                        <td><?=$I['id']?></td>
                        <td><?=$I['titre']?></td>
                        <td><?=$I['adresse']?></td>
                        <td><?=$I['prix_location']?></td>
                        <td><?=$I['type']?></td>
                        <td><?=$I['disponibilite']?></td>
                        <td><a href="delete.php?id=<?=$I['id']?>" class="btn btn-sm btn-danger">Delete</a></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</body>
</html>