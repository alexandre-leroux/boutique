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
        $_SESSION['panier'][$product_id] = 1;
        var_dump($_SESSION['panier'][$product_id]) ;
    }

    // public function findInfosArticlePanier()
    // {
    //     $this->bdd->prepare("SELECT * FROM articles WHERE id_article IN ('.implode(',',' ")
    // }

}