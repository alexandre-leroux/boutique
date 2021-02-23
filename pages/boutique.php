<?php

require_once("../models/bapt_Article.php");
require_once("../view/bapt_View_article.php");

$article = new Article(); 
$view_article = new viewArticle();


//$result = $article->findAllArticles(); // renvoie un tableaux de tout les articles 
$result_mar = $article->display("marques"); // renvoie un tableaux de toute les marques 

$view_article->formTrierParMarques($result_mar); // affiche le form trier par marques
//$view_article->displayAllArticles($result); // affiche les articles 


if(!isset($_POST['tri_marque']))
{
    $result = $article->findAllArticles();
    $view_article->displayAllArticles($result);
}
elseif(isset($_POST['tri_marque']))
{
    
    $marque = $article->findAllArticles("AND id_marques = ".$_POST['marques']); 
    var_dump($marque);
    $view_article->displayAllArticles($marque);

}


//$result = $article-> displayImages(); 

//var_dump($result);
//var_dump($result_mar);



