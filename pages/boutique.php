<?php

require_once("../models/bapt_Article.php");
require_once("../view/bapt_View_article.php");
require_once("../controllers/bapt_Article_Controller.php");

$article = new Article(); 
$view_article = new viewArticle();
$controller_article = new controllerArticle();

$result_mar = $article->display("marques"); // renvoie un tableaux de toute les marques 
$result_cat = $article->display("categorie"); // renvoie un tableaux de toute les catégories

$view_article->formTrierParCat($result_cat);
$view_article->formTrierParMarques($result_mar); // affiche le form trier par marques
$view_article->TrierParPrix();


$controller_article->TrierPar($article,$view_article); 



