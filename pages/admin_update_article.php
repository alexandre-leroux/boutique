<?php
require_once('../models/Models_Admin.php');
require_once('../View/view_Admin.php');


$admin = new Admin();



$req_categorie = $admin->SelectAll('categorie');

$req_marques = $admin->SelectAll('marques');

$tous_les_articles = $admin->select_all_articles_updates();


Affichage_admin_update::affiche_all_articles($tous_les_articles, $req_categorie, $req_marques);



if (@$_POST['submit_cat']) {
    $admin->update_name_categorie();
}

if (@$_POST['submit_marque']) {
    $admin->update_name_marque();
}
