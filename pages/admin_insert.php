
<?php
    session_start();
    //include("fonctions.php"); 
    require_once("../models/bapt_Admin.php"); 
    require_once("../view/bapt_Form.php");
    require("../controllers/bapt_Admin_Controller.php");
    
    $admin = new Admin(); // Model
    $form = new Form(); // View 
    $controller = new Controller(); // Controller 

    $result_cat = $admin->display("categorie"); // renvoie un tableau de toutes les catégorie
    $result_mar = $admin->display("marques"); // renvoie un tableau de toutes les marques
    $result_balle_conditionnement = $admin->display("balle_conditionnement"); 
    $result_balle_type = $admin->display("balle_type"); 
    $result_sous_cat_accessoires = $admin->display("sous_cat_accessoires");

    // Choix de la catégorie de l'article à ajouter 
    $choix_cat = $form->selectTypeArticle();
    // Génère le bon formulaire pour chaque produits 
    $controller->generateTypeForm($form,$result_cat,$result_mar,$result_balle_conditionnement,$result_balle_type,$result_sous_cat_accessoires); 
    // On insère le produit dans la bdd
    $controller->insertArticle($admin);
    
    // renvoi un tableau avec toutes les infos du dernier article créé
    $result = $admin->getAllInfosArticle();
    //var_dump($result);

    // Check du format des images + insert dans la bdd 

    $controller->checkImage($result,$admin);

?>


