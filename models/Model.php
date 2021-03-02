<?php

require_once("Database.php"); 

class Model extends Database {
    public $bdd ;

    public function __construct(){
        $this->bdd = Database::connection_bdd();
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