<?php
// nouvelleInscription.php
session_start();
require 'db.php';

if (!isset($_SESSION['idStagiaire'])) { header("Location: connexion.php"); exit; }

$erreurs = [];

// 1. Vérification format ID (si soumis manuellement ou via session implicite)
// Ici, on utilise l'ID de session, mais on peut vérifier le format si nécessaire :
if (!preg_match('/^INS\d{5}$/', $_SESSION['idStagiaire'])) {
    // Note: Selon votre BDD, l'ID peut être numérique. Si le login est INS12345, adaptez la regex.
}
// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idFormation = $_POST['formation'];
    $stagiaireId = $_SESSION['idStagiaire'];

    // 3. Vérifier doublon
    $check = $pdo->prepare("SELECT idInscription FROM Inscription WHERE Stagiaire = :s AND Formation = :f");
    $check->execute(['s' => $stagiaireId, 'f' => $idFormation]);
    if ($check->rowCount() > 0) {
        $erreurs[] = "Vous êtes déjà inscrit à cette formation.";
    }

    // 4. Upload Justificatif
    $targetDir = "documents/";
    if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
    
    $fileName = basename($_FILES["justificatif"]["name"]);
    $targetFile = $targetDir . time() . "_" . $fileName;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if ($fileType != "pdf") {
        $erreurs[] = "Seul le format PDF est accepté.";
    } elseif (!move_uploaded_file($_FILES["justificatif"]["tmp_name"], $targetFile)) {
        $erreurs[] = "Erreur lors du téléchargement.";
    }

    // 5, 6, 7. Insertion et Décrémentation (Transaction)
    if (empty($erreurs)) {
        try {
            $pdo->beginTransaction();

            // Insertion
            $stmt = $pdo->prepare("INSERT INTO Inscription (dateInscription, justificatif, Stagiaire, Formation) VALUES (NOW(), :justif, :stag, :form)");
            $stmt->execute(['justif' => $targetFile, 'stag' => $stagiaireId, 'form' => $idFormation]);

            // Décrémentation
            $update = $pdo->prepare("UPDATE Formation SET placesDisponibles = placesDisponibles - 1 WHERE idFormation = :id AND placesDisponibles > 0");
            $update->execute(['id' => $idFormation]);

            if ($update->rowCount() === 0) {
                throw new Exception("Plus de places disponibles ou erreur de concurrence.");
            }

            $pdo->commit();
            header("Location: mesInscriptions.php");
            exit;
        } catch (Exception $e) {
            $pdo->rollBack();
            $erreurs[] = "Échec de l'inscription : " . $e->getMessage();
        }
    }
}

// 2. Liste déroulante
$formations = $pdo->query("SELECT idFormation, titre FROM Formation WHERE placesDisponibles > 0")->fetchAll();
?>

<form method="post" enctype="multipart/form-data">
    <label>Formation :</label>
    <select name="formation" required>
        <option value="">Choisir...</option>
        <?php foreach ($formations as $f): ?>
            <option value="<?= $f['idFormation'] ?>"><?= htmlspecialchars($f['titre']) ?></option>
        <?php endforeach; ?>
    </select><br><br>
    
    <label>Justificatif (PDF) :</label>
    <input type="file" name="justificatif" accept=".pdf" required><br><br>
    
    <?php foreach($erreurs as $err): ?><p style="color:red"><?= $err ?></p><?php endforeach; ?>
    <button type="submit">S'inscrire</button>
</form>   