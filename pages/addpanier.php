<?php

require_once('../utils/autoload.php');

$panier = new Model_Panier();

if(isset($_GET['id']))
{
    $product = $panier->selectId("articles", $_GET['id']);
    if(empty($product)){
        die("Ce produit n'existe pas") ;
    }
    var_dump($product);
    $panier->add($product[0]->id_articles);
    die('le produit a bien été ajouter au panier ! <a href="javascript:history.back()">Retournez à la boutique</a> <a href="panier.php"> Voir le panier </a>'); 

}
else{
    die('Aucun produit n\'a été ajouter au panier') ; 
}



View_Footer::Footer($repere_page_acceuil);