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
            // header('Location: messages_et_redirections/article_modifie.php');
            return $_GET['admin_message_update_article'] = 1;
            exit();
        }

        if (@$_POST['submit_marque']) {
            $admin->update_name_marque();
            // header('Location: messages_et_redirections/article_modifie.php');
            return $_GET['admin_message_update_article'] = 1;
            exit();
        }

        if (@$_POST['submit_sous_cat_acc']) {
            $admin->update_name_sous_act_acc();
            // header('Location: messages_et_redirections/article_modifie.php');
            return $_GET['admin_message_update_article'] = 1;
            exit();
        }

        if (@$_POST['submit_balle_type']) {
            $admin->update_name_type_balle();
            // header('Location: messages_et_redirections/article_modifie.php');
            return $_GET['admin_message_update_article'] = 1;
            exit();
        }
        if (@$_POST['submit_balle_conditionnement']) {
            $admin->update_name_balle_conditionnement();
            // header('Location: messages_et_redirections/article_modifie.php');
            return $_GET['admin_message_update_article'] = 1;
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

            if (@$_POST['submit'] AND $_GET['idcat'] == 1) {
                $admin->update_raquette($donnees);
 
            }
        


            if (@$_POST['submit'] AND $_GET['idcat'] == 2){
                $admin->update_sacs($donnees);

            }
        

            if (@$_POST['submit']  AND $_GET['idcat'] == 3) {

                    $admin->update_cordage($donnees);

            }

            if (@$_POST['submit']  AND $_GET['idcat'] == 4) {

                $donnees = $admin->select_one_articles_updates_balle();
                $admin->update_balle($donnees);
            }

            if (@$_POST['submit'] AND $_GET['idcat'] == 5) {

                $donnees = $admin->select_one_articles_update_accessoire();
    
                $admin->update_accessoire($donnees);
            }


            if (@$_POST['submit2']) {
                Controller_admin_Update::supp_image();
                // header('Location: messages_et_redirections/article_modifie.php');
                return $_GET['admin_message_update_article'] = 1;
                exit();
            }
    }


    public static function update_user($admin)
    {
        if (@$_POST['droit']) {
            $admin->update_droits_user('uti_droits');
            // header('Location: messages_et_redirections/user_modifie.php');
            return $_GET['admin_message_update_article'] = 1;
            exit();
        }
        if (@$_POST['nom']) {
            $admin->update_droits_user('uti_nom');
            // header('Location: messages_et_redirections/user_modifie.php');
            return $_GET['admin_message_update_article'] = 1;
            exit();
        }
        if (@$_POST['prenom']) {
            $admin->update_droits_user('uti_prenom');
            // header('Location: messages_et_redirections/user_modifie.php');
            return $_GET['admin_message_update_article'] = 1;
            exit();
        }
        if (@$_POST['email']) {
            $admin->update_droits_user('uti_mail');
            // header('Location: messages_et_redirections/user_modifie.php');
            return $_GET['admin_message_update_article'] = 1;
            exit();
        }
        if (@$_POST['tel']) {
            $admin->update_droits_user('uti_tel');
            // header('Location: messages_et_redirections/user_modifie.php');
            return $_GET['admin_message_update_article'] = 1;
            exit();
        }
        if (@$_POST['uti_rue']) {
            $admin->update_droits_user('uti_rue');
            // header('Location: messages_et_redirections/user_modifie.php');
            return $_GET['admin_message_update_article'] = 1;
            exit();
        }
        if (@$_POST['code_postal']) {
            $admin->update_droits_user('uti_code_postal');
            // header('Location: messages_et_redirections/user_modifie.php');
            return $_GET['admin_message_update_article'] = 1;
            exit();
        }
        if (@$_POST['ville']) {
            $admin->update_droits_user('uti_ville');
            // header('Location: messages_et_redirections/user_modifie.php');
            return $_GET['admin_message_update_article'] = 1;
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
                                 while
                                    (  

                                    ($nom_image = $_GET['id']."-".$a.".jpg" AND 
                                    $chemin_existants = $admin->Select_chemin_image($nom_image) == TRUE)
                                    OR
                                    ($nom_image = $_GET['id']."-".$a.".jpeg" AND 
                                    $chemin_existants = $admin->Select_chemin_image($nom_image) == TRUE)
                                    OR
                                    ($nom_image = $_GET['id']."-".$a.".png" AND 
                                    $chemin_existants = $admin->Select_chemin_image($nom_image) == TRUE)
                                    OR
                                    ($nom_image = $_GET['id']."-".$a.".gif" AND 
                                    $chemin_existants = $admin->Select_chemin_image($nom_image) == TRUE)

                                    )
                                    {
                                        $a++ ;
                                    }
                               
                                //  var_dump($a);
                      
                                //  var_dump($chemin_existants);

                                 $chemin = "../medias/img_articles/".$_GET['id']."-".$a.".".$extensionUpload;
                         
                                 $mouvement = move_uploaded_file($_FILES['image']['tmp_name'][$i], $chemin ); 
                               
                                 if($mouvement)
                                 {
                                    // $admin->insertImage($extensionUpload, $i);
                                    
                                    $admin-> ajout_image_updtae_article($extensionUpload, $a);
                                    // header('Location: messages_et_redirections/article_modifie.php');
                                    // exit();
                                $_GET['admin_message_update_article'] = 1;
                                    
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

            $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');

            $admin = new Model_Admin_Update;
            $id_art = $_GET['id'];
            $id_art2 = $_GET['id'];
            $chemin = $id_art.="-0.".$ext."";
            $image_nomme_100 = $id_art2.="-100.".$ext."";


                if(count($_POST)==2)
                    {
                        // recupération du chemin de l'image provenant de l'input, et ajout du point
                        $nom_image_selectionnee = key($_POST); $nom_image_selectionnee_reformate = str_replace('_','.',$nom_image_selectionnee);
                        
                        for($i = 0;  $i<=3; $i++ )
                        {   
                            // prépare la comparaison pour voir si l'image selectionnée n'est pas déjà la "0"
                            $chemin_a_trouver = $_GET['id']."-0.".$extensionsValides[$i];

                            if($nom_image_selectionnee_reformate != $chemin_a_trouver)
                                {//image différente de la "0", on entre dans le if



                                    for($a = 0; $a<=3; $a++ )
                                        {//boucle qui va cherche si il y a déjà une image "0", pour la renommer en "100" de façon provisoire
                                            $id_art_ext = $_GET['id']."-0.".$extensionsValides[$a]."";
                                            $id_art_ext_100 = $_GET['id']."-100.".$extensionsValides[$a]."";
                                            $chemin_existant_ext = $admin->SelectOne('images_articles','chemin',$id_art_ext);

                                            if($chemin_existant_ext)
                                                {//si image trouvée, elle est renommé en 100
                                                    rename("../medias/img_articles/".$id_art_ext."", "../medias/img_articles/".$_GET['id']."-100.".$extensionsValides[$a]."");
                                                    $admin->update_nom_chemin_image($id_art_ext,$id_art_ext_100);
                                                }
                                                        
                                        }       

                                    //une fois sorti de la boucle, on renomme l'image selectionnée en "0"
                                    rename("../medias/img_articles/".$nom_image_selectionnee_reformate."", "../medias/img_articles/".$_GET['id']."-0.".$ext."");
                                    $admin->update_nom_chemin_image($nom_image_selectionnee_reformate,$chemin);


                                    for($e = 0; $e<=3; $e++ )
                                        {//boucle pour vérifier si il y a une image provisoire "100", pour la renommer là ou il y a de la place
                                            $id_art_ext_100 = $_GET['id']."-100.".$extensionsValides[$e]."";
                                            
                                            if($image_100_existe = $admin->Select_chemin_image($id_art_ext_100))
                                                {
                                                    //on recupère l'extention de la photo "100"
                                                    $ext_image_100 = substr($image_100_existe[0]["chemin"],-3);

                                                    //double boucle pour checker cahque incrément avec chaque extention
                                                    for($d = 1; $d<50 ;$d++)
                                                        {
                                                           for (  $c = 0; $c<=3; $c++ )
                                                           {
                                                               $nom_image_remplacant_100 = $_GET['id']."-".$d.".".$extensionsValides[$c]."";

                                                              if( $chemin_existants = $admin->Select_chemin_image($nom_image_remplacant_100))

                                                                {
                                                                    $chemin_pas_libre = 1;
                                                                }

                                                              else
                                                                {
                                                                    $chemin_libre = 0 ; 
                                                                }
                                                           }
                                           
                                                               if(@$chemin_pas_libre == 1)
                                                               {
                                                                //on unset la variable pour repartir à 0 dans la boucle. Cette variable est un repère quand une image existante dans l'incrément existe
                                                                unset($chemin_pas_libre);
                                                                 
                                                               }
                                                               else
                                                               {
                                                                //la variable chein pas libre n'a pas été créée au tour de boucle, on lance le renommage de l'image
                                                                    $image_100_a_renommer = $_GET['id']."-100.".$ext_image_100."";
                                                                    $nouveau_nom_image = $_GET['id']."-".$d.".".$ext_image_100."";
                                                                    rename("../medias/img_articles/".$image_100_a_renommer."", "../medias/img_articles/".$nouveau_nom_image."");
                                                                    $admin->update_nom_chemin_image($image_100_a_renommer,$nouveau_nom_image);
                                                                   return $_GET['admin_message_update_article'] = 1;
                                                                   break 2;
                                                               }

                                                          
                                                        }
                                                } 

                                        }  
                                        return $_GET['admin_message_update_article'] = 1;    
                                    break 1;
                                }

                            else
                            {
                                return 'dejà image principale';
                                exit;
                            }    
                                
                        }
                    }

                else
                    {
                        return 'vous ne devez choisir qu\'une seule image';
                    }
    }
            


}

public static function delete_one_article()
{
    $admin = new Model_Admin_Update;
    if (@$_GET['id'])
    {
        var_dump('entre if');
        $id_article = $_GET['id'];
        $admin->DeleteOne('images_articles','id_articles',$id_article);
        $admin->DeleteOne('articles','id_articles',$id_article);
    }

}




            
}
