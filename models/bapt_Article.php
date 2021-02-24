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

    public function findAllArticles(?string $order = "") : array
    {
        echo'jesuislà';
        $sql = "SELECT articles.id_articles,art_nom,art_courte_description,prix,chemin,id_marques,id_categorie
                    FROM articles 
                        INNER JOIN images_articles
                             ON articles.id_articles = images_articles.id_articles
                                WHERE articles.id_articles = images_articles.id_articles
                                    AND images_articles.chemin REGEXP '([0])' ";

        if($order){
            $sql .= $order;
        }

        $requete = $this->bdd->prepare($sql) ; 
        $requete->execute(); 

        return $requete->fetchAll();
    }

    public function findOneArticle($id){

        $requete = $this->bdd->prepare("SELECT art_nom,art_courte_description,art_description,prix,raq_poids,raq_tamis,raq_taille_manche,raq_equilibre,cor_jauge,sac_thermobag,acc_grip_eppaisseur,acc_grip_couleur
                                            FROM articles
                                                -- INNER JOIN images_articles
                                                --     ON articles.id_articles = images_articles.id_articles
                                                WHERE id_articles = :id 
        "); 

        $requete->bindParam(':id', $id); 

        $requete->execute(); 

        return $requete->fetch(PDO::FETCH_ASSOC); 
    }

    public function findImagesOneArticles($id)
    {
        $requete = $this->bdd->prepare("SELECT chemin 
                                            FROM images_articles 
                                                WHERE id_articles = :id"
        );

        $requete->bindParam(':id', $id); 

        $requete->execute(); 

        return $requete->fetchAll(PDO::FETCH_ASSOC); 
    }


}



