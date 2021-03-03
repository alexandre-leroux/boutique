<?php
require_once('../Models/Model_Admin_Update.php');


class Controller_Admin_Update
{


    public static function supp_image()
    {
        foreach ($_POST as $value) {
            if ($value == 'supprimer') {
                break;
            } else {
                $admin = new Model_Admin_Update();
                unlink($value);
                $img_bdd  = $value;
                $nom_img_bdd = explode("../medias/img_articles/", $img_bdd);
                $admin->delete_image($nom_img_bdd);
            }
        }
    }


    public static function changement_nom_categorie()
    {
        $admin = new Model_Admin_Update();

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


    public static function recherche_dans_articles($mot_cle)
        {
            if(@$_POST['rechercher'])
            {
                $admin = new Model_Admin_Update();
               return $admin->recherche_dans_articles($mot_cle);
        
            
              }

        }


    public static function update_un_article($donnees, $req_categorie, $req_marques, $req_img_article, $req_type_balle, $req_conditionnement_balle, $req_sous_cat_accessoires,$erreur_choix_premiere_image)


    {

        $admin = new Model_Admin_Update();
        if ($_GET['idcat'] == 1) {

            View_Admin_Update::affiche_details_et_form_update_raquette($donnees, $req_categorie, $req_marques, $req_img_article,$erreur_choix_premiere_image);
            if (@$_POST['submit']) {
                $admin->update_raquette($donnees);

                header('Location: messages_et_redirections/article_modifie.php');
                exit();
            }
        }

        if ($_GET['idcat'] == 2) {

            View_Admin_Update::affiche_details_et_form_update_sacs($donnees, $req_categorie, $req_marques, $req_img_article,$erreur_choix_premiere_image);
            if (@$_POST['submit']) {
                $admin->update_sacs($donnees);

                header('Location: messages_et_redirections/article_modifie.php');
                exit();
            }
        }

        if ($_GET['idcat'] == 3) {

            View_Admin_Update::affiche_details_et_form_update_cordage($donnees, $req_categorie, $req_marques, $req_img_article,$erreur_choix_premiere_image);
            if (@$_POST['submit']) {
                $admin->update_cordage($donnees);

                header('Location: messages_et_redirections/article_modifie.php');
                exit();
            }
        }

        if ($_GET['idcat'] == 4) {

            $donnees = $admin->select_one_articles_updates_balle();
            View_Admin_Update::affiche_details_et_form_update_balle($donnees, $req_categorie, $req_marques, $req_img_article, $req_type_balle, $req_conditionnement_balle,$erreur_choix_premiere_image);
            if (@$_POST['submit']) {
                $admin->update_balle($donnees);

                header('Location: messages_et_redirections/article_modifie.php');
                exit();
            }
        }

        if ($_GET['idcat'] == 5) {

            $donnees = $admin->select_one_articles_update_accessoire();
            View_Admin_Update::affiche_details_et_form_update_accessoires($donnees, $req_categorie, $req_marques, $req_img_article, $req_sous_cat_accessoires,$erreur_choix_premiere_image);
            if (@$_POST['submit']) {
                $admin->update_accessoire($donnees);

                header('Location: messages_et_redirections/article_modifie.php');
                exit();
            }
        }


        if (@$_POST['submit2']) {
            Controller_admin_Update::supp_image();
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




    public static function ajouter_image_update_article()
        {
            if(@$_POST['ajout_photo'])
            {
                // var_dump($_FILES['image']);

                if(isset($_FILES['image']) AND !empty($_FILES['image']['name'])){
 

                    for($i = 0 ;  isset($_FILES['image']['size'][$i]) ; $i++ )
                    {  
                        $tailleMax = 2097152; 
                        $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
                        if($_FILES['image']['size'][$i] <= $tailleMax)

                        {
                             $extensionUpload = strtolower(substr(strrchr($_FILES['image']['name'][$i], '.'),1));
                             if(in_array($extensionUpload, $extensionsValides))
                             {
                                 $admin = new Model_Admin_Update;
                                 
                                 $a = 0;
                                 while(  
                                 $nom_image = $_GET['id']."-".$a.".".$extensionUpload AND 
                                 $chemin_existants = $admin->Select_chemin_image($nom_image) == TRUE)
                                 {
                                     $a++ ;
                                 }
                               
                                 var_dump($a);
                      
                                //  var_dump($chemin_existants);

                                 $chemin = "../medias/img_articles/".$_GET['id']."-".$a.".".$extensionUpload;
                         
                                 $mouvement = move_uploaded_file($_FILES['image']['tmp_name'][$i], $chemin ); 
                                 var_dump($i);
                                 if($mouvement)
                                 {
                                    // $admin->insertImage($extensionUpload, $i);
                                    
                                    $admin-> ajout_image_updtae_article($extensionUpload, $a);
                                    // header('Location: messages_et_redirections/article_modifie.php');
                                    // exit();
                                    
                                 }
                                 else{
                                    return "Erreur durant l'importation du fichier"; 
                                }
                             }
                             else{
                                return "Votre image doit etre au format jpg, jpeg, gif ou png" ;
                             }
                        }
                        else{
                            return "L'image ne dois pas dépasser 2mo" ; 
                        }
            
                    }
                }

            }
            else{return 'fail';}
        }
    
        
        
        public static function choisir_premiere_image()
        {
            
            
            if(@$_POST['photo_principale'])
            {
                    if( $extention = substr_count(key($_POST), 'jpg'))
                    {
                        $ext = 'jpg';
                    }
                    if( $extention = substr_count(key($_POST), 'jpeg'))
                    {
                        $ext = 'jpeg';
                    }
                    if( $extention = substr_count(key($_POST), 'gif'))
                    {
                        $ext = 'gif';
                    }
                    if( $extention = substr_count(key($_POST), 'png'))
                    {
                        $ext = 'png';
                    }


                    $admin = new Model_Admin_Update;
                    $id_art = $_GET['id'];
                    $id_art2 = $_GET['id'];
                    $chemin = $id_art.="-0.".$ext."";
                    $image_nomme_100 = $id_art2.="-100.".$ext."";


                        if(count($_POST)==2)
                            {
                                $nom_image_selectionnee = key($_POST);
                                $nom_image_selectionnee_reformate = str_replace('_','.',$nom_image_selectionnee);

                                if($nom_image_selectionnee_reformate != $chemin)
                                    {

                                    $chemin_existant = $admin->SelectOne('images_articles','chemin',$chemin);
                                
                                        if($chemin_existant)
                                            {
                                                rename("../medias/img_articles/".$chemin."", "../medias/img_articles/".$_GET['id']."-100.".$ext."");
                                                $admin->update_nom_chemin_image($chemin,$image_nomme_100);
                                            }
                                                    
                                                rename("../medias/img_articles/".$nom_image_selectionnee_reformate."", "../medias/img_articles/".$_GET['id']."-0.".$ext."");
                                                $admin->update_nom_chemin_image($nom_image_selectionnee_reformate,$chemin);

                                                if($image_100_existe = $admin->Select_chemin_image($image_nomme_100))
                                                    {
                                                        for
                                                            (  
                                                            $a = 0;
                                                            $nom_image_remplacant_100 = $_GET['id']."-".$a.".".$ext."" AND
                                                            $chemin_existants = $admin->Select_chemin_image($nom_image_remplacant_100);
                                                            $a++ 
                                                            )
                                                            {

                                                            }

                                                        rename("../medias/img_articles/".$image_nomme_100."", "../medias/img_articles/".$nom_image_remplacant_100."");
                                                        $admin->update_nom_chemin_image($image_nomme_100,$nom_image_remplacant_100);
                                                        // header('Location: messages_et_redirections/article_modifie.php');
                                                        // exit();
                                                    }
                                                var_dump('fini');   
                    
                                    }
                                else
                                    {
                                        return 'dejà image principale';
                                    }    
                                }

                            else
                            {
                                return 'vous ne devez choisir qu\'une seule image';
                            }
                    }
                    
         

                }

            
}
