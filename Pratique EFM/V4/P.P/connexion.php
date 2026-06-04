<?php
    session_start();
    include "db.php";

    $erreurs='';

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $login=$_POST["login"];
        $password=$_POST["password"];

        $stmt=$pdo->prepare("SELECT * FROM users WHERE login=:login");
        $stmt->execute(['login'=>$login]);
        $user=$stmt->fetch();

        if($user && password_verify($password,$user['password'])){
            $_SESSION['idStagiaire']=$user['idStagiaire'];
            $_SESSION['nom']=$user['nom'];
            $_SESSION['prenom']=$user['prenom'];
            header("Location: mesInscriptions.php");
            exit();
        }else{
            $erreurs="Login ou mot de passe incorrect.";
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
    <form method="post">
        <input type="text" name="login" placeholder="Login" required>
        <input type="password" name="motpasse" placeholder="Mot de passe" required>
        <button type="submit">Se connecter</button>
        <?php if($erreur): ?><p style="color:red"><?= $erreur ?></p><?php endif; ?>
</form>
</body>
</html>