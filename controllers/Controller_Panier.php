<?php

class controllerPanier {

    public function deleteProduct($id){
        unset($_SESSION['panier'][$id]) ;
        header('Location: panier.php');
    }

    public function addQuantite($id){
        $_SESSION['panier'][$id]++ ;
        header('Location: panier.php');
    }

    public function reduceQuantite($id){
        $_SESSION['panier'][$id]-- ;
        if($_SESSION['panier'][$id] == 0)
        {
            $_SESSION['panier'][$id] = 1; 
            header('Location: panier.php');

        }
        else{
            header('Location: panier.php');
        }
    }

    public function calcPrixTotal($product){
        $prix = 0 ;
        for($i = 0 ; isset($product[$i]) ; $i++ )
        {
            $prix = $prix + $product[$i]['prix'] * $_SESSION['panier'][$product[$i]['id_articles']] ; 
        } 

        return $prix; 
    }


}