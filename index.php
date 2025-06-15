<?php
// index.php
include 'includes/header.php';
require 'includes/db.php';

// Récupérer tous les produits
$stmt = $pdo->query('SELECT * FROM produit ORDER BY RefPdt ASC');
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h2>Liste des produits</h2>
    <div class="product-card-grid">
        <?php foreach ($products as $product): ?>
        <div class="product-card-v2">
            <div class="product-card-v2-image">
                <?php if (!empty($product['image'])): ?>
                    <?php
                    $img = $product['image'];
                    if (strpos($img, 'photos/') === 0) {
                        $img_src = $img;
                    } else {
                        $img_src = 'uploads/' . htmlspecialchars(basename($img));
                    }
                    ?>
                    <img src="<?php echo $img_src; ?>" alt="<?php echo htmlspecialchars($product['libPdt']); ?>">
                <?php else: ?>
                    <div class="no-image">Pas d'image</div>
                <?php endif; ?>
            </div>
            <div class="product-card-v2-body">
                <div class="product-card-v2-header">
                    <h3><?php echo htmlspecialchars($product['libPdt']); ?></h3>
                    <span class="product-type"><?php echo htmlspecialchars($product['type']); ?></span>
                </div>
                <div class="product-card-v2-info">
                    <span class="ref">Réf: <?php echo htmlspecialchars($product['RefPdt']); ?></span>
                    <span class="prix"><?php echo htmlspecialchars($product['Prix']); ?> DH</span>
                </div>
                <div class="product-card-v2-qte <?php echo ($product['Qte'] <= 3 ? 'low-qte' : ''); ?>">
                    Quantité: <?php echo htmlspecialchars($product['Qte']); ?>
                </div>
                <div class="product-card-v2-desc">
                    <?php echo htmlspecialchars($product['description']); ?>
                </div>
            </div>
            <div class="product-card-v2-actions">
                <a href="product_details.php?ref=<?php echo $product['RefPdt']; ?>" class="btn btn-primary" title="Voir les détails">👁️ Détails</a>
                <?php if ($_SESSION['type'] == 'administrateur'): ?>
                    <a href="delete_product.php?ref=<?php echo $product['RefPdt']; ?>" class="btn btn-secondary" title="Supprimer le produit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">❌ Supprimer</a>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>