<?php
require 'includes/db.php';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    $type = 'user';

    if ($login && $password) {
        // Vérifier si le login existe déjà
        $stmt = $pdo->prepare('SELECT * FROM utilisateur WHERE login = ?');
        $stmt->execute([$login]);
        if ($stmt->fetch()) {
            $message = "Ce login existe déjà.";
        } else {
            $stmt = $pdo->prepare('INSERT INTO utilisateur (login, password, type) VALUES (?, ?, ?)');
            $stmt->execute([$login, $password, $type]);
            $message = "Inscription réussie. <a href='login.php'>Connectez-vous ici</a>.";
        }
    } else {
        $message = "Veuillez remplir tous les champs.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="login-container">
    <h1>Inscription</h1>
    <?php if ($message): ?>
        <p class="error-message"><?php echo $message; ?></p>
    <?php endif; ?>
    <form method="post">
        <label for="login" style="display:block; text-align:right; margin-bottom:5px;">Login :</label>
        <input type="text" name="login" id="login" required>
        <label for="password" style="display:block; text-align:right; margin-bottom:5px;">Mot de passe :</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">S'inscrire</button>
    </form>
    <p style="margin-top:15px;">Déjà inscrit ? <a href="login.php">Se connecter</a></p>
</div>
</body>
</html>
