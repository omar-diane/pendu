<?php
session_start();

$string = file_get_contents('mots.txt');
$result = explode(' ',$string);
$result = $result[array_rand($result)];
$_GET['word'] = $result;

if(isset($_GET['word'])){
    $user_word = $_GET['word'];

    if($user_word < $word){
    echo 'Mot trop petit.';
    } elseif 
        ($user_word > $word) {
            echo 'Mot trop long.';
        } elseif
            ($user_word === $word){
                echo 'Bravo !';
            }
        }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeu du pendu</title>
</head>
<body>
    <main>
        <form action="" method="get">
            <input type="text" name="word" />
            <input type="submit" value="Envoyer">
        </form>
    </main>
    
</body>
</html>