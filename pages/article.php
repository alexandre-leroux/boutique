<?php

require_once("../models/bapt_Article.php"); 
require_once("../view/bapt_View_Article.php"); 

$article = new Article(); 
$view_article = new viewArticle();

$result = $article->findOneArticle($_GET['id']);
$resultat = $article->findImagesOneArticles($_GET['id']); 

// var_dump($resultat);

// var_dump($result); 

$view_article->displayOneArticle($resultat,$result);
?>

<style>
    .dp_none{
        display:none; 
    }
</style>


