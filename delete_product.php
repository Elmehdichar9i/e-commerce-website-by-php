<?php
// delete_product.php
session_start();
require 'includes/db.php';

// Vérifier que l'utilisateur est administrateur
if (!isset($_SESSION['loggedin']) || $_SESSION['type'] !== 'administrateur') {
    http_response_code(403);
    die('Interdit : Vous n\'avez pas la permission d\'effectuer cette action.');
}

// Vérifier la présence de la référence du produit
if (isset($_GET['ref'])) {
    $ref = $_GET['ref'];
    $stmt = $pdo->prepare('DELETE FROM produit WHERE RefPdt = ?');
    $stmt->execute([$ref]);
}

// Rediriger vers la page d'accueil
header('Location: index.php');
exit;
?>