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



public function SelectAll($table)
{

    $requete = $this->bdd->query("SELECT * FROM {$table}");
    return $requete->fetchall();

}


// $id correspond à la clef primaire (id, id_articles, id_marques...Etc) et $id_objet à l'id du la valeur recherchée (8, 2, 12...Etc)
public function SelectOne($table,$id,$id_objet)
{

    $requete = $this->bdd->query("SELECT * FROM {$table} WHERE {$id} = '{$id_objet}'");
    return $requete->fetch();

}


// $id correspond à la clef primaire (id, id_articles, id_marques...Etc) et $id_objet à l'id du la valeur recherchée (8, 2, 12...Etc)
public function DeleteOne($table,$id,$id_objet)
{

    $this->bdd->query("DELETE FROM {$table} WHERE {$id} = {$id_objet}");

}


}