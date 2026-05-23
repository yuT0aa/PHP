<?php 
    require('db.php');
    $sql="select * from hotel";
    $res=$cnx->query($sql);
    $hotels=$res->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php  
include("navbar.php");
?>
    <div class="container">
        <h2>Liste des hôtels</h2>
        <div class="d-flex justify-content-end">
            <a href="ajouter.php" class="btn btn-sm btn-primary">Add New</a>
        </div>
        <table class="table table-striped">
            <thead><tr><th>#</th><th>Titre</th><th>Adresse</th><th>Prix Nuit</th><th>Actions</th></tr></thead>
            <tbody>
            <?php foreach($hotels as $h):   ?>
                <tr><td><?= $h['idHotel']; ?></td><td><?= $h['titre']; ?></td><td><?= $h['adresse']; ?></td><td><?= $h['prixNuit']; ?></td><td><a class="btn btn-sm btn-danger" href="delete.php?idH=<?= $h['idHotel'];?>">delete</a></td></tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>