<?php
session_start();
require_once('../utils/autoload.php');



//-----il s'agit de la fonction recherche sur la nav, j'ai utilisé la fonction qui est dans la partie admin update
$recherche = Controller_Admin_Update::recherche_dans_articles($_POST['rechercher']);


View_Navigation::affichage_navigation(@$repere_page_acceuil);

View_User::afficher_resultat_recherche($recherche);

View_Footer::Footer(@$repere_page_acceuil);