<?php

require_once("../models/Model.php") ;
require_once("../models/Model_Admin_Insert.php");

class Controller_Admin_Insert {

    public function checkImage($result,$admin){
        
        if(isset($_FILES['image']) AND !empty($_FILES['image']['name'])){
            // var_dump($_FILES['image']);
            for($i = 0 ; isset($_FILES['image']['size'][$i]) ; $i++)
            {   
                $tailleMax = 2097152; 
                $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
                if($_FILES['image']['size'][$i] <= $tailleMax)
                {
                     $extensionUpload = strtolower(substr(strrchr($_FILES['image']['name'][$i], '.'),1));
                     if(in_array($extensionUpload, $extensionsValides))
                     {
                         $chemin = "../medias/img_articles/".$result['id_articles']."-".$i.".".$extensionUpload;
                         $mouvement = move_uploaded_file($_FILES['image']['tmp_name'][$i], $chemin ); 
                         if($mouvement)
                         {
                            $admin->insertImage($extensionUpload, $i);
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

    public function generateTypeForm($form,$result_cat,$result_mar,$result_balle_conditionnement,$result_balle_type,$result_sous_cat_accessoires){
        if(isset($_POST['valider_cat']))
        {
            if($_POST['choix_cat'] == "raquette")
            {
                $_SESSION['cat'] = $_POST['choix_cat'];
                $form->generalForm($result_cat,$result_mar);
                $form->formRaquette();
            }
            elseif($_POST['choix_cat'] == "sacs")
            {
                $_SESSION['cat'] = $_POST['choix_cat'];
                $form->generalForm($result_cat,$result_mar);
                $form->formSac();
            }
            elseif($_POST['choix_cat'] == "cordage")
            {
                $_SESSION['cat'] = $_POST['choix_cat'];
                $form->generalForm($result_cat,$result_mar);
                $form->formCordage();
            }
            elseif($_POST['choix_cat'] == "balles")
            {
                $_SESSION['cat'] = $_POST['choix_cat'];
                $form->generalForm($result_cat,$result_mar);
                $form->formBalle($result_balle_conditionnement,$result_balle_type);
            }
            elseif($_POST['choix_cat'] == "accessoires")
            {
                $_SESSION['cat'] = $_POST['choix_cat'];
                $form->generalForm($result_cat,$result_mar);
                $form->formAccessoires($result_sous_cat_accessoires);
            }
            else{
                echo 'erreur' ;
            }
        }
    }

    public function insertArticle($admin){

        if(isset($_POST['valider']))
        {
            if($_SESSION['cat'] == "raquette")
            {
                $admin->insert(NULL,NULL,NULL,$_POST['raq_poids'],$_POST['raq_tamis'],$_POST['raq_taille_manche'],$_POST['raq_equilibre'],NULL,NULL,NULL,NULL);
                //$admin->insertTest();
                // echo 'ajout' ;
                // session_unset();
            }
            elseif($_SESSION['cat'] == "sacs")
            {
                $admin->insert(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,$_POST['choix_thermo'],NULL,NULL);
                // echo 'ajout' ;
                // session_unset();
            }
            elseif($_SESSION['cat'] == "cordage")
            {
                $admin->insert(NULL,NULL,NULL,NULL,NULL,NULL,NULL,$_POST['cor_jauge'],NULL,NULL,NULL);
                // echo 'ajout' ;
                // session_unset();
            }
            elseif($_SESSION['cat'] == "balles")
            {
                $admin->insert(NULL,$_POST['balle_type'],$_POST['balle_conditionnement'],NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
                // echo 'ajout' ;
                // session_unset();
            }
            elseif($_SESSION['cat'] == "accessoires")
            {
                if($_POST['id_sous_cat_acc'] == 1)
                {
                    $admin->insert(1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,$_POST['grip_eppaisseur'],$_POST['grip_couleur']);
                    // echo 'ajout' ;
                    // session_unset();
                }
                else{
                    $admin->insert(2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
                    // echo 'ajout' ;
                    // session_unset();
                }
            }

        }

    }
}