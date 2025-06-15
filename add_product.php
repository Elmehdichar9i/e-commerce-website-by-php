<?php
// add_product.php
include 'includes/header.php';
// Vérifier que l'utilisateur est administrateur
if ($_SESSION['type'] !== 'administrateur') {
    die('Interdit : Vous n\'avez pas la permission d\'accéder à cette page.');
}
?>

<div class="container">
    <h2>Ajouter un nouveau produit</h2>
    <form action="save_product.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="RefPdt">Référence</label>
            <input type="text" name="RefPdt" id="RefPdt" required>
        </div>
        <div class="form-group">
            <label for="libPdt">Libellé</label>
            <input type="text" name="libPdt" id="libPdt" required>
        </div>
        <div class="form-group">
            <label for="Prix">Prix</label>
            <input type="number" step="0.01" name="Prix" id="Prix" required>
        </div>
        <div class="form-group">
            <label for="Qte">Quantité</label>
            <input type="number" name="Qte" id="Qte" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="4"></textarea>
        </div>
         <div class="form-group">
            <label for="type">Type</label>
            <input type="text" name="type" id="type" value="Electronique" required>
        </div>
        <div class="form-group">
            <label for="image">Image du produit</label>
            <input type="file" name="image" id="image">
        </div>
        
        <button type="submit" class="btn btn-primary">Ajouter le produit</button>
        <a href="index.php" class="btn btn-secondary">Annuler</a>
    </form>
</div>

<?php include 'includes/footer.php'; ?>