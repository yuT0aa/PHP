<?php  
    require("db.php");
    if(isset($_POST["send"])){
        $login=$_POST["login"]??"";
        $pwd=$_POST["pwd"]??"";
    $req="select * from client where login=? and pwd=?";
    $stm=$cnx->prepare($req);
    $stm->execute([$login,$pwd]);
    $user=$stm->fetch();
    session_start();
    $_SESSION["auth"]=$user;
    header("Location:reservEnCours.php");
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
    <div class="container">
        <h2>Se Connecter</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="">Login</label>
                <input type="text" name="login" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">mot de passe</label>
                <input type="password" name="pwd" class="form-control">
            </div>
            <button type="submit" name="send" class="btn btn-primary">Se connecter</button>
        </form>
    </div>
</body>
</html>