<!--
validation form :
input:text pour nom => required et de format valide 'au moins 4 caratéres majuscules'=>utiliser preg_match 
input :email pour email =>required et de format valide ' => fiter_var
input : url pour url=>required et de format valide ' => fiter_var
input : number pour age =>required et de format valide ' => fiter_var
un select single pour la ville (required)
un  select multiple pour les langues =>au moins un choix
deux input:radio => pour la gente =>required
un groupe de checkbox => les skills => au moins un choix
un textarea pour l'adresse détaillée 
=======================================
les erreurs doivent être enregistrées dans un tableaux $errors
        en cliquant sur submit : 
si tout va bien => rediriger l'utilisateur vers une nouvelle db.php et afficher les données
sinon afficher les messages d'erreur dans span/div en dessous de chaque input 
NB. il est recommandé d'utiliser les données pour garder les données , et pouvoir y accéder de n'importe qu'elle page de l'application
-->

<?php
    session_start();
    $errors=array();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $nom=trim($_POST['nom'])??'';
        $email=trim($_POST['email'])??'';
        $url=trim($_POST['url'])??'';
        $age=trim($_POST['age'])??0;
        $langue=$_POST['langue']??[];
        $ville=($_POST['ville'])??'';
        $genre=($_POST['genre'])??'';
        $skills=$_POST['skills']??[];
        $adresse=trim($_POST['adresse'])??'';

        if(empty($nom)){
            $errors['nom']='le nom est obligatoire';
        }elseif(!preg_match('/^[A-Z]{4,}$/',$nom)){
            $errors['nom']='le nom doit contenir au moins 4 caracteres majuscules';
        }
    

        if(empty($email)){
            $errors['email']='l\'email est obligatoire';
        }elseif(!filtrer_var($email,FILTRER_VALIDATE_EMAIL)){
            $errors['email']='l\'email n\'est pas valide';
        }
        
        if(empty($url)){
            $errors['url']='l\'url est obligatoire';
        }elseif(!filtrer_var($url,FILRER_VALIDATE_URL)){
            $errors['url']='l\'url n\'est pas valide';
        }
        
        if(empty($age)){
            $errors['age']='l\'age est obligatoire';
        }elseif(!filtrer_var($age,FILTRER_VALIDATE_INT)){
            $errors['age']='l\'age doit etre un nombre entier';
        }

        if(empty($ville)){
            $errors['ville']='la ville est obligatoire';
        }elseif(!in_array($ville,['Agadir','Rabat','Casablanca'])){
            $errors['ville']='la ville doit etre Agadir,Rabat ou Casablanca';
        }

        if(empty($langue)){
            $errors['langue']='la langue est obligatoire';
        }elseif(!in_array($langue,['Arabe','Français','Anglais'])){
            $errors['langue']='la langue doit etre Arabe,Français ou Anglais';
        }

        if(empty($genre)){
            $errors['genre']='le genre est obligatoire';
        }elseif(!in_array($genre,['Homme','Femme'])){
            $errors['genre']='le genre doit etre Homme ou Femme';
        }

        if(empty($skills)){
            $errors['skills']='les skills sont obligatoires';
        }elseif(!in_array($skills,['HTML','CSS','JavaScript'])){
            $errors['skills']='les skills doivent etre HTML,CSS ou JavaScript';
        }

        if(empty($adresse)){
            $errors['adresse']='l`adresse est obligatoire';
        }

    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <form action="" method="post">
        <div class="form-group p-5">
            <h2>Formulaire de validation</h2>

            <label class="form-label" for="nom">Nom:</label><br>
            <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($nom) ?>" class="form-control" required><br>
            <span id="erreur-nom"></span><br>
            <?php
                if(isset($errors['nom'])){
                    echo '<span style="color:red;">'.$errors['nom'].'</span>';
                }
            ?>

            <label class="form-label" for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>" class="form-control" required><br>
            <span id="erreur-email"></span><br>
            <?php
                if(isset($errors['email'])){
                    echo '<span style="color:red;">'.$errors['email'].'</span>';
                }
            ?>

            <label class="form-label" for="url">URL:</label><br>
            <input type="url" id="url" name="url" value="<?= htmlspecialchars($url) ?>" class="form-control" required><br>
            <span id="erreur-url"></span><br>
            <?php
                if(isset($errors['url'])){
                    echo '<span style="color:red;">'.$errors['url'].'</span>';
                }
            ?>

            <label class="form-label" for="age">Age:</label><br>
            <input type="number" id="age" name="age" value="<?= htmlspecialchars($age) ?>" class="form-control" required><br>
            <span id="erreur-age"></span><br>
            <?php
                if(isset($errors['age'])){
                    echo '<span style="color:red;">'.$errors['age'].'</span>';
                }
            ?>

            <label class="form-label" for="ville">Ville:</label><br>
            <select id="ville" name="ville" class="form-control" required>
                <option value="">Choisir une Ville</option>
                <option value="agadir" <?= isset($ville) && $ville === 'Agadir' ? 'selected' : '' ?>>Agadir</option>
                <option value="rabat" <?= isset($ville) && $ville === 'Rabat' ? 'selected' : '' ?>>Rabat</option>
                <option value="casablanca" <?= isset($ville) && $ville === 'Casablanca' ? 'selected' : '' ?>>Casablanca</option>
            </select><br>
            <span id="erreur-ville"></span><br>
            <?php
                if(isset($errors['ville'])){
                    echo '<span style="color:red;">'.$errors['ville'].'</span>';
                }
            ?>

            <label class="form-label" for="langue">Langue:</label><br>
            <select name="langue[]" id="langue" class="form-control" multiple required>
                <option value="arabe" <?= isset($langue) && $langue === 'Arabe' ? 'selected' : '' ?>>Arabe</option>
                <option value="francais" <?= isset($langue) && $langue === 'Français' ? 'selected' : '' ?>>Français</option>
                <option value="anglais" <?= isset($langue) && $langue === 'Anglais' ? 'selected' : '' ?>>Anglais</option>
            </select><br>
            <span id="erreur-langue"></span><br>
            <?php
                if(isset($errors['langue'])){
                    echo '<span style="color:red;">'.$errors['langue'].'</span>';
                }
            ?>

            <label class="form-label" for="genre">Genre:</label><br>
                <input type="radio" id="homme" name="genre" value="Homme" class="form-check-input" required>
                <label class="form-check-label" for="homme">Homme</label><br>
                <input type="radio" id="femme" name="genre" value="Femme" class="form-check-input" required>
                <label class="form-check-label" for="femme">Femme</label><br>
                <span id="erreur-genre"></span><br>
            <?php
                if(isset($errors['genre'])){
                    echo '<span style="color:red;">'.$errors['genre'].'</span>';
                }
            ?>

            <label class="form-label" for="skills">Skills:</label><br>
                <input type="checkbox" id="html" name="skills[]" value="HTML" class="form-check-input">
                <label class="form-check-label" for="html">HTML</label><br>
                <input type="checkbox" id="css" name="skills[]" value="CSS" class="form-check-input">
                <label class="form-check-label" for="css">CSS</label><br>
                <input type="checkbox" id="js" name="skills[]" value="JavaScript" class="form-check-input">
                <label class="form-check-label" for="js">JavaScript</label><br>
                <span id="erreur-skills"></span><br>
            <?php
                if(isset($errors['skills'])){
                    echo '<span style="color:red;">'.$errors['skills'].'</span>';
                }
            ?>

            <label class="form-label" for="adresse">Adresse détaillée:</label><br>
            <textarea id="adresse" name="adresse" rows="4" cols="50" class="form-control"><?= htmlspecialchars($adresse) ?></textarea><br>
            <span id="erreur-adresse"></span><br>
            <?php
                if(isset($errors['adresse'])){
                    echo '<span style="color:red;">'.$errors['adresse'].'</span>';
                }
            ?>

            <button type="submit" class="btn btn-primary col-12">Soumettre</button>
        </div>
    </form>
</body>
</html>