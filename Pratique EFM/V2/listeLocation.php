<?php
    require('config.php');
    $req="select * from type";
    $stmt=$cnx->query($req);
    $stmt->execute();
    $types=$stmt->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET["id"])){
        $selected_id=$_GET["id"];
        $req="select * from immobilier where id=?";
        $stmt=$cnx->prepare($req);
        $stmt->execute([$selected_id]);
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <div class="container mt-3">
        <h2>Modifier un immobilier</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="">Titre</label>
                <input type="text" name="titre" class="form-control" value="<?=$data[0]['titre']?>">
            </div>
            <div class="form-group">
                <label for="">Adresse</label>
                <input type="text" name="adresse" class="form-control" value="<?=$data[0]['adresse']?>">
            </div>
            <div class="form-group">
                <label for="">Prix location</label>
                <input type="number" name="prix_location" class="form-control" value="<?=$data[0]['prix_location']?>">
            </div>
            <div class="form-group">
                <label for="">Type</label>
                <select name="type" class="form-control">
                    <?php foreach($types as $T):?>
                        <option value="<?=$T['id']?>" <?php if($T['id']==$data[0]['type']){echo "selected";}?>>
                            <?=$T['libelle']?>
                        </option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Disponibilite</label>
                <input type="text" name="disponibilite" class="form-control" value="<?=$data[0]['disponibilite']?>">
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
</body>
</html>