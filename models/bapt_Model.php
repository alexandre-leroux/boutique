<?php

require("./fonctions.php"); 

class Models {
    protected $bdd ;

    public function __construct(){
        $this->bdd = getPdo() ; 
    }
}