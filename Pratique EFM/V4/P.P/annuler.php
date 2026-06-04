<?php
// annuler.php
session_start();
require 'db.php';

if (!isset($_SESSION['idStagiaire']) || !isset($_GET['id'])) {
    header("Location: mesInscriptions.php");
    exit;
}

$idInscription = $_GET['id'];
$idStagiaire = $_SESSION['idStagiaire'];

// Vérification que l'inscription appartient bien au stagiaire
$stmt = $pdo->prepare("SELECT Formation FROM Inscription WHERE idInscription = :id AND Stagiaire = :stag");
$stmt->execute(['id' => $idInscription, 'stag' => $idStagiaire]);
$insc = $stmt->fetch();

if ($insc) {
    try {
        $pdo->beginTransaction();

        // Suppression
        $del = $pdo->prepare("DELETE FROM Inscription WHERE idInscription = :id");
        $del->execute(['id' => $idInscription]);

        // Incrémentation places
        $up = $pdo->prepare("UPDATE Formation SET placesDisponibles = placesDisponibles + 1 WHERE idFormation = :id");
        $up->execute(['id' => $insc['Formation']]);

        $pdo->commit();
    } catch (Exception $e) {
        $pdo->rollBack();
        die("Erreur lors de l'annulation.");
    }
}

header("Location: mesInscriptions.php");
exit;
?>   