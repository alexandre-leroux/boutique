<?php
require_once('../utils/autoload.php');

$model_paiement = new Model_Panier(); 
$controller_panier = new Controller_Panier(); 

$id_produit_panier = array_keys($_SESSION['panier']) ; // renvoie un tableau qui recup tous les id_articles de la session 

$implode = implode(",", $id_produit_panier);
    
$product = $model_paiement->findInfosArticlePanier($implode); // renvoie un tableau avec toutes les infos des articles dans le panier 

var_dump($product[0]['prix']); 

$prix = $controller_panier->calcPrixTotal($product);

var_dump($prix); 

$model_paiement->insertCommande($product);

