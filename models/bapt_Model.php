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

    public function selectId(string $table, int $id){
        $requete = $this->bdd->prepare("SELECT id_articles 
                                            FROM {$table} 
                                                WHERE id_articles = :id
        ") ;

        $requete->bindParam(':id', $id) ;

        $requete->execute(); 

        return $requete->fetchAll( PDO::FETCH_OBJ);
    }
}