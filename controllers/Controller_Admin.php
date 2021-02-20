<?php
require_once('Controller.php');
require_once('../Models/Models_Admin.php');


class Controller_Admin extends Controller
{


public static function supp_image()
    {
        foreach ($_POST as $value) {
            if ($value == 'supprimer') 
            {
                break;
            }
            else
            {
                $admin = new Admin();
                unlink($value);
                $img_bdd  = $value;
                $nom_img_bdd = explode("../medias/img_articles/", $img_bdd);
                $admin->delete_image($nom_img_bdd);
            }
        }
    }


public static function changement_nom_categorie()
    {
            $admin = new Admin();
            
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
    }




public static function update_un_article($donnees,$req_categorie,$req_marques,$req_img_article,$req_type_balle,$req_conditionnement_balle,$req_sous_cat_accessoires)


    {
                
        $admin = new Admin();
        if($_GET['idcat'] == 1){

            View_Admin_Update::affiche_details_et_form_update_raquette($donnees,$req_categorie,$req_marques,$req_img_article);
            if (@$_POST['submit'] )
                {
                $admin->update_raquette($donnees);
                
                header('Location: messages_et_redirections/article_modifie.php');
                exit();
            
                }
        }

        if($_GET['idcat'] == 2){
            
            View_Admin_Update::affiche_details_et_form_update_sacs($donnees,$req_categorie,$req_marques,$req_img_article);
            if (@$_POST['submit'] )
            {
            $admin->update_sacs($donnees);
            
            header('Location: messages_et_redirections/article_modifie.php');
            exit();

            }
        }

        if($_GET['idcat'] == 3){
            
            View_Admin_Update::affiche_details_et_form_update_cordage($donnees,$req_categorie,$req_marques,$req_img_article);
            if (@$_POST['submit'] )
            {
            $admin->update_cordage($donnees);
            
            header('Location: messages_et_redirections/article_modifie.php');
            exit();

            }
        }

        if($_GET['idcat'] == 4){

            $donnees = $admin->select_one_articles_updates_balle();
            View_Admin_Update::affiche_details_et_form_update_balle($donnees,$req_categorie,$req_marques,$req_img_article,$req_type_balle,$req_conditionnement_balle);
            if (@$_POST['submit'] )
            {
            $admin->update_balle($donnees);
            
            header('Location: messages_et_redirections/article_modifie.php');
            exit();

            }
        }

        if($_GET['idcat'] == 5){

            $donnees = $admin->select_one_articles_update_accessoire();
            View_Admin_Update::affiche_details_et_form_update_accessoires($donnees,$req_categorie,$req_marques,$req_img_article,$req_sous_cat_accessoires);
            if (@$_POST['submit'] )
            {
                $admin->update_accessoire($donnees);
                
            header('Location: messages_et_redirections/article_modifie.php');
            exit();

            }
        }


        if (@$_POST['submit2'])
            {
                Controller_Admin::supp_image();
                header('Location: messages_et_redirections/article_modifie.php');
                exit();
        
            }
    }

}
