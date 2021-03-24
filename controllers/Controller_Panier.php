<?php

require_once("../models/Model_Panier.php"); 
class Controller_Panier {

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

    public function addCommande($model,$product){
        if(isset($_POST['validation_panier']))
        {
            $model->insertCommande($product);
        }
    }

    // public function recupIdProduits(){
    //     foreach($_SESSION['panier'] as $key => $value)
    //     {
    //         return $key ; 
    //     }
    // }

}