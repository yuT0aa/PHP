<?php  
    require("db.php");
    session_start();
    echo "<ul>";
    echo "<li> ".$_SESSION["auth"]["cin"]."</li>";
    echo "<li> ".$_SESSION["auth"]["nom"]."</li>";
    echo "</ul>";

    require("db.php");
    $cd=date("Y-m-d");

    $req="select r.* from reservation r inner join client c on r.idClt=c.id where dateFin>=?";
    $stm=$cnx->prepare($req);
    $stm->execute([$cd]);
    $reservations=$stm->fetchAll(PDO::FETCH_ASSOC);
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
        <h2>Liste des reservations En Cours</h2>
        <table class="table table-striped">
            <thead><tr><th>#</th><th>idH</th><th>idClt</th><th>date début</th><th>date fin</th></tr></thead>
            <tbody>
            <?php foreach($reservations as $h):   ?>
                <tr><td><?= $h['id']; ?></td><td><?= $h['idH']; ?></td><td><?= $h['idClt']; ?></td><td><?= $h['dateDebut']; ?></td><td><?= $h['dateFin'];?></td></tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</body>
</html>