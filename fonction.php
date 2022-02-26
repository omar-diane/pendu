<?php 

function chooseWord($words) 
{
    $t = [];
    foreach ($words as $word) {
        array_push($t, trim($word));
    }
    return $t;
}

function deleteSpecialChar($str)
{

    // Les caractères spéciaux sont remplacés par une chaîne vide
    $res = str_replace(array(' ', '%', '@', '\'', ';', '<', '>', '+', '*', '[', ']', ',', '?', '|', '$', '§', '!', '&'
    , '_', '`', '=', '^', '(', ')', '{', '}', '#', "~", ':', ';', '/','0', '1' , '2' , '3' , '4' , '5' , '6' , '7' , '8'
    ,'9' ,'é' , 'è' , 'à' , 'ç' ,'ù'), '', $str);

    return $res;
}

?>