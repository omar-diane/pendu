<?php
require_once('fonction.php');

if (!isset($arrayMot)) { // On compte le nombre de mot dans le fichier .txt 
    $arrayMot = file("mots.txt");
    $mottotal = count($arrayMot,) - 1;
}

if (isset($_GET["leMot"])) {

        $key = strip_tags(htmlspecialchars($_GET["leMot"]));

        unset($arrayMot[$key]);
        file_put_contents("mots.txt", $arrayMot);
        header("location: admin.php");
    }

if (isset($_POST["newMot"])) {

    $Nouveaumot = strip_tags(htmlspecialchars($_POST["newMot"]));

    $newMot = deleteSpecialChar(strtolower($Nouveaumot));

    foreach (chooseWord($arrayMot) as $key => $mot) { // Si le mot rentré est identique à un mot déjà existant on met une erreur
        if ($mot == $Nouveaumot) {
            $msg = " Le mot est déjà dans le jeu";
        }
    }
    if (!isset($msg)) { // Ajout du mot dans le fichier .txt
        $fichierMot = fopen('mots.txt', 'a+');
        fputs($fichierMot, $Nouveaumot . "\n");
        $goodMsg = "Le mot a bien été ajouté.";
    }
    header("location: admin.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Jeu du pendu </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
        <h1>Jeu du Pendu</h1>
    </header>

    <main>
        <section class="container">
            <article>
                <h1>Entrez un nouveau mot :</h1>
                <form action="" method="POST">
                    <label for="newMot">Rentrez un nouveau mot ici ^^ -></label>
                    <input type="text" id="newMot" name="newMot">
                    <input class="btn btn-primary" type="submit" name="enoyer" value="envoyer">
                </form>
                <a class="btn btn-primary" href="index.php">Retourner au jeu !</a>
                <h2>Listes des mots</h2>
                <ul>
                    <?php
                    if (isset($msg)) {
                        echo $msg;
                    }
                    ?>
                    <?php
                    foreach ($arrayMot as $key => $mot) {
                    ?>
                        <li>Numéro <?= $key . " - " . $mot ?></li>
                        <a href="./admin.php?leMot=<?= $key ?>">Supprimer</a>
                    <?php
                    }
                    ?>
                    <ul>
            </article>
        </section>
    </main>
    <footer>
<li><a href="https://github.com/omar-diane/pendu">Mon Github</a></li>
    </footer> 
</body>
</html>