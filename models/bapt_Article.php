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

    public function displayAllArticles(?string $order = "")
    {
        $sql = "SELECT articles.id_articles,art_nom,art_courte_description,prix,chemin 
                    FROM articles 
                        INNER JOIN images_articles
                             ON articles.id_articles = images_articles.id_articles
                                WHERE articles.id_articles = images_articles.id_articles
                                    AND images_articles.chemin REGEXP '([0])' ";

        if($order){
            $sql .= " ORDER BY " .$order;
        }

        $requete = $this->bdd->prepare($sql) ; 
        $requete->execute(); 

        return $requete->fetchAll();
    }

}



