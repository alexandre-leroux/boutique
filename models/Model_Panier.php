<?php

require_once('Model.php') ;

class Panier extends Model {

    public function __construct(){
        parent::__construct();
        if(!isset($_SESSION))
        {
            session_start(); 
        }
        if(!isset($_SESSION['panier'])){
            $_SESSION['panier'] = array(); 
        }
    }

    public function selectId(string $table, int $id){
        $requete = $this->bdd->prepare("SELECT id_articles 
                                            FROM {$table} 
                                                WHERE id_articles = :id
        ") ;

        $requete->bindParam(':id', $id) ;

        $requete->execute(); 

        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    public function add($product_id) {
        if(isset($_SESSION['panier'][$product_id]))
        {
            $_SESSION['panier'][$product_id]++; 
        }
        else{

            $_SESSION['panier'][$product_id] = 1;
        }
        
    }

    public function findInfosArticlePanier($implode)
    {
        $requete = $this->bdd->prepare("SELECT id_articles,art_nom,prix,stock,MIN(chemin)
                                            FROM articles 
                                                NATURAL JOIN images_articles
                                                    WHERE id_articles 
                                                        IN ({$implode})
                                                            GROUP BY id_articles,art_nom,prix,stock
                                                              
        ");

        $requete->execute(); 

        return $requete->fetchAll(); 

    }


}