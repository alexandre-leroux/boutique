<?php
require_once('../models/Models_Admin.php');
require_once('../View/view_Admin.php');
require_once('../controllers/Controller_Admin.php');

$admin = new Model_Admin();

$req_categorie = $admin->SelectAll('categorie');
$req_marques = $admin->SelectAll('marques');
$req_sous_categorie_acc = $admin->SelectAll('sous_cat_accessoires');
$req_type_balle = $admin->SelectAll('balle_type');
$req_balle_conditionnement = $admin->SelectAll('balle_conditionnement');
$tous_les_articles = $admin->select_all_articles_updates();

//Controllers - execute le changement de nom, avec update et redirection de validation
Controller_Admin::changement_nom_categorie();

// recherche dans articles
$recherche = Controller_Admin::recherche_dans_articles(@$_POST['mot_cle']);




//View - boucle qui affiche tous les articles
View_Admin_Update::affiche_all_articles($recherche,$tous_les_articles, $req_categorie, $req_marques,$req_sous_categorie_acc,$req_type_balle,$req_balle_conditionnement);





