<?php

require_once('Model.php') ;

class Model_Panier extends Model {

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

    public function checkNumCommande(){
        $requete = $this->bdd->query("SELECT id_commande 
                                        FROM commandes
                                            ORDER BY id_commande DESC");
        $result = $requete->fetch(); 

        return $result; 
    }

    public function insertCommande(array $product){

        $commande = $this->checkNumCommande();
        $id_commande = $commande['id_commande'] + 1; 
        $i = 0 ; 

        foreach($_SESSION['panier'] as $key => $value)
        {
            // $cout_art = $prix[$i]['prix'] * $value; 
            $requete = $this->bdd->prepare("INSERT INTO commandes (id_commande, id_utilisateurs, id_articles, quantite, prix)
                                                VALUES (:id_commande, :id_utilisateurs, :id_articles, :quantite , :prix)
            ");
    
            $requete->bindParam(':id_commande', $id_commande); 
            $requete->bindParam(':id_utilisateurs', $_SESSION['id_utilisateurs'] ); 
            $requete->bindParam(':id_articles', $key ); 
            $requete->bindParam(':quantite', $value); 
            $requete->bindParam(':prix', $product[$i]['prix']) ;
            
            if(isset($_SESSION['id_utilisateurs']))
            {
                $requete->execute(); 
            }
            else{
                echo '<meta http-equiv="refresh" content="0;URL=../pages/user_connexion.php">';
            }
            
            $i++;
        }

        unset($_SESSION['panier']); 
        echo '<h1 class="redirection_achat">Merci pour votre achat ! Vous allez être redirigé vers la boutique</h1>';
        echo '<meta http-equiv="refresh" content="5s;URL=../index.php"> '; 
    }

    public function findInfosCommande($id){
        $requete = $this->bdd->prepare("SELECT id_commande,id_utilisateurs,commandes.id_articles,quantite,commandes.prix,art_nom 
                                            FROM commandes
                                                INNER JOIN articles
                                                    ON commandes.id_articles = articles.id_articles  
                                                    WHERE id_utilisateurs = :id
                                                    "); 

        $requete->bindParam(':id', $id); 

        $requete->execute(); 

        return $requete->fetchAll(PDO::FETCH_ASSOC); 
    }

}