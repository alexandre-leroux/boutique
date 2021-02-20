<?php
require_once('../models/Models_Admin.php');
require_once('../View/view_Admin.php');


$admin = new Admin();



$req_categorie = $admin->SelectAll('categorie');

$req_marques = $admin->SelectAll('marques');
$req_sous_categorie_acc = $admin->SelectAll('sous_cat_accessoires');
$req_type_balle = $admin->SelectAll('balle_type');
$req_balle_conditionnement = $admin->SelectAll('balle_conditionnement');

$tous_les_articles = $admin->select_all_articles_updates();


Affichage_admin_update::affiche_all_articles($tous_les_articles, $req_categorie, $req_marques,$req_sous_categorie_acc,$req_type_balle,$req_balle_conditionnement);



if (@$_POST['submit_cat']) {
    $admin->update_name_categorie();
    header('Location: messages_et_redirections/article_modifie.php');
    exit();
}

if (@$_POST['submit_marque']) {
    $admin->update_name_marque();
    header('Location: messages_et_redirections/article_modifie.php');
    exit();
}

if (@$_POST['submit_sous_cat_acc']) {
    $admin->update_name_sous_act_acc();
    header('Location: messages_et_redirections/article_modifie.php');
    exit();
}

if (@$_POST['submit_balle_type']) {
    $admin->update_name_type_balle();
    header('Location: messages_et_redirections/article_modifie.php');
    exit();
}
if (@$_POST['submit_balle_conditionnement']) {
    $admin->update_name_balle_conditionnement();
    header('Location: messages_et_redirections/article_modifie.php');
    exit();
}