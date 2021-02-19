<?php
require_once('Model.php');

class Admin extends Model
{



    public function select_all_articles_updates()
    {

        // si erreur sql, copier ça dans mysql, jusqu'au dernier ";" : SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY','')); | source: https://stackoverflow.com/questions/41887460/select-list-is-not-in-group-by-clause-and-contains-nonaggregated-column-inc
        $requete = $this->bdd->query("SELECT articles.*, MIN(chemin) FROM articles INNER JOIN images_articles ON articles.id_articles = images_articles.id_articles GROUP BY art_nom");
        return $requete->fetchall();
    }



    public  function select_one_articles_updates()
    {

        $requete = $this->bdd->prepare('SELECT * FROM articles  INNER JOIN marques ON articles.id_marques = marques.id_marques 
                                                                INNER JOIN categorie on articles.id_categorie = categorie.id_categorie         
                                                                WHERE id_articles = :id');
        $requete->execute(array('id' => $_GET['id']));
        return $requete->fetch();
    }



    public  function select_one_articles_updates_balle()
    {

        $requete = $this->bdd->prepare('SELECT * FROM articles  INNER JOIN marques ON articles.id_marques = marques.id_marques 
                                                                INNER JOIN categorie on articles.id_categorie = categorie.id_categorie 
                                                                INNER JOIN balle_type on articles.id_balle_type = balle_type.id_balle_type
                                                                INNER JOIN balle_conditionnement on articles.id_balle_conditionnement = balle_conditionnement.id_balle_conditionnement
                                                                WHERE id_articles = :id');
        $requete->execute(array('id' => $_GET['id']));
        return $requete->fetch();
    }




    public function update_raquette($donnees)
    {
        if (@$_POST['id_marques'] == NULL) {
            $_POST['id_marques'] = $donnees['id_marques'];
        }
        if (@$_POST['id_categorie'] == NULL) {
            $_POST['id_categorie'] = $donnees['id_categorie'];
        }
        $req_update = $this->bdd->prepare('UPDATE articles SET
                        art_nom = :art_nom,
                        id_categorie= :id_categorie,
                        id_marques= :id_marques,
                        art_nom = :art_nom,
                        art_courte_description = :resume,
                        art_description = :description,
                        stock = :stock,
                        prix = :prix,
                        raq_tamis = :tamis,
                        raq_poids = :poids,
                        raq_taille_manche = :manche, 
                        raq_equilibre = :equilibre                                                  
                                                    
                        WHERE id_articles = :id');
        $req_update->execute(array(
            'id_marques' => $_POST['id_marques'],
            'art_nom' => $_POST['nom'],
            'id_categorie' => $_POST['id_categorie'],
            'art_nom' => $_POST['nom'],
            'resume' => $_POST['resume'],
            'description' => $_POST['description'],
            'stock' => $_POST['stock'],
            'prix' => $_POST['prix'],
            'poids' => $_POST['poids'],
            'tamis' => $_POST['tamis'],
            'manche' => $_POST['manche'],
            'equilibre' => $_POST['equilibre'],
            'id' => $donnees['id_articles']
        ));
    }

    public function update_sacs($donnees)
    {
        if (@$_POST['id_marques'] == NULL) {
            $_POST['id_marques'] = $donnees['id_marques'];
        }
        if (@$_POST['id_categorie'] == NULL) {
            $_POST['id_categorie'] = $donnees['id_categorie'];
        }
        $req_update = $this->bdd->prepare('UPDATE articles SET
                        art_nom = :art_nom,
                        id_categorie= :id_categorie,
                        id_marques= :id_marques,
                        art_nom = :art_nom,
                        art_courte_description = :resume,
                        art_description = :description,
                        stock = :stock,
                        prix = :prix,
                        sac_thermobag = :thermobag                                           
                                                    
                        WHERE id_articles = :id');
        $req_update->execute(array(
            'id_marques' => $_POST['id_marques'],
            'art_nom' => $_POST['nom'],
            'id_categorie' => $_POST['id_categorie'],
            'art_nom' => $_POST['nom'],
            'resume' => $_POST['resume'],
            'description' => $_POST['description'],
            'stock' => $_POST['stock'],
            'prix' => $_POST['prix'],
            'thermobag' => $_POST['thermobag'],
            'id' => $donnees['id_articles']
        ));
    }

    public function update_cordage($donnees)
    {
        if (@$_POST['id_marques'] == NULL) {
            $_POST['id_marques'] = $donnees['id_marques'];
        }
        if (@$_POST['id_categorie'] == NULL) {
            $_POST['id_categorie'] = $donnees['id_categorie'];
        }
        $req_update = $this->bdd->prepare('UPDATE articles SET
                        art_nom = :art_nom,
                        id_categorie= :id_categorie,
                        id_marques= :id_marques,
                        art_nom = :art_nom,
                        art_courte_description = :resume,
                        art_description = :description,
                        stock = :stock,
                        prix = :prix,
                        cor_jauge = :jauge                                           
                                                    
                        WHERE id_articles = :id');
        $req_update->execute(array(
            'id_marques' => $_POST['id_marques'],
            'art_nom' => $_POST['nom'],
            'id_categorie' => $_POST['id_categorie'],
            'art_nom' => $_POST['nom'],
            'resume' => $_POST['resume'],
            'description' => $_POST['description'],
            'stock' => $_POST['stock'],
            'prix' => $_POST['prix'],
            'jauge' => $_POST['jauge'],
            'id' => $donnees['id_articles']
        ));
    }

    public function update_balle($donnees)
    {
        if (@$_POST['id_marques'] == NULL) {
            $_POST['id_marques'] = $donnees['id_marques'];
        }
        if (@$_POST['id_categorie'] == NULL) {
            $_POST['id_categorie'] = $donnees['id_categorie'];
        }
        $req_update = $this->bdd->prepare('UPDATE articles SET
                        art_nom = :art_nom,
                        id_categorie= :id_categorie,
                        id_marques= :id_marques,
                        art_nom = :art_nom,
                        art_courte_description = :resume,
                        art_description = :description,
                        stock = :stock,
                        prix = :prix,
                        id_balle_type = :id_balle_type,
                        id_balle_conditionnement = :id_balle_conditionnement                      
                                                    
                        WHERE id_articles = :id');
        $req_update->execute(array(
            'id_marques' => $_POST['id_marques'],
            'art_nom' => $_POST['nom'],
            'id_categorie' => $_POST['id_categorie'],
            'art_nom' => $_POST['nom'],
            'resume' => $_POST['resume'],
            'description' => $_POST['description'],
            'stock' => $_POST['stock'],
            'prix' => $_POST['prix'],
            'id_balle_type' => $_POST['balle_type'],
            'id_balle_conditionnement' => $_POST['balle_conditionnement'],
            'id' => $donnees['id_articles']
        ));
    }
    


    public function update_name_categorie()
    {

        $req_update = $this->bdd->prepare('UPDATE categorie SET
                        categorie_type = :cat      
                        WHERE id_categorie = :id');
        $req_update->execute(array(
            'cat' => $_POST['new_nom_categorie'],
            'id' => $_POST['id_categorie']
        ));
    }

    public function update_name_marque()
    {

        $req_update = $this->bdd->prepare('UPDATE marques SET
                        marques_nom = :nom      
                        WHERE id_marques = :id');
        $req_update->execute(array(
            'nom' => $_POST['new_nom_marque'],
            'id' => $_POST['id_marques']
        ));
    }

    public function select_images($donnees)
    {
        $req_img_article = $this->bdd->query("select * FROM images_articles WHERE id_articles = {$donnees['id_articles']}");
        return $req_img_article->fetchall();
    }


    public  function delete_image($nom_img_bdd)
    {
        $this->bdd->query("DELETE FROM images_articles WHERE chemin = '{$nom_img_bdd[1]}' ");
    }
}
