<?php

require_once("../models/bapt_Article.php");
require_once("../view/bapt_View_article.php");

$article = new Article(); 
$view_article = new viewArticle();


//$result = $article->findAllArticles(); // renvoie un tableaux de tout les articles 
$result_mar = $article->display("marques"); // renvoie un tableaux de toute les marques 
$result_cat = $article->display("categorie"); // renvoie un tableaux de toute les catégories

$view_article->formTrierParCat($result_cat);
$view_article->formTrierParMarques($result_mar); // affiche le form trier par marques
//$view_article->displayAllArticles($result); // affiche les articles 

if(!isset($_POST['tri_marque']) && !isset($_POST['tri_cat']))
{
    $result = $article->findAllArticles(""," GROUP BY articles.id_articles,art_nom,art_courte_description,prix,id_marques,id_categorie");
    $view_article->displayAllArticles($result);
}
elseif(isset($_POST['tri_cat']))
{
    $cat = $article->findAllArticles("AND id_categorie = ".$_POST['categories'], " GROUP BY articles.id_articles,art_nom,art_courte_description,prix,id_marques,id_categorie"); 
    
    var_dump($cat);
    $view_article->displayAllArticles($cat); 
}
elseif(isset($_POST['tri_marque']))
{
    $marque = $article->findAllArticles("AND id_marques = ".$_POST['marques'], " GROUP BY articles.id_articles,art_nom,art_courte_description,prix,id_marques,id_categorie"); 
    var_dump($marque);
    $view_article->displayAllArticles($marque);
    
}




//$result = $article-> displayImages(); 

//var_dump($result);
//var_dump($result_mar);



