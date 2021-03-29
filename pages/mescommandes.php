<?php

require_once('../utils/autoload.php');

$commande = new Model_Panier(); 
$vue = new View_Panier(); 

$repere_page_acceuil = 0;


View_Navigation::affichage_navigation(@$repere_page_acceuil);

$result = $commande->findInfosCommande($_GET['id_utilisateurs']);
// var_dump($result); 

$vue->displayInfosCommande($result); 

View_Footer::Footer($repere_page_acceuil);


