<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
      $fname=$_POST["fname"]??"";
      $annee=$_POST["annee"]??0;
      $town=$_POST["town"]??"";
      $skills=$_POST["skills"]??[];
      $details=$_POST["details"]??"";
    }
    /*1. Tous les champs sont obligatoires
2. le prenom doit commencer par majuscule, suivi d'au moins trois alphabets
3. l'âge doit compris entre 18 et 70
Astuce : 
1. empty 
2. isset 
3. preg_match
4. filter_var
*/
    $errors=[];
    if(empty($fname)){
        $errors[]="le prénom est obligatoire !!!!";
    }else if(!preg_match("/^[A-Z][a-z]{3,}$/",$fname)){
        $errors[]="le prénom est invalide !!!!";
    }
    if(empty($annee)){
        $errors[]="l'annee est obligatoire !!!!!";
    }else if(!filter_var($annee,FILTER_VALIDATE_INT)){
        $errors[]="l'annee doit être numérique !!!!";
    }
    else if($annee<18 || $annee>70){
        $errors[]="l'annee doit être entre 18 et 70 !!!!";
    }
    if(empty($town)){
        $errors[]="la ville est obligatoire !!!!";
    }
    if(empty($skills)){
        $errors[]="les skills sont obligatoires !!!!";
    }
    if(empty($details)){
        $errors[]="les details sont obligatoires !!!!";
    }
?>


</head>
<body>

<?php
  if(!empty($errors)){
        echo"<ul class='alert alert-danger w-50 mx-auto mt-4'>";
        foreach($errors as $e){
            echo"<li>$e</li>";
        }
     echo"</ul>";
     }
?>

   <div class="container w-75 mx-auto p-4">
   <form action="page1.php" method="POST">
       <div class="mb-3">
        <label for="prenom">Prenom</label>
        <input type="text" name="fname" id="prenom" class="form-control">
       </div>
     <div class="mb-3">
        <label for="age">Age</label>
        <input type="number" name="annee" id="age" class="form-control">
       </div>
      <div class="mb-3">
        <label for="ville">ville</label>
        <select name="town" id="ville" class="form-select">
            <option value="" selected disabled>choisir une ville ....</option>
            <option value="Agadir">Agadir</option>
            <option value="Safi">Safi</option>
            <option value="Rabat">Rabat</option>
        </select>
    </div>
   <div class="mb-3">
        <label for="langues">Langues</label>
        <select name="lng[]" multiple id="langues" class="form-select">
            <option value="Arabe" selected disabled>Arabe</option>
            <option value="Français">Français</option>
            <option value="Anglais">Anglais</option>
            <option value="Espagnol">Espagnol</option>
        </select>
    </div>
   <div class="mb-3">
        <label for="gente">Gente</label>
        <div class="form-check form-check-inline">
          <input type="radio" checked id="male" class="form-check-input" name="gender" value="male">
           <label for="male" class="form-check-label">Male</label>
        </div>
        <div class="form-check form-check-inline">
          <input type="radio" id="female" class="form-check-input" name="gender" value="female">
           <label for="female" class="form-check-label">Female</label>
        </div>
    </div>
    <div class="mb-3">
        <label for="skills">Skills</label>
        <div class="form-check form-check-inline">
          <input type="checkbox"  id="python" class="form-check-input" name="skills[]" value="python">
           <label for="python" class="form-check-label">Python</label>
        </div>
      <div class="form-check form-check-inline">
          <input type="checkbox"  id="javascript" class="form-check-input" name="skills[]" value="javascript">
           <label for="javascript" class="form-check-label">javascript</label>
        </div>
     <div class="form-check form-check-inline">
          <input type="checkbox"  id="php" class="form-check-input" name="skills[]" value="php">
           <label for="php" class="form-check-label">php</label>
        </div>
    </div>
    <div class="mb-3">
    <label for="details">Details</label>
      <textarea name="details" id="details">
      </textarea>
    </div>
<div class="mb-3">
    <button type="submit" class="btn btn-primary">Envoyer</button>
</div>
   </form>
   </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>