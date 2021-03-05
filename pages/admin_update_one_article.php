<?php
session_start();

// require_once('../view/View_Navigation.php');
// require_once('../controllers/Controller_Navigation.php');
// require_once('../models/Model_Admin_Update.php');
// require_once('../View/View_Admin_Update.php');
// require_once('../controllers/Controller_admin_Update.php');
// require_once('../utils/redirections.php');

require_once('../utils/autoload.php');


$erreur_choix_premiere_image = Controller_admin_Update::choisir_premiere_image();
Controller_admin_Update::ajouter_image_update_article();


Controller_Navigation::affichage_navigation(@$repere_page_acceuil);

$admin = new Model_Admin_Update();
$donnees = $admin->select_one_articles_updates();
$req_categorie = $admin->SelectAll('categorie');
$req_marques = $admin->SelectAll('marques');
$req_type_balle = $admin->SelectAll('balle_type');
$req_conditionnement_balle = $admin->SelectAll('balle_conditionnement');
$req_sous_cat_accessoires = $admin->SelectAll('sous_cat_accessoires');
$req_img_article = $admin->select_images($donnees);

// lance la fonction qui update l'article selectionné


Controller_admin_Update::update_un_article($donnees,$req_categorie,$req_marques,$req_img_article,$req_type_balle,$req_conditionnement_balle,$req_sous_cat_accessoires,$erreur_choix_premiere_image);

// Controller_Redirection::redirection_admin();

echo '<pre>';
var_dump($donnees);
echo '</pre>';






            