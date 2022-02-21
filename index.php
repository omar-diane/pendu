<?php
session_start();


// On reset pour recommencer une nouvelle partie
if (isset($_POST["reset"])) {
    session_destroy();
    header("location: index.php");
}

// Création des variables de session
$letters = "abcdefghijklmnopqrstuvwxyz";
 // Affiche les lettres que l'utilisateur aura choisi et qui sont dans le mot à trouver
$_SESSION['wordAffiché'] = "";
$_SESSION['tiret'] = "-";
$i = 0;
if (!isset($_SESSION['error'])) {
    $_SESSION['error'] = 0;
}

if (!isset($_SESSION['word'])) {
    // On ouvre le fichier .txt
    $arrayWord = chooseWord(file('mots.txt'));
    // On compte le nombre de mots - 1 pour commencer à 0
    $countWord =  count($arrayWord,) - 1;
    // On utilise rand() pour en choisir un aléatoirement
    $randWord = rand(0, $countWord);

    // On transforme la variable en $_SESSION
    $_SESSION['word'] = $arrayWord[$randWord];
}

// On mesure la longueur du mot choisi et on affiche le nombre de tiret nécessaire
$nbrLettre = strlen($_SESSION['word']);
for ($i = 0; $i < $nbrLetter; $i++) {
    $_SESSION['wordAffiché'][$i] = $_SESSION['tiret'];
}

// Création de la variable $char 
if (isset($_GET['a']) && strlen($_GET['a']) == 1 && strpos($letters, $_GET['a']) !== false && $_SESSION['error'] <= 9) {
    $char = '';
    $char = $_GET['a'];

    if (!isset($_SESSION['letter']) && empty($_SESSION['letter'])) {

        $_SESSION['letter']  = $char;
    } else {
        $_SESSION['letter'] .= $char;
    }