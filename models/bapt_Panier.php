<?php

require_once("bapt_Model.php") ;

class Panier extends Models {

    public function construct__(){
        if(!isset($_SESSION))
        {
            session_start(); 
        }
        if(!isset($_SESSION['panier'])){
            $_SESSION['panier'] = array(); 
        }
    }

    public function add($product_id){
        $_SESSION['panier'][$product_id] = 1; 
    }

}