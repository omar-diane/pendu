<?php
session_start();


// On reset pour recommencer une nouvelle partie
if (isset($_POST["reset"])) {
    session_destroy();
    header("location: index.php");
}

// Création des variables de session
$letters = "abcdefghijklmnopqrstuvwxyz";
$_SESSION['motAffiché'] = ""; // Affiche les lettres que l'utilisateur aura choisi et qui sont dans le mot à trouver
$_SESSION['tiret'] = "-";
$i = 0;
if (!isset($_SESSION['error'])) {
    $_SESSION['error'] = 0;
}