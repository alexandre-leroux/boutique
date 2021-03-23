<?php 

require_once('../utils/autoload.php');

$article = new Model_Article(); 
$view_article = new View_Article();
$controller_article = new Controller_Article();

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



