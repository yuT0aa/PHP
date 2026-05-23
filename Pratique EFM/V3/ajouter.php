<?php  
    require("db.php");
    $req="select * from typeh";
    $stm=$cnx->prepare($req);
    $stm->execute();
    $types=$stm->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_POST["send"])){
        $titre=$_POST["titre"]??"";
        $adresse=$_POST["adresse"]??"";
        $typeH=$_POST["typeH"]??"";
        $prixNuit=$_POST["prixNuit"]??"";
        $nbrPlaces=$_POST["nbrPlaces"]??"";
        $error="";

    if(!empty($titre) && !empty($adresse) && !empty($typeH) && !empty($prixNuit) && !empty($nbrPlaces)){
        $req="insert into hotel values(null,?,?,?,?,?)";
        $stm=$cnx->prepare($req);
        $stm->execute([$titre,$adresse,$prixNuit,$nbrPlaces,$typeH]);
        $error="";
    
    header('Location:ListeH.php');
    }else{
        $error="Tout les champs sont requis !!!!";
    }
    }
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
    <div class="container mt-3">
        <h2>Ajouter un nouvel hôtel</h2>
        <?php  
          if(!empty($error)){?>
           <div class="alert alert-danger"> <?= $error;?></div>
          <?php }?>
        <form action="" method="POST">
           <div class="mb-3">

             <label for="">Titre</label>
             <input type="text" name="titre" class="form-control">
           </div>
         <div class="mb-3">

             <label for="">Type Hôtel</label>
             <select name="typeH" id="" class="form-select">
               <?php  foreach($types as $t):?>
                <option value="<?= $t['id'];?>"><?= $t['nbrEtoile'];?></option>
              <?php endforeach;?>
             </select>
            
           </div>
        <div class="mb-3">

             <label for="">prix Nuit</label>
             <input type="number" step="0.01" name="prixNuit" class="form-control">
           </div>
       <div class="mb-3">

             <label for="">Nombre Places</label>
             <input type="number"  name="nbrPlaces" class="form-control">
           </div>
          <div class="mb-3">

             <label for="">Adresse</label>
            <textarea name="adresse" id="" class="form-control"></textarea>
           </div>
           <div class="mb-3">

             
            <button type="submit" class="btn btn-primary" name="send">Envoyer</button>
        <a href="ListeH.php" class="btn  btn-secondary">Back</a>
        </div>
        </form>
    </div>
</body>
</html>