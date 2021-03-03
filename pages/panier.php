<?php

require_once("../models/Model_Panier.php");
require_once("../view/View_Panier.php"); 
require_once("../controllers/Controller_Panier.php");

$panier = new Panier(); // Model panier
$display = new viewPanier(); // View Panier 
$controller_panier = new controllerPanier();

var_dump($_SESSION);

$id_produit_panier = array_keys($_SESSION['panier']) ; // renvoie un tableau qui recup tous les id_articles de la session 
if(empty($id_produit_panier))
{
    $product = array(); 
    echo 'Le panier est vide ! <a href="boutique.php"> Revenir à la boutique </a>' ;
}
else{
    
    $implode = implode(",", $id_produit_panier);
    
    $product = $panier->findInfosArticlePanier($implode); // renvoie un tableau avec toutes les infos des articles dans le panier 
    
    $prix = 0 ;
    for($i = 0 ; isset($product[$i]) ; $i++ )
    {
        $prix = $prix + $product[$i]['prix'] * $_SESSION['panier'][$product[$i]['id_articles']] ; 
    } 
}

if(empty($_SESSION['panier']))
{
    $_SESSION['panier'] = array(); 
}
if(isset($_GET['del']))
{
    $controller_panier->deleteProduct($_GET['del']); 
}
if(isset($_GET['quantite_plus']))
{
    $controller_panier->addQuantite($_GET['quantite_plus']);
}
if(isset($_GET['quantite_moins']))
{
    $controller_panier->reduceQuantite($_GET['quantite_moins']);
}
?>

<html>
    <head><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></head>
</html>
<?php
$display->displayInfosPanier($product, @$prix); // Affiche ces infos 