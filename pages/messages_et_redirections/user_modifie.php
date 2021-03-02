<?php


echo 'l\'utilisateur a bien été modifié';

// echo $_SERVER['HTTP_REFERER'];

http://localhost/pp2/boutique/pages/admin_update_one_article.php?id=1&idcat=1&idsouscat=

$redirection = explode("http://localhost/pp2/boutique/pages/", $_SERVER['HTTP_REFERER']);
//---------------------------------------------ATTENTION MODIFIER ADRESSE LOCALE SINON BUG FAIRE UN ECHO DU $_SERVER !!!!!



header('Refresh:0.5 ; ../'.$redirection[1].'');


// echo '</br>';
// echo $redirection;
// var_dump($redirection);