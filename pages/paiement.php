<?php

require_once('../utils/autoload.php');

$view_paiement = new View_Panier(); 
$model_paiement = new Model_Panier();

$repere_page_acceuil = 0;


View_Navigation::affichage_navigation(@$repere_page_acceuil);

$result = $model_paiement->recupLastCommande($_SESSION['id_utilisateurs']); 
var_dump($result); 

$view_paiement->displayPaiement($result);



View_Footer::Footer($repere_page_acceuil);