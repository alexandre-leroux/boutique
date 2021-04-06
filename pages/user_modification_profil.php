<?php
session_start();
require_once('../utils/autoload.php');

$user = new Model();

$erreur = Controller_User::update_profil();


View_Navigation::affichage_navigation(@$repere_page_acceuil);

View_User::form_update_profil($erreur);

View_Footer::Footer(@$repere_page_acceuil);