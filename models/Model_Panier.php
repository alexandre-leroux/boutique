<?php

require_once("Model.php") ;

class Panier extends Model {

    public function construct__(){
        if(!isset($_SESSION))
        {
            session_start(); 
        }
        if(!isset($_SESSION['panier'])){
            $_SESSION['panier'] = array(); 
        }
    }

    public function add($product_id) {
        $_SESSION['panier'][$product_id] = 1;
        var_dump($_SESSION['panier'][$product_id]) ;
    }

}