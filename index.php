<?php

//Démarrer une session pour faire appel au variables de session et sauver les infos nécessaires pour le fonctionnement du jeu
    session_start();

    $str = array (file_get_contents('mots.txt'));
    $rand_keys = array_rand($str);

    //Créer des variables de session
    $_SESSION['wordAffiche'] = array();
    $_SESSION['lettresJouees'] = array();
    $_SESSION['word'] = "";
    $_SESSION['nbTentatives'] = 0;
    $_SESSION['longueur'] = 0;
    $_SESSION['nblettrestrouvees'] = 0;

    //Enregistrer le mot à découvrir dans une variable session
    $_SESSION['word'] = $_POST['word'];

    //Sauvegarder la longueur du mot
    $_SESSION['longueur'] = strlen($_SESSION['word']);

    //Remplir les tableaux (initialisation)
    for($i = 1 ; $i <= $_SESSION['longueur'] ; $i++){

        //Mettre des _ dans le mot a afficher
        $_SESSION['wordAffiche'][] = "_";

    }

    //Initialiser tout le tableau lettresJouees à FAUX
    for($i = 1 ; $i <= 26 ; $i++){

        $_SESSION['lettresJouees'][] = false;

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <div>

        <?php

        //Affiche le mot avec des - ou les lettres trouvees
foreach($_SESSION['wordAffiche'] as $rang => $element){

    //Afficher le mot a afficher avec ou sans les - ou les lettres trouvees
    echo $element;
}

//Aller à la ligne
echo "<BR> ";

//Tant que i < 26 (avec initialisation de i à 0 et incrementation a 1) faire...
for($i = 0 ; $i < 26 ; $i++){

    //Afficher la lettre actuelle sans son lien
    echo " <a href=\"index2.php?lettre=$i\">", chr(65 + $i), "</a> ";
}

?>
        </div>
    </main>
</body>
</html>