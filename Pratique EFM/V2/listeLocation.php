<?php
    require('config.php');

    $sql = "SELECT l.id_location, i.id_immobilier, i.titre, i.adresse, i.prixlocation, i.id_type, i.disponible, l.date_debut_location, l.date_fin_location 
            FROM location l
            JOIN immobilier i ON l.id_immobilier = i.id_immobilier";
    $date_debut=$_POST['date_debut']??'';
    $date_fin=$_POST['date_fin']??'';

    if(!empty($date_debut)&&!empty($date_fin)){
        $sql.=" where date_debut>=? and date_fin<=?";
        $stmt=$cnx->prepare($sql);
        $stmt->execute([$date_debut,$date_fin]);
    }else{
        $stmt=$cnx->query($sql);   
    }
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
        <h2>Rechercher des locations entre deux dates</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="">Date debut</label>
                <input type="date" name="date_debut" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Date fin</label>
                <input type="date" name="date_fin" class="form-control">
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Search</button>
        </form>
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
                <?php foreach($stmt->fetchAll(PDO::Fetch_ASSOC) as $I):?>
                    <tr>
                        <td><?=$I['id']?></td>
                        <td><?=$I['titre']?></td>
                        <td><?=$I['adresse']?></td>
                         <td><?=$I['prix_location']?></td>
                         <td><?=$I['type']?></td>
                         <td><?=$I['disponibilite']?></td>
                     </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</body>
</html>