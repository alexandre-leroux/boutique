<?php 

session_start();
var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../style/dart-sass/style.css">
        <title>Document</title>
    </head>

    <body>
        <header>

            <div class="logo">
                <a href=""><img src="../medias/logo.svg" alt=""></a>
            </div>

            <div class="accueil">
                <a href="">ACCUEIL</a>
                <p>|</p>
                <a href="">INSCRIPTION</a>
                <p>|</p>
                <a href="">MON COMPTE</a>
            </div>

            <div class="search_bar">
                <div class="border">
                    <input type="search" aria-label="Search through site content" placeholder="Rechercher..." >
                    <button><i class="fa fa-search"></i></button>
                </div>
            </div>

            <div class="burger">
                <i class="fa fa-align-justify fa-3x"></i>
            </div>

            <div class="panier">
                <a href="panier.php"><i class="fa fa-shopping-cart"></i></a>
                <p> <?= count($_SESSION['panier']); ?> </p>
            </div>
        
        </header>
        
        <nav class="nav">
            
            <ul class="liste_nav">
                
                <li><a href="raquettes.php">Raquettes</a></li>
                <li><a href="sacs.php">Sacs</a></li>
                <li><a href="cordages.php">Cordages</a></li>
                <li><a href="balles.php">Balles</a></li>
                <li><a href="accessoires.php">Accessoires</a></li>
                
            </ul>
            
        </nav>
       

        <main>
        
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



