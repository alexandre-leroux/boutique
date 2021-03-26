
<?php
session_start();
require_once('../utils/autoload.php');

$admin = new Model_Admin_Insert(); // Model
$form = new View_Admin_Insert(); // View 
$controller = new Controller_Admin_Insert(); // Controller 
View_Navigation::affichage_navigation(@$repere_page_acceuil);
    
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
    
    View_Footer::Footer(@$repere_page_acceuil);
?>


