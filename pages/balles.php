<?php

require_once("../models/Model_Article.php"); 
require_once("../view/View_Article.php"); 
require_once("../controllers/Controller_Article.php");

$article = new Article(); 
$display = new viewArticle();
$controller_article = new controllerArticle();

$result_mar = $article->display("marques"); // renvoie un tableaux de toute les marques 



$display->formTrierParMarques($result_mar,"balles"); // affiche le form trier par marques
$display->TrierParPrix("balles");

$controller_article->TrierPar($article,$display," WHERE id_categorie = 4","AND id_categorie = 4",@$_GET['id_marques']); 


