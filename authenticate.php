<?php
// authenticate.php
session_start();
require 'includes/db.php';

if (isset($_POST['login'], $_POST['password'])) {
    $stmt = $pdo->prepare('SELECT * FROM utilisateur WHERE login = :login AND password = :password');
    $stmt->execute(['login' => $_POST['login'], 'password' => $_POST['password']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Authentification réussie
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['login'] = $user['login'];
        $_SESSION['type'] = $user['type'];
        header('Location: index.php');
        exit;
    } else {
        // Informations incorrectes
        header('Location: login.php?error=1');
        exit;
    }
} else {
    header('Location: login.php');
    exit;
}
?>