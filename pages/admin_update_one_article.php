<?php
require_once('../models/Models_Admin.php');
require_once('../View/view_Admin.php');
require_once('../controllers/Controller_admin.php');

$admin = new Model_Admin();

$donnees = $admin->select_one_articles_updates();
$req_categorie = $admin->SelectAll('categorie');
$req_marques = $admin->SelectAll('marques');
$req_type_balle = $admin->SelectAll('balle_type');
$req_conditionnement_balle = $admin->SelectAll('balle_conditionnement');
$req_sous_cat_accessoires = $admin->SelectAll('sous_cat_accessoires');
$req_img_article = $admin->select_images($donnees);

// lance la fonction qui update l'article selectionné
Controller_Admin::update_un_article($donnees,$req_categorie,$req_marques,$req_img_article,$req_type_balle,$req_conditionnement_balle,$req_sous_cat_accessoires);








            