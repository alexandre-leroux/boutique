<?php
require_once('../models/Models_Admin.php');
require_once('../View/view_Admin.php');
require_once('../controllers/Controller_admin.php');


$admin = new Admin();


$donnees = $admin->select_one_articles_updates();

$req_categorie = $admin->SelectAll('categorie');
$req_marques = $admin->SelectAll('marques');
$req_type_balle = $admin->SelectAll('balle_type');
$req_conditionnement_balle = $admin->SelectAll('balle_conditionnement');
$req_img_article = $admin->select_images($donnees);




if($_GET['idcat'] == 1){

    Affichage_admin_update::affiche_details_et_form_update_raquette($donnees,$req_categorie,$req_marques,$req_img_article);
}

if($_GET['idcat'] == 2){
    
    Affichage_admin_update::affiche_details_et_form_update_sacs($donnees,$req_categorie,$req_marques,$req_img_article);
    
}

if($_GET['idcat'] == 3){
    
    Affichage_admin_update::affiche_details_et_form_update_cordage($donnees,$req_categorie,$req_marques,$req_img_article);
    
}

if($_GET['idcat'] == 4){
    $donnees = $admin->select_one_articles_updates_balle();
    Affichage_admin_update::affiche_details_et_form_update_balle($donnees,$req_categorie,$req_marques,$req_img_article,$req_type_balle,$req_conditionnement_balle);
    echo '<pre>';
    print_r($donnees);
    echo '/<pre>';
    
}



if (@$_POST['submit'] )
    {
       $admin->update_article($donnees);
       
       header('Location: modif_article_enregistree.php');
       exit();

    }

if (@$_POST['submit2'])
    {
        Controller_Admin::supp_image();
    }




    // echo'<pre>';
    // var_dump($req_img_raquettes);
    // echo'</pre>';




            