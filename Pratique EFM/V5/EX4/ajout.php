<?php
    session_start();
    require_once("db.php");

    if(
        !empty($_POST['code_Pro']) &&
        !empty($_POST['nom_Pro']) &&
        !empty($_POST['Adresse_Pro']) &&
        !empty($_POST['statut_Pro']) &&
        !empty($_POST['Date_Naissance']) &&
        !empty($_POST['salaire'])
    )
    {
        if(is_numeric($_POST['salaire'])){
            $code_Pro=$_POST['code_Pro'];
            $nom_Pro=$_POST['nom_Pro'];
            $Adresse_Pro=$_POST['Adresse_Pro'];
            $Statut_Pro=$_POST['Statut_Pro'];
            $Date_Naissance=$_POST['Date_Naissance'];
            $salaire=$_POST['salaire'];

            try{
                $sql="INSERT INTO Professeur(code_Pro, nom_Pro, Statut_Pro, Adresse_Pro, Date_Naissance, salaire) 
                      VALUES (?, ?, ?, ?, ?, ?)";

                $stmt=$cnx->prepare($sql);
                $stmt->execute([$code_Pro, $nom_Pro, $Statut_Pro, $Adresse_Pro, $Date_Naissance, $salaire]);
                header("Location: lister.php");
            exit();
            } catch(PDOException $e) {
                echo("Erreur: " . $e->getMessage());
            }  
        }else{
            echo "Veuillez remplir tous les champs.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Professeurs</title>
</head>
<body>
    <form action="" method="post">
        <h3>Gestion des Professeurs</h3>

        <label for="code_Pro">saisir le code du professeur:</label>
        <input type="text" name="code_Pro" id="code_Pro"></br>

        <label for="nom_Pro">saisir le nom du professeur:</label>
        <input type="text" name="nom_Pro" id="nom_Pro"></br>

        <label for="Adresse_Pro">saisir l'adresse du professeur:</label>
        <input type="text" name="Adresse_Pro" id="Adresse_Pro"></br>

        <label for="statut_Pro">Choisir le statut du professeur:</label>
            <div>
                <input type="radio" name="statut_Pro" id="statut_Pro" value="vacataire">
                <label for="statut_Pro">Vacataire</label>

                <input type="radio" name="statut_Pro" id="statut_Pro" value="titulaire">
                <label for="statut_Pro">Titulaire</label>
            </div>
        </br>

        <label for="Date_Naissance">saisir la date de naissance:</label>
        <input type="date" name="Date_Naissance" id="Date_Naissance"></br>

        <label for="salaire">saisir le salaire du professeur(DH):</label>
        <input type="number" name="salaire" id="salaire"></br>

        <button type="submit">Ajouter</button>
    </form>
</body>
</html>