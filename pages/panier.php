<?php

require_once('../utils/autoload.php');


$panier = new Model_Panier(); // Model panier
$display = new View_Panier(); // View Panier 
$controller_panier = new Controller_Panier();

$repere_page_acceuil = 0;

View_Navigation::affichage_navigation($repere_page_acceuil);


$panier->checkNumCommande();


$id_produit_panier = array_keys($_SESSION['panier']) ; // renvoie un tableau qui recup tous les id_articles de la session 
if(empty($id_produit_panier))
{
    $product = array(); 
    echo '<p class="panier_vide"> Le panier est vide ! <a href="../index.php"> Revenir à la boutique </a></p>' ;
}
else{
    
    $implode = implode(",", $id_produit_panier);
    
    $product = $panier->findInfosArticlePanier($implode); // renvoie un tableau avec toutes les infos des articles dans le panier 
    
    $prix = $controller_panier->calcPrixTotal($product);
}

$controller_panier->controlPanier();

?>

<html>
    <head><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></head>
</html>
<?php
$display->displayInfosPanier($product, @$prix,$id_produit_panier); // Affiche ces infos 

// $controller_panier->addCommande($panier,$product); 

View_Footer::Footer($repere_page_acceuil);