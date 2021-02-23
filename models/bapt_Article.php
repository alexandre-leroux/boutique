<?php

require_once("bapt_Model.php") ;

class Article extends Models {

    public function findAll(string $table, ?string $order = "")
    {
        $sql = "SELECT * FROM {$table} 
                    INNER JOIN images_articles
                        ON {$table}.id_{$table} = images_articles.id" ;

        if($order){
            $sql .= " ORDER BY " .$order;
        }

        $requete = $this->bdd->prepare($sql) ; 
        $requete->execute(); 

        return $requete->fetchAll();
    }
}



