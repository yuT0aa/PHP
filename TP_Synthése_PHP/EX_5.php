<!--Objectif
Créer un formulaire avec :
• Nom
• Email
• Âge
• Mot de passe
Travail demandé
• Vérifier que tous les champs sont remplis
• Valider email avec filter_var()
• Vérifier âge entre 18 et 60
• Mot de passe : min 8 caractères + chiffre + majuscule
• Afficher les erreurs champ par champ
• Conserver les valeurs après soumission
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d’inscription sécurisé</title>
</head>
<body>
    <?php
    $errors=[];
    $name=$email=$age=$password="";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $name=trim($_POST["name"]);
        $email=trim($_POST["email"]);
        $age=trim($_POST["age"]);
        $password=trim($_POST["password"]);
    }
    if(empty($name)){
        $errors["name"]="Le nom est requis.";
    }
    if(empty($email)){
        $errors["email"]="L’email est requis.";
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors["email"]="L’email n’est pas valide.";
    }
    if(empty($age)){
        $errors["age"]="L’âge est requis.";
    }elseif(!is_numeric($age) || $age<18 || $age>60){
        $errors["age"]="L’âge doit être un nombre entre 18 et 60.";
    }
    if(empty($password)){
        $errors["password"]="Le mot de passe est requis.";
    }elseif(strlen($password)<8 || !preg_match("/[A-Z]/",$password) || !preg_match("/[0-9]/",$password)){
        $errors["password"]="Le mot de passe doit comporter au moins 8 caractères, une majuscule et un chiffre.";
    }
    ?>
<form action="">
    <label for="name">Nom:</label>
    <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name);?>"/>
    <?php if(isset($errors["name"])) echo "<span>".$errors["name"]."</span>";?>
    <br/>
    <label for="email">Email:</label>
    <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($email);?>"/>
    <?php if(isset($errors["email"])) echo "<span>".$errors["email"]."</span>";?>
    <br/>
    <label for="age">Âge:</label>
    <input type="text" name="age" id="age" value="<?php echo htmlspecialchars($age);?>"/>
    <?php if(isset($errors["age"])) echo "<span>".$errors["age"]."</span>";?>
    <br/>
    <label for="password">Mot de passe:</label>
    <input type="password" name="password" id="password"/>
    <?php if(isset($errors["password"])) echo "<span>".$errors["password"]."</span>";?>
    <br/>
    <input type="submit" value="S’inscrire"/>
</form>
</body>
</html>