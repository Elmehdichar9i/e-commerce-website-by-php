<?php
// save_product.php
session_start();
require 'includes/db.php';

// Vérifier que l'utilisateur est administrateur
if (!isset($_SESSION['loggedin']) || $_SESSION['type'] !== 'administrateur') {
    die('Interdit : Vous n\'avez pas la permission d\'effectuer cette action.');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $ref = $_POST['RefPdt'];
    $libelle = $_POST['libPdt'];
    $prix = $_POST['Prix'];
    $qte = $_POST['Qte'];
    $desc = $_POST['description'];
    $type = $_POST['type'];
    $image_path = '';

    // Gestion de l'upload de l'image
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "uploads/";
        // S'assurer que le nom du fichier est sûr
        $image_name = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image_name;
        
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_path = $image_name; // Enregistrer seulement le nom du fichier
        } else {
            echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
        }
    }
    
    // Insérer les données dans la base de données
    $sql = "INSERT INTO produit (RefPdt, libPdt, Prix, Qte, description, image, type) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$ref, $libelle, $prix, $qte, $desc, $image_path, $type]);
    
    // Rediriger vers la page d'accueil
    header("Location: index.php");
    exit();
}
?>