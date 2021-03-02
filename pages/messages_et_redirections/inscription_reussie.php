<?php


echo 'vous avez bien été inscrit';
// sleep(2);
// echo $_SERVER['HTTP_REFERER'];

http://localhost/pp2/boutique/pages/admin_update_one_article.php?id=1&idcat=1&idsouscat=

// $redirection = explode("http://localhost/pp2/boutique/pages/", $_SERVER['HTTP_REFERER']);
//---------------------------------------------ATTENTION MODIFIER ADRESSE LOCALE SINON BUG FAIRE UN ECHO DU $_SERVER !!!!!

// header("Refresh:0.5; url=javascript://history.go(-1)");

// header('Refresh:0.5 ; ../'.$redirection[1].'');
// Header('refresh: 10, Location:javascript://history.go(-1)');
// header("location:javascript://history.go(-1)");

// header('Refresh: 2; javascript://history.go(-1)');
// echo '</br>';
// echo $redirection;
// var_dump($redirection);



header("Refresh:2; url=../connexion.php");