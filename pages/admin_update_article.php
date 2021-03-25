<?php
session_start();
require_once('../utils/autoload.php');



$admin = new Model_Admin_Update();
$req_categorie = $admin->SelectAll('categorie');
$req_marques = $admin->SelectAll('marques');
$req_sous_categorie_acc = $admin->SelectAll('sous_cat_accessoires');
$req_type_balle = $admin->SelectAll('balle_type');
$req_balle_conditionnement = $admin->SelectAll('balle_conditionnement');
$tous_les_articles = $admin->select_all_articles_updates();

Controller_Admin_Update::delete_one_article();
//Controllers - execute le changement de nom
Controller_Admin_Update::changement_nom_categorie();

// recherche dans articles
$recherche = Controller_Admin_Update::recherche_dans_articles(@$_POST['mot_cle']);

$admin = new Model_Admin_Update();
$req_categorie = $admin->SelectAll('categorie');
$req_marques = $admin->SelectAll('marques');
$req_sous_categorie_acc = $admin->SelectAll('sous_cat_accessoires');
$req_type_balle = $admin->SelectAll('balle_type');
$req_balle_conditionnement = $admin->SelectAll('balle_conditionnement');
$tous_les_articles = $admin->select_all_articles_updates();




View_Navigation::affichage_navigation(@$repere_page_acceuil);


View_Admin_Update::affiche_all_articles($recherche,$tous_les_articles, $req_categorie, $req_marques,$req_sous_categorie_acc,$req_type_balle,$req_balle_conditionnement);


View_Footer::Footer(@$repere_page_acceuil);



