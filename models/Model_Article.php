<?php

require_once("Model.php") ;

class Model_Article extends Model {

    /**
     * Renvoie un tableau avec les infos d'un article + son image principale 
     *
     * @param string|null $order
     * @param [type] $groupby
     * @return array
     */
    public function findAllArticles(?string $order, $groupby) 
    {
        $sql = "SELECT articles.id_articles,art_nom,art_courte_description,prix,id_marques,id_categorie,MIN(chemin)
                    FROM articles 
                        NATURAL JOIN images_articles"
        ;
        
        if($order){
            $sql .= $order;
            $sql .= $groupby ;
            // var_dump($sql);
        }
        else{
            $sql .= $groupby;
        }

        $requete = $this->bdd->prepare($sql) ; 
        $requete->execute(); 

        return $requete->fetchAll();
    }


    /**
     * Renvoie un tableau avec toutes les collones de l'article en fonction de son id
     *
     * @param [type] $id
     * @return void
     */
    public function findOneArticle($id){

        $requete = $this->bdd->prepare("SELECT id_articles,art_nom,marques_nom,id_marques,id_categorie,art_courte_description,art_description,prix,raq_poids,raq_tamis,raq_taille_manche,raq_equilibre,cor_jauge,sac_thermobag,acc_grip_eppaisseur,acc_grip_couleur
                                            FROM articles
                                                NATURAL JOIN marques
                                                WHERE id_articles = :id 
        "); 

        $requete->bindParam(':id', $id); 

        $requete->execute(); 

        return $requete->fetch(PDO::FETCH_ASSOC); 
    }

    /**
     * Renvoie un tableau des differents chemins d'images pour 1 article en fonction de son id 
     *
     * @param [type] $id
     * @return void
     */
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

    /**
     * Renvoie un tableau des infos + img pricipale, des articles de même cat que l'article en GET 
     *
     * @param array $tableau_article
     * @return void
     */
    public function findArticleSimilaires($tableau_article){
        $requete = $this->bdd->prepare("SELECT articles.id_articles,art_nom,prix, MIN(chemin) 
                                            FROM articles
                                                NATURAL JOIN images_articles
                                                        WHERE id_categorie = {$tableau_article['id_categorie']}
                                                            AND articles.id_articles <> {$tableau_article['id_articles']}
                                                                GROUP BY articles.id_articles,art_nom,prix
                                                                    LIMIT 5"
        );

        $requete->execute();

        return $requete->fetchAll();

    }


}



