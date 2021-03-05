<?php 

require_once("../models/Model_Article.php");
require_once("../view/View_Article.php");
require_once("../controllers/Controller_Article.php");

$article = new Article(); 
$view_article = new viewArticle();
$controller_article = new controllerArticle();

$result_mar = $article->display("marques"); // renvoie un tableaux de toute les marques 
$result_cat = $article->display("categorie"); // renvoie un tableaux de toute les catégories

$view_article->formTrierParCat($result_cat);
$view_article->formTrierParMarques($result_mar,"boutique"); // affiche le form trier par marques
$view_article->TrierParPrix("boutique");

$controller_article->TrierPar($article,$view_article,@$_GET['id_marques']); 

?>
</main>
</body>
</html>

<style>
    .galerie_article{
        display: flex; 
        width: 90%; 
        margin: auto; 
        justify-content: center ; 
        flex-wrap : wrap; 
    }

    .galerie_article .vignette_article {
        width: 25% ; 
        padding : 10px; 
        margin: 10px; 
        border : 2px solid black; 
    }

    .img img{
        width: 100%; 
        object-fit: cover ; 
    }
</style>



