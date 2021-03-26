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



    public function select_all_articles_mis_en_avant()
    {
        $requete = $this->bdd->query("  SELECT articles.id_articles,articles.art_nom,articles.id_categorie,articles.id_sous_cat_acc,articles.art_courte_description,articles.prix,articles.stock, MIN(chemin)
                                        FROM articles
                                        LEFT JOIN images_articles ON articles.id_articles = images_articles.id_articles  
                                        GROUP BY articles.id_articles,articles.art_nom,articles.id_categorie,articles.id_sous_cat_acc,articles.art_courte_description,articles.prix,articles.stock LIMIT 8
                                        ");
        return $requete->fetchall();
    }


}