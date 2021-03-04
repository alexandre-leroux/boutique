<?php
require_once('Model.php');

class Model_Admin_Update extends Model
{



    public function select_all_articles_updates()
    {
        $requete = $this->bdd->query("  SELECT articles.id_articles,articles.art_nom,articles.id_categorie,articles.id_sous_cat_acc, MIN(chemin)
                                        FROM articles 
                                        LEFT JOIN images_articles ON articles.id_articles = images_articles.id_articles
                                        GROUP BY articles.id_articles,articles.art_nom,articles.id_categorie,articles.id_sous_cat_acc");
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

    public  function select_one_articles_update_accessoire()
    {

        $requete = $this->bdd->prepare('SELECT * FROM articles  INNER JOIN marques ON articles.id_marques = marques.id_marques 
                                                                INNER JOIN categorie on articles.id_categorie = categorie.id_categorie    
                                                                INNER JOIN sous_cat_accessoires on articles.id_sous_cat_acc = sous_cat_accessoires.id_sous_cat_accessoires        
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
        if (@$_POST['balle_type'] == NULL) {
            $_POST['balle_type'] = $donnees['id_balle_type'];
        }
        if (@$_POST['balle_conditionnement'] == NULL) {
            $_POST['balle_conditionnement'] = $donnees['id_balle_conditionnement'];
        }
        $req_update = $this->bdd->prepare('UPDATE articles SET
                        art_nom = :art_nom,
                        id_categorie= :id_categorie,
                        id_marques= :id_marques,
                        art_courte_description = :resume,
                        art_description = :description,
                        stock = :stock,
                        prix = :prix,
                        id_balle_type = :id_balle_type,
                        id_balle_conditionnement = :id_balle_conditionnement                                                                      
                        WHERE id_articles = :id');
        $req_update->execute(array(
            'art_nom' => $_POST['nom'],
            'id_categorie' => $_POST['id_categorie'],
            'id_marques' => $_POST['id_marques'],
            'resume' => $_POST['resume'],
            'description' => $_POST['description'],
            'stock' => $_POST['stock'],
            'prix' => $_POST['prix'],
            'id_balle_type' => $_POST['balle_type'],
            'id_balle_conditionnement' => $_POST['balle_conditionnement'],
            'id' => $donnees['id_articles']
        ));
    }


    public function update_accessoire($donnees)
    {
        if (@$_POST['id_marques'] == NULL) {
            $_POST['id_marques'] = $donnees['id_marques'];
        }
        if (@$_POST['id_categorie'] == NULL) {
            $_POST['id_categorie'] = $donnees['id_categorie'];
        }
        if (@$_POST['sous_cat_acc'] == NULL) {
            $_POST['sous_cat_acc'] = $donnees['id_sous_cat_accessoires'];
        }

        $req_update = $this->bdd->prepare('UPDATE articles SET
                        art_nom = :art_nom,
                        id_categorie= :id_categorie,
                        id_marques= :id_marques,
                        art_courte_description = :resume,
                        art_description = :description,
                        stock = :stock,
                        prix = :prix,
                        id_sous_cat_acc = :id_sous_cat_acc
                                                                    
                        WHERE id_articles = :id');
        $req_update->execute(array(
            'art_nom' => $_POST['nom'],
            'id_categorie' => $_POST['id_categorie'],
            'id_marques' => $_POST['id_marques'],
            'resume' => $_POST['resume'],
            'description' => $_POST['description'],
            'stock' => $_POST['stock'],
            'prix' => $_POST['prix'],
            'id_sous_cat_acc' => $_POST['sous_cat_acc'],

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
    public function update_name_sous_act_acc()
    {

        $req_update = $this->bdd->prepare('UPDATE sous_cat_accessoires SET
                        sous_cat_acc_type = :sous_cat_acc_type      
                        WHERE 	id_sous_cat_accessoires = :id');
        $req_update->execute(array(
            'sous_cat_acc_type' => $_POST['new_nom_sous_cat_acc'],
            'id' => $_POST['id_sous_cat_accessoires']
        ));
    }


    public function update_name_type_balle()
    {

        $req_update = $this->bdd->prepare('UPDATE balle_type SET
                        	balle_type = :balle_type      
                        WHERE 	id_balle_type = :id');
        $req_update->execute(array(
            'balle_type' => $_POST['balle_type'],
            'id' => $_POST['id_balle_type']
        ));
    }

    public function update_name_balle_conditionnement()
    {

        $req_update = $this->bdd->prepare('UPDATE balle_conditionnement SET
                        	balle_conditionnement = :balle_conditionnement      
                        WHERE id_balle_conditionnement = :id');
        $req_update->execute(array(
            'balle_conditionnement' => $_POST['balle_conditionnement'],
            'id' => $_POST['id_balle_conditionnement']
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



    public function update_droits_user($colonne)
        {
            $req_update = $this->bdd->prepare(' UPDATE utilisateurs
                                                SET '.$colonne.' = :'.$colonne.'      
                                                WHERE id_utilisateurs = :id_utilisateur');

            $req_update->execute(array( ''.$colonne.'' => $_POST[''.$colonne.''], 
                                        'id_utilisateur' => $_GET['id_utilisateur']
            ));
        }


    public function recherche_dans_articles($mot_cle)
        {
            $req_search = $this->bdd->query("   SELECT articles.id_articles,articles.art_nom,articles.id_categorie,articles.id_sous_cat_acc, min(chemin)
                                                FROM articles
                                                INNER JOIN images_articles ON articles.id_articles = images_articles.id_articles
                                                WHERE art_description LIKE '%$mot_cle%'
                                                GROUP BY articles.id_articles,articles.art_nom,articles.id_categorie,articles.id_sous_cat_acc ");
                                            
            return $req_search->fetchAll();
        }

    public function ajout_image_updtae_article($extensionUpload, $i)
        {
            $nom = ''.$_GET['id'].'-'.$i.'.'.$extensionUpload.''; 
            $requete = $this->bdd->prepare('INSERT INTO images_articles (id_articles, chemin)
            VALUES (:id_articles, :chemin)'
            );

            $requete->bindParam(':id_articles', $_GET['id']);
            $requete->bindParam(':chemin',$nom);

            $requete->execute();
        }
    

    public function Select_chemin_image($chemin)
        {

            $requete = $this->bdd->query("SELECT * FROM images_articles WHERE chemin = '{$chemin}'");
            return $requete->fetchall();

        }


    public function update_nom_chemin_image($chemin,$nouveau_chemin)
        {
            $req_update = $this->bdd->prepare('UPDATE images_articles 
                                               SET chemin = :nouveau_chemin      
                                                 WHERE chemin = :ancien_chemin');
            $req_update->execute(array(
            'nouveau_chemin' => $nouveau_chemin,
            'ancien_chemin' => $chemin
            ));
        }
}
