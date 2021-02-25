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

    public function findAllArticles(?string $order, $groupby) : array
    {
        $sql = "SELECT articles.id_articles,art_nom,art_courte_description,prix,id_marques,id_categorie,MIN(chemin)
                    FROM articles 
                        INNER JOIN images_articles
                             ON articles.id_articles = images_articles.id_articles
                                WHERE articles.id_articles = images_articles.id_articles
                                   " ;
        

        if($order){
            $sql .= $order;
            $sql .= $groupby ;
            var_dump($sql);
        }
        else{
            $sql .= $groupby;
        }

        $requete = $this->bdd->prepare($sql) ; 
        $requete->execute(); 

        return $requete->fetchAll();
    }


    public function findOneArticle($id){

        $requete = $this->bdd->prepare("SELECT id_articles,art_nom,id_categorie,art_courte_description,art_description,prix,raq_poids,raq_tamis,raq_taille_manche,raq_equilibre,cor_jauge,sac_thermobag,acc_grip_eppaisseur,acc_grip_couleur
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

    public function findArticleSimilaires(array $tableau_article){
        $requete = $this->bdd->prepare("SELECT articles.id_articles,art_nom,prix, MIN(chemin) 
                                            FROM articles
                                                INNER JOIN images_articles
                                                    ON articles.id_articles = images_articles.id_articles
                                                        WHERE id_categorie = {$tableau_article['id_categorie']}
                                                            AND articles.id_articles <> {$tableau_article['id_articles']}
                                                                GROUP BY art_nom,prix"
        );

        $requete->execute();

        return $requete->fetchAll();

    }


}



