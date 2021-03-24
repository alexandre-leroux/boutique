<?php

session_start();
require_once('../utils/autoload.php');

$article = new Model_Article(); 
$view_article = new View_Article();


$result = $article->findOneArticle($_GET['id']); // renvoie un tableau avec toute les infos d'un articles
$resultat = $article->findImagesOneArticles($_GET['id']); // renvoie un tableau avec toutes les images d'un article 
$repere_page_acceuil = 0;


View_Navigation::affichage_navigation($repere_page_acceuil);

// var_dump($resultat);
//  var_dump($result); 

$view_article->displayOneArticle($resultat,$result);  // affichage infos + images 
?>



<?php

$findArticle = $article->findArticleSimilaires($result); // renvoie un tableau des article de la même cat que l'article en get 

// var_dump($findArticle);

$view_article->displayArticlesSimilaires($findArticle); // Boucle qui affiche les infos + images 

?>



<?php
View_Footer::Footer($repere_page_acceuil);