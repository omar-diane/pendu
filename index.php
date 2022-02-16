<?php
session_start();

$letter;
$word = file_get_contents('mots.txt');

if(isset($_GET['word'])){
    //Je récupère le mot qui est envoyer.
    $user_word = $_GET['word'];
    /*Je test si l'utilisateur rentre un mot et que le mot est différent du mot
      qui doit être trouvé alors il echo un message*/ 
    if($user_word != $word) {
        echo 'Pas le bon mot';
        /*Si l'utilisateur rentre un mot et que le mot est le mot à trouvé,
          il echo un message*/
        elseif ($user_word === $word)
        echo 'BRAVO !';
    } else 
    echo 'Essayez';

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