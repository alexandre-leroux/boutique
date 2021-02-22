
<?php
    session_start();
    //include("fonctions.php"); 
    require_once("models/bapt_Admin.php"); 
    require_once("view/bapt_View.php");
    require("controllers/bapt_Controller.php");

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
    elseif(isset($_POST['valider']) &&  $_SESSION['cat'] == "balles")
    {
        $admin->insert(NULL,$_POST['balle_type'],$_POST['balle_conditionnement'],NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
        echo 'ajout' ;
        session_unset();
    }
    elseif(isset($_POST['valider']) && $_SESSION['cat'] == "accessoires")
    {
        if($_POST['id_sous_cat_acc'] == 1)
        {
            $admin->insert(1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,$_POST['grip_eppaisseur'],$_POST['grip_couleur']);
            echo 'ajout' ;
            session_unset();
        }
        else{
            $admin->insert(2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
            echo 'ajout' ;
            session_unset();
        }
    }
    

    $result = $admin->getAllInfosArticle();
    //var_dump($result);

    $controller = new Controller(); 

    // Check du format des images + insert dans la bdd 

    $controller->checkImage($result);

    

?>


