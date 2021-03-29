<?php

require_once("../models/Model_Panier.php"); 
class Controller_Panier {

    public function deleteProduct($id){
        unset($_SESSION['panier'][@$id]) ;
        echo '<meta http-equiv="refresh" content="0;URL=panier.php">';
    }

    public function addQuantite($id){
        $_SESSION['panier'][$id]++ ;
        echo '<meta http-equiv="refresh" content="0;URL=panier.php">';
    }

    public function reduceQuantite($id){
        $_SESSION['panier'][$id]-- ;
        if($_SESSION['panier'][$id] == 0)
        {
            $_SESSION['panier'][$id] = 1; 
            echo '<meta http-equiv="refresh" content="0;URL=panier.php">';

        }
        else{
            echo '<meta http-equiv="refresh" content="0;URL=panier.php">';
        }
    }

    public function controlPanier(){
        if(empty($_SESSION['panier']))
        {
            $_SESSION['panier'] = array(); 
        }
        if(isset($_GET['del']))
        {
            $this->deleteProduct($_GET['del']); 
        }
        if(isset($_GET['quantite_plus']))
        {
            $this->addQuantite($_GET['quantite_plus']);
        }
        if(isset($_GET['quantite_moins']))
        {
            $this->reduceQuantite($_GET['quantite_moins']);
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

    public function testSession()
    {
        if(!isset($_SESSION['id_utilisateurs']))
        {
            // echo '<meta http-equiv="refresh" content="0s;URL=user_connexion.php">';
            header("Location: user_connexion.php");
        }
    }


    // public function addCommande($model,$product){
    //     if(isset($_POST['validation_panier']))
    //     {
    //         $model->insertCommande($product);
    //     }
    // }

    // public function recupIdProduits(){
    //     foreach($_SESSION['panier'] as $key => $value)
    //     {
    //         return $key ; 
    //     }
    // }

}