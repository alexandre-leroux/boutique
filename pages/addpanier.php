<?php


require_once('../utils/autoload.php');
View_Navigation::affichage_navigation(@$repere_page_acceuil);
$panier = new Model_Panier();

if(isset($_GET['id']))
{
    $product = $panier->selectId("articles", $_GET['id']);
    if(empty($product)){?>
        <section class="section_add_panier">
            <h1>Ce produit n'existe pas</h1></br>
            <div>
                <a href="javascript:history.back()">Retourner à la boutique</a> 
            </div>
        </section>'
            <?php
    }
    // var_dump($product);
    $panier->add($product[0]->id_articles);
    ?>
        <section class="section_add_panier">
            <h1> le produit a bien été ajouter au panier ! </h1></br>
            <div>
                <a href="javascript:history.back()">Retourner à la boutique</a>
            </div>
            <div>
                 <a href="panier.php"> Voir le panier </a>
            </div>
        </section>'
            <?php

}
else{?>
    <section class="section_add_panier">
        <h1> Aucun produit n\'a été ajouter au panier !</h1></br>
        <div>
            <a href="javascript:history.back()">Retourner à la boutique</a> 
        </div>
    </section>'
        <?php
    die('Aucun produit n\'a été ajouter au panier') ; 
}



View_Footer::Footer(@$repere_page_acceuil);