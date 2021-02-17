<?php
require_once('../models/alx-Admin.php');
require_once('../View/view_admin_update_article.php');
require_once('../controllers/Controller_admin.php');


$admin = new Admin();

//penser à mettre en parametre un $_GET['id']
$donnees = $admin->select_one_articles_updates();

$req_categorie = $admin->SelectAll('categorie');
$req_marques = $admin->SelectAll('marques');
$req_img_raquettes = $admin->select_images($donnees);

Affichage_admin_update::affiche_details_et_form_update($donnees,$req_categorie,$req_marques,$req_img_raquettes);


if (@$_POST['submit'] )
    {
       $admin->update_article($donnees);
    }

if (@$_POST['submit2'])
    {
        Controller_Admin::supp_image();
    }




    // echo'<pre>';
    // var_dump($req_img_raquettes);
    // echo'</pre>';




            