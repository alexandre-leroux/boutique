<?php
require_once('Model.php');

class Admin extends Model{



public function select_all_articles_updates()
{

// si erreur sql, copier ça dans mysql, jusqu'au dernier ";" : SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY','')); | source: https://stackoverflow.com/questions/41887460/select-list-is-not-in-group-by-clause-and-contains-nonaggregated-column-inc
    $requete = $this->bdd->query("SELECT articles.id_articles , art_nom, MIN(chemin) FROM articles INNER JOIN images_articles ON articles.id_articles = images_articles.id_articles GROUP BY art_nom");
    return $requete->fetchall();


}



public  function select_one_articles_updates()
{

    // mettre dans "where" l'id de l'article obtenu en $_GET
    $requete = $this->bdd->query('SELECT * FROM articles INNER JOIN marques ON articles.id_marques = marques.id_marques INNER JOIN categorie on articles.id_categorie = categorie.id_categorie  where id_articles = 1');
    return $requete->fetch();

}


}