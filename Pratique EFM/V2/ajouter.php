<?php
    require('config.php');
    $req="select * from immobilier";
    $stmt=$cnx->query($req);
    $stmt->execute();
    $immobiliers=$stmt->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_POST["send"])){
        $titre=$_POST["titre"];
        $adresse=$_POST["adresse"];
        $prix_location=$_POST["prix_location"];
        $type=$_POST["type"];
        $disponnibilite=$_POST["disponibilite"];
        $error=[];
        if(!empty($titre)&&!empty($adresse)&&!empty($prix_location)&&!empty($type)&&!empty($disponnibilite)){
            $req="insert into immonilier(null,?,?,?,?,?,?)";
            $stmt=$cnx->prepare($req);
            $stmt->execute([$titre,$adresse,$prix_location,$type,$disponnibilite]);
            $error="";

            header('location:listerC.php');
        }else{
            $error="tous les champs sont requis";
        }
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
        <h2>Ajouter un nouveau immobilier</h2>
        <?php
            if(!empty($error)){?>
                <div class="alert alert-danger"><?=$error;?></div>
            <?php } ?>
        <form method="post" action="">
            <div class="form-group">
                <label for="">Titre</label>
                <input type="text" name="titre" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Adresse</label>
                <input type="text" name="adresse" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="">Prix location</label>
                <input type="number" name="prix_location" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="">Type</label>
                <input type="text" name="type" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="">Disponibilité</label>
                <input type="text" name="disponnibilite" class="form-control">
            </div>
            
            <button type="submit" name="send" class="btn btn-primary">Ajouter</button>
            <a href="listerC.php" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
    
</body>
</html>