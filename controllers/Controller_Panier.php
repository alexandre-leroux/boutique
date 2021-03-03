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


}