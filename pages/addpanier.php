<?php

require("../models/bapt_Panier.php");

$panier = new Panier();

if(isset($_GET['id']))
{
    $product = $panier->selectId("articles", $_GET['id']);
    if(empty($product)){
        die("Ce produit n'existe pas") ;
    }
    // var_dump($product);
    $panier->add($product[0]->id_articles);
    die('le produit a bien été ajouter au panier ! <a href="boutique.php">Retournez à la boutique</a>'); 

}
else{
    die('Aucun produit n\'a été ajouter au panier') ; 
}