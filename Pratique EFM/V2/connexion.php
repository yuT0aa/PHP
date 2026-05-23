<?php
    require('config.php');
    if(isset($_POST["send"])){
        $login=$_POST["login"]??'';
        $password=$_POST["password"]??'';
    $req="select * from user where login=? and password=?";
    $stmt=$cnx->prepare($req);
    $stmt->execute([$login,$password]);
    $user=$stmt->fetch(PDO::FETCH_ASSOC);
    session_start();
    $_SESSION['auth']=$user;
    if($user){
        header("location:listerC.php");
    }else{
        $error="login ou mot de passe incorrect";
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
    <div class="container">
        <h2>Login</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="">Login</label>
                <input type="text" name="login" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <button type="submit" name="send" class="btn btn-sm btn-primary">Login</button>
        </form>
    </div>
</body>
</html>