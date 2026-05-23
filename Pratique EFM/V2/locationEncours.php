<?php
    session_start();
    if(!isset($_SESSION['auth'])){
        header("location:connexion.php");
    }else{
        $user=$_SESSION['auth'];
    }
    
    $id_user=$_SESSION['id_client']??'';
    $date_aujourdhui=date("Y-m-d");
    $sql="select * from location where id_user=? and date_fin>=?";
    require('config.php');
    $stmt=$cnx->prepare($sql);
    $stmt->execute([$id_user,$date_aujourdhui]);
    $locations_en_cours=$stmt->fetchAll(PDO::FETCH_ASSOC);
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
        <h2>Liste des locations en cours</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>id</th>
                    <th>date debut</th>
                    <th>date fin</th>
                    <th>id_user</th>
                    <th>id_immobilier</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($locations_en_cours as $L):?>
                    <tr>
                        <td><?=$L['id']?></td>
                        <td><?=$L['date_debut']?></td>
                        <td><?=$L['date_fin']?></td>
                        <td><?=$L['id_user']?></td>
                        <td><?=$L['id_immobilier']?></td>
                     </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</body>
</html>