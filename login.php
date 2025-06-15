<?php
// login.php
session_start();
// Si l'utilisateur est déjà connecté, le rediriger vers la page d'accueil
if (isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="login-container">
        <h1>Se connecter</h1>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error-message">Nom d\'utilisateur ou mot de passe incorrect.</p>';
        }
        ?>
        <form action="authenticate.php" method="post">
            <label for="login" style="display:block; text-align:right; margin-bottom:5px;">Login :</label>
            <input type="text" name="login" id="login" value="admin" required>
            <label for="password" style="display:block; text-align:right; margin-bottom:5px;">Mot de passe :</label>
            <input type="password" name="password" placeholder="Entrez votre mot de passe" id="password" required>
            <button type="submit">Se connecter</button>
        </form>
        <p style="margin-top:15px;">
            <a href="inscription.php" class="btn btn-secondary">Inscription</a>
        </p>
    </div>
</body>
</html>