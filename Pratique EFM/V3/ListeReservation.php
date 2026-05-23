<?php 
require("db.php");
$req="select * from typeh";
$stm=$cnx->prepare($req);
$stm->execute();
$types=$stm->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET["typeH"])){
  $selectedType=$_GET["typeH"];
  $req="select r.* from reservation r inner join hotel h on r.idH=h.idHotel where h.idType=?";
  $stm=$cnx->prepare($req);
  $stm->execute([$selectedType]);
  $data=$stm->fetchAll(PDO::FETCH_ASSOC);
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
    <?php  
        include("navbar.php");
    ?>
    <div class="container">
        <h2>Liste des Réservations</h2> 
        <form action="" class="mb-3">

            <div class="mb-3">
            <label for="">Type Hôtel</label>
            <select name="typeH" id="" class="form-select">
                <?php  foreach($types as $t):?>
                        <option value="<?= $t['id'];?>"><?= $t['nbrEtoile'];?></option>
                    <?php endforeach;?>
            </select>
            </div>
            <button type="submit" class="btn btn-info">Rechercher</button>
        </form>
        <?php if(!empty($data)): ?>
        <table class="table table-striped">
            <thead><tr><th>#</th><th>idClt</th><th>date Debut</th><th>Date Fin</th></tr></thead>
            <tbody>
            <?php foreach($data as $h):   ?>
                <tr><td><?= $h['id']; ?></td><td><?= $h['idClt']; ?></td><td><?= $h['dateDebut']; ?></td><td><?= $h['dateFin']; ?></td></tr>
            <?php endforeach;?>

            </tbody>
        </table>
        <?php endif;?>
    </div>
    </body>
    </html>