<?php

require("../fonctions.php"); 

class Models {
    protected $bdd ;

    public function __construct(){
        $this->bdd = getPdo() ; 
    }

    public function display(string $table): array{
        $requete = $this->bdd->prepare("SELECT * FROM {$table} ") ;
        $requete->execute();
    
        return $requete->fetchAll(); 
    }
}