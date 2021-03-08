<?php

session_start();
require_once("../models/Model_Article.php"); 
require_once("../view/View_Article.php"); 

$article = new Article(); 
$view_article = new viewArticle();
require_once('../view/View_Navigation.php');
require_once('../controllers/Controller_Navigation.php');

$result = $article->findOneArticle($_GET['id']); // renvoie un tableau avec toute les infos d'un articles
$resultat = $article->findImagesOneArticles($_GET['id']); // renvoie un tableau avec toutes les images d'un article 
$repere_page_acceuil = 0;


Controller_Navigation::affichage_navigation($repere_page_acceuil);

// var_dump($resultat);
//  var_dump($result); 

$view_article->displayOneArticle($resultat,$result);  // affichage infos + images 
?>

<h1> Articles similaires </h1>

<?php

$findArticle = $article->findArticleSimilaires($result); // renvoie un tableau des article de la même cat que l'article en get 

var_dump($findArticle);

$view_article->displayArticlesSimilaires($findArticle); // Boucle qui affiche les infos + images 

?>



<style>
    .dp_none{
        display:none; 
    }
</style>


