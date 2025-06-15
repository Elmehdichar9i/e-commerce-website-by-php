<?php
// /includes/header.php
session_start();
// Vérifier que l'utilisateur est connecté sur les pages protégées
$protected_pages = ['index.php', 'product_details.php', 'add_product.php'];
$current_page = basename($_SERVER['PHP_SELF']);

if (in_array($current_page, $protected_pages) && !isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des produits</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
    <h1><a href="index.php" style="color:white; text-decoration:none;">Système de gestion des produits</a></h1>
    <nav>
        <?php if (isset($_SESSION['loggedin'])): ?>
            <span>Bienvenue, <?php echo htmlspecialchars($_SESSION['login']); ?> (<?php echo htmlspecialchars($_SESSION['type']); ?>)</span>
            <?php if ($_SESSION['type'] == 'administrateur'): ?>
                <a href="add_product.php" class="btn btn-primary">Ajouter un produit</a>
            <?php endif; ?>
            <a href="logout.php">Déconnexion</a>
        <?php endif; ?>
    </nav>
</header>