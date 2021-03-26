<?php 
session_start();
require_once('../utils/autoload.php');

$article = new Model_Article(); 
$view_article = new View_Article();
$controller_article = new Controller_Article();
View_Navigation::affichage_navigation(@$repere_page_acceuil);

$result_mar = $article->display("marques"); // renvoie un tableaux de toute les marques 
$result_cat = $article->display("categorie"); // renvoie un tableaux de toute les catégories

// $view_article->formTrierParCat($result_cat);
$view_article->formTrierParMarques($result_mar,"boutique"); // affiche le form trier par marques
$view_article->TrierParPrix("boutique");

$controller_article->TrierPar($article,$view_article,@$_GET['id_marques']); 

View_Footer::Footer(@$repere_page_acceuil);
?>


<style>
#trier_par_prix{
    display: none;
}
</style>



