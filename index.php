
<?php
    session_start();
    //include("fonctions.php"); 
    require_once("models/bapt_Admin.php"); 
    require_once("view/bapt_View.php");

    $admin = new Admin(); 
    $form = new Form();

    $result_cat = $admin->display("categorie"); // renvoie un tableau de toutes les catégorie
    $result_mar = $admin->display("marques"); // renvoie un tableau de toutes les marques
    $result_balle_conditionnement = $admin->display("balle_conditionnement"); 
    $result_balle_type = $admin->display("balle_type"); 
    $result_sous_cat_accessoires = $admin->display("sous_cat_accessoires");

    // Choix de la la catégorie pour générer le bon form 
    $choix_cat = $form->selectTypeArticle();

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
        else{
            echo 'erreur' ;
        }
    }

    var_dump($_SESSION['cat']);

    if(isset($_POST['valider']) && $_SESSION['cat'] == "raquette")
    {
        $admin->insert(NULL,NULL,NULL,$_POST['raq_poids'],$_POST['raq_tamis'],$_POST['raq_taille_manche'],$_POST['raq_equilibre'],NULL,NULL,NULL,NULL);
        //$admin->insertTest();
        echo 'ajout' ;
        session_unset();
    }
    elseif(isset($_POST['valider']) &&  $_SESSION['cat'] == "sacs")
    {
        $admin->insert(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,$_POST['choix_thermo'],NULL,NULL);
        echo 'ajout' ;
        session_unset();
    }
    elseif(isset($_POST['valider']) &&  $_SESSION['cat'] == "cordage")
    {
        $admin->insert(NULL,NULL,NULL,NULL,NULL,NULL,NULL,$_POST['cor_jauge'],NULL,NULL,NULL);
        echo 'ajout' ;
        session_unset();
    }
    


    
    $result = $admin->getAllInfosArticle();
    //var_dump($result);

    if(isset($_FILES['image']) AND !empty($_FILES['image']['name'])){
        var_dump($_FILES['image']);
        for($i = 0 ; isset($_FILES['image']['size'][$i]) ; $i++)
        {   
            $tailleMax = 2097152; 
            $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
            if($_FILES['image']['size'][$i] <= $tailleMax)
            {
                 $extensionUpload = strtolower(substr(strrchr($_FILES['image']['name'][$i], '.'),1));
                 if(in_array($extensionUpload, $extensionsValides))
                 {
                     $chemin = "medias/img_articles/".$result['id_articles']."-".$i.".".$extensionUpload;
                     $mouvement = move_uploaded_file($_FILES['image']['tmp_name'][$i], $chemin ); 
                     if($mouvement)
                     {
                         var_dump($_FILES['image']['name'][$i]); 
                         $admin->insertImage($extensionUpload, $i);
                     }
                     else{
                         echo "Erreur durant l'importation du fichier"; 
                     }
                 }
                 else{
                     echo "Votre image doit etre au format jpg, jpeg, gif ou png" ;
                 }
            }
            else{
                echo "L'image ne dois pas dépasser 2mo" ; 
            }

        }
    }
    

?>


