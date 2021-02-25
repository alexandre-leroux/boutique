<?php

require_once("../models/bapt_Article.php"); 
require_once("../view/bapt_View_Article.php"); 

$article = new Article(); 
$view_article = new viewArticle();

$result = $article->findOneArticle($_GET['id']);
$resultat = $article->findImagesOneArticles($_GET['id']); 

// var_dump($resultat);
 var_dump($result); 

$view_article->displayOneArticle($resultat,$result);
?>

<h1> Articles similaires </h1>

<?php

$findArticle = $article->findArticleSimilaires($result);

var_dump($findArticle);

?>



<style>
    .dp_none{
        display:none; 
    }
</style>


