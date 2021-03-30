<?php
session_start();
require_once('utils/autoload.php');

$repere_page_acceuil = 1;

View_Navigation::affichage_navigation(@$repere_page_acceuil);

View_Accueil:: Affiche_Slider();
View_Accueil:: Affiche_Selection_TennisWorld();
View_Accueil:: Affiche_pub();
View_Accueil:: Affiche_Texte_Presentation();

View_Footer::Footer($repere_page_acceuil);



