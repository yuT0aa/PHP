<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
      $fname=$_POST["fname"]??"";
      $email=$_POST["email"]??"";
      $age=$_POST["age"]??0;
      $url=$_POST["url"]??"";
      /*
      if(!empty($_POST["fname"])){
      $fname=$_POST["fname"];
      }
      else{
        $fname="";
        }
      */
      $errors=[];
      if(empty($fname)){
        $errors[]="le prénom est obligatoire !!!!";
      }else if(!preg_match("/^[A-Z][a-z]{3,}$/",$fname)){
        $errors[]="le prénom est invalide !!!!";
      }
       if(empty($email)){
        $errors[]="l'email est obligatoire !!!!";
      }else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors[]="l'email est invalide !!!!";
      }
    if(empty($url)){
        $errors[]="l'email est obligatoire !!!!";
      }else if(!filter_var($url,FILTER_VALIDATE_URL)){
        $errors[]="l'url est invalide !!!!";
      }
   if(empty($age)){
        $errors[]="l'age est obligatoire !!!!";
      }else if(!filter_var($age,FILTER_VALIDATE_INT)){
        $errors[]="l'age doit être numérique !!!!";
      }else if($age<18 || $age>70){
         $errors[]="l'age doit être entre 18 et 70 !!!!";
      }
    }
        ?>
</head>
<body>
    <?php
  if(!empty($errors)){
        echo"<ul>";
        foreach($errors as $e){
            echo"<li>$e</li>";
        }
     echo"</ul>";
     }
?>
    <form action="" method="POST">
      Nom: <input type="text" name="fname"><br><br>
      Email : <input type="text" name="email"><br><br>
      age : <input type="number" name="age"><br><br>
      site Web <input type="text" name="url"><br><br>
   <button type="submit">Enpyer</button>
    </form>
</body>
</html>