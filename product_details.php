<?php
// product_details.php
include 'includes/header.php';
require 'includes/db.php';

// Vérifier la présence de la référence du produit
if (!isset($_GET['ref'])) {
    header('Location: index.php');
    exit;
}

$ref = $_GET['ref'];
$stmt = $pdo->prepare('SELECT * FROM produit WHERE RefPdt = ?');
$stmt->execute([$ref]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    die('Produit non trouvé !');
}
?>

<div class="container">
    <h2>Informations sur le produit : <?php echo htmlspecialchars($product['RefPdt']); ?></h2>
    
    <div class="product-details">
        <div class="product-image">
             <?php if (!empty($product['image'])): ?>
                <?php
                $img = $product['image'];
                if (strpos($img, 'photos/') === 0) {
                    // Anciennes images stockées dans le dossier photos
                    $img_src = $img;
                } else {
                    // Nouvelles images uploadées
                    $img_src = 'uploads/' . htmlspecialchars(basename($img));
                }
                ?>
                <img src="<?php echo $img_src; ?>" alt="<?php echo htmlspecialchars($product['libPdt']); ?>">
            <?php endif; ?>
        </div>
        <div class="product-info">
            <p><strong>Référence produit :</strong> <?php echo htmlspecialchars($product['RefPdt']); ?></p>
            <p><strong>Libellé produit :</strong> <?php echo htmlspecialchars($product['libPdt']); ?></p>
            <p><strong>Prix produit :</strong> <?php echo htmlspecialchars($product['Prix']); ?> DH</p>
            <p><strong>Quantité produit :</strong> <?php echo htmlspecialchars($product['Qte']); ?></p>
            <p><strong>Description produit :</strong> <?php echo htmlspecialchars($product['description']); ?></p>
            <p><strong>Type produit :</strong> <?php echo htmlspecialchars($product['type']); ?></p>
        </div>
    </div>
    
    <br>
    <a href="index.php" class="btn btn-secondary">Retour</a>
</div>

<?php include 'includes/footer.php'; ?>