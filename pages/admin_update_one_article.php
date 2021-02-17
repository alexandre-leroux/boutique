<?php
require_once('../models/alx-Admin.php');
require_once('../View/view_admin_update_article.php');

$admin = new Admin();

//penser à mettre en parametre un $_GET['id']
$donnees = $admin->select_one_articles_updates();

$req_categorie = $admin->SelectAll('categorie');
$req_marques = $admin->SelectAll('marques');


Affichage_admin_update::affiche_details_et_form_update($donnees,$req_categorie,$req_marques);











echo'<pre>';
var_dump($req_categorie);
echo'</pre>';
            