<?php
require_once('Controller.php');
require_once('../Models/Models_Admin.php');


class Controller_Admin extends Controller
{


    public static function supp_image()
    {
        foreach ($_POST as $value) {
            if ($value == 'supprimer') {
                break;
            } else {
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




    public static function update_un_article($donnees, $req_categorie, $req_marques, $req_img_article, $req_type_balle, $req_conditionnement_balle, $req_sous_cat_accessoires)


    {

        $admin = new Admin();
        if ($_GET['idcat'] == 1) {

            View_Admin_Update::affiche_details_et_form_update_raquette($donnees, $req_categorie, $req_marques, $req_img_article);
            if (@$_POST['submit']) {
                $admin->update_raquette($donnees);

                header('Location: messages_et_redirections/article_modifie.php');
                exit();
            }
        }

        if ($_GET['idcat'] == 2) {

            View_Admin_Update::affiche_details_et_form_update_sacs($donnees, $req_categorie, $req_marques, $req_img_article);
            if (@$_POST['submit']) {
                $admin->update_sacs($donnees);

                header('Location: messages_et_redirections/article_modifie.php');
                exit();
            }
        }

        if ($_GET['idcat'] == 3) {

            View_Admin_Update::affiche_details_et_form_update_cordage($donnees, $req_categorie, $req_marques, $req_img_article);
            if (@$_POST['submit']) {
                $admin->update_cordage($donnees);

                header('Location: messages_et_redirections/article_modifie.php');
                exit();
            }
        }

        if ($_GET['idcat'] == 4) {

            $donnees = $admin->select_one_articles_updates_balle();
            View_Admin_Update::affiche_details_et_form_update_balle($donnees, $req_categorie, $req_marques, $req_img_article, $req_type_balle, $req_conditionnement_balle);
            if (@$_POST['submit']) {
                $admin->update_balle($donnees);

                header('Location: messages_et_redirections/article_modifie.php');
                exit();
            }
        }

        if ($_GET['idcat'] == 5) {

            $donnees = $admin->select_one_articles_update_accessoire();
            View_Admin_Update::affiche_details_et_form_update_accessoires($donnees, $req_categorie, $req_marques, $req_img_article, $req_sous_cat_accessoires);
            if (@$_POST['submit']) {
                $admin->update_accessoire($donnees);

                header('Location: messages_et_redirections/article_modifie.php');
                exit();
            }
        }


        if (@$_POST['submit2']) {
            Controller_Admin::supp_image();
            header('Location: messages_et_redirections/article_modifie.php');
            exit();
        }
    }


    public static function update_user($admin)
    {
        if (@$_POST['droit']) {
            $admin->update_droits_user('uti_droits');
            header('Location: messages_et_redirections/user_modifie.php');
            exit();
        }
        if (@$_POST['nom']) {
            $admin->update_droits_user('uti_nom');
            header('Location: messages_et_redirections/user_modifie.php');
            exit();
        }
        if (@$_POST['prenom']) {
            $admin->update_droits_user('uti_prenom');
            header('Location: messages_et_redirections/user_modifie.php');
            exit();
        }
        if (@$_POST['email']) {
            $admin->update_droits_user('uti_mail');
            header('Location: messages_et_redirections/user_modifie.php');
            exit();
        }
        if (@$_POST['tel']) {
            $admin->update_droits_user('uti_tel');
            header('Location: messages_et_redirections/user_modifie.php');
            exit();
        }
        if (@$_POST['uti_rue']) {
            $admin->update_droits_user('uti_rue');
            header('Location: messages_et_redirections/user_modifie.php');
            exit();
        }
        if (@$_POST['code_postal']) {
            $admin->update_droits_user('uti_code_postal');
            header('Location: messages_et_redirections/user_modifie.php');
            exit();
        }
        if (@$_POST['ville']) {
            $admin->update_droits_user('uti_ville');
            header('Location: messages_et_redirections/user_modifie.php');
            exit();
        }
    }

    public static function connexion()
        {
            $admin = new Admin();

            if(isset($_POST['valider']))
            {
                $mail = htmlspecialchars($_POST['mail']) ;
                $pass = htmlspecialchars($_POST['pass']);

                if(!empty($mail) && !empty($pass))
                {
                    $result = $admin->select_mail_connexion($mail);
                    
                    if($result AND  password_verify($pass, $result['uti_motdepasse'] ))
                    {
                        echo 'connecté';
                        $_SESSION['id_utilisateurs'] = $result['id_utilisateurs'];
                        $_SESSION['uti_droits'] = $result['uti_droits'];
                        $_SESSION['uti_nom'] = $result['uti_nom'];
                        $_SESSION['uti_prenom'] = $result['uti_prenom'];
                        $_SESSION['uti_mail'] = $result['uti_mail'];
                        $_SESSION['uti_tel'] = $result['uti_tel'];
                        $_SESSION['uti_rue'] = $result['uti_rue'];
                        $_SESSION['uti_code_postal'] = $result['uti_code_postal'];
                        $_SESSION['uti_ville'] = $result['uti_ville'];
                        echo '<pre>';
                        var_dump($_SESSION);
                        echo '</pre>';
                        }


                    else{
                        return 'Login ou mot de passe incorrect' ;
                    }
                }
                else{
                    return 'Veuillez remplir tous les champs'; 
                }
            }
        }

        public static function inscription()
            {  
                global $error_mdp;
                global $error_mail_pris;

                if(@$_POST['valider'])
                {
                
                    $admin = new Admin();
                    $result = $admin->recherche_mail_existant();

                    if ($result == null)
                        {

                            if(($_POST['mdp'] == $_POST['confirm_pass']) &&  preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$#',$_POST['mdp'])  ){
                    
                                $admin->inscription_user();
                                header('Location: messages_et_redirections/inscription_reussie.php');
                                exit();
                                }
                    
                            else{ return  $error_mdp = 'Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un caractère spécial et un chiffre';}
                    
                        
                        }
                    else
                    { return  $error_mail_pris = 'email déjà utilisé';}

                }
            }
}
