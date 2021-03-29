<?php

require_once('../utils/autoload.php');

$view_paiement = new View_Panier(); 
$model_paiement = new Model_Panier();
$controller_panier = new Controller_Panier();

$repere_page_acceuil = 0;


View_Navigation::affichage_navigation(@$repere_page_acceuil);

$controller_panier->testSession($_SESSION['id_utilisateurs']); 

$id_produit_panier = array_keys($_SESSION['panier']) ; // renvoie un tableau qui recup tous les id_articles de la session 

$implode = implode(",", $id_produit_panier);
    
$product = $model_paiement->findInfosArticlePanier($implode); // renvoie un tableau avec toutes les infos des articles dans le panier 

$prix = $controller_panier->calcPrixTotal($product);

$view_paiement->displayPaiement($product,$prix);



View_Footer::Footer($repere_page_acceuil);