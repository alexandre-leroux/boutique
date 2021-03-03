<?php
require_once('../models/Model_Admin_Update.php');
require_once('../View/View_Admin_Update.php');
require_once('../controllers/Controller_admin_Update.php');

$admin = new Model_Admin_Update();

$donnees = $admin->select_one_articles_updates();
$req_categorie = $admin->SelectAll('categorie');
$req_marques = $admin->SelectAll('marques');
$req_type_balle = $admin->SelectAll('balle_type');
$req_conditionnement_balle = $admin->SelectAll('balle_conditionnement');
$req_sous_cat_accessoires = $admin->SelectAll('sous_cat_accessoires');
$req_img_article = $admin->select_images($donnees);

// lance la fonction qui update l'article selectionné


$erreur_choix_premiere_image = Controller_admin_Update::choisir_premiere_image();
Controller_admin_Update::update_un_article($donnees,$req_categorie,$req_marques,$req_img_article,$req_type_balle,$req_conditionnement_balle,$req_sous_cat_accessoires,$erreur_choix_premiere_image);

$test = Controller_admin_Update::ajouter_image_update_article();

// var_dump($test);
// var_dump($_POST);









            