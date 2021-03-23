<?php

require_once("Model.php") ;


class Model_Admin_Insert extends Model {

    /**
     * Ajout d'une marque 
     *
     * @param [type] $marque
     * @return void
     */
    public function addMarque($marque){
        $requete = $this->bdd->prepare("INSERT INTO marques (marques_nom)
                                            VALUES (:marques_nom)"
        );
        $requete->bindParam(':marques_nom', $marque);
        $requete->execute();
    }

    /**
     * Insertion générique d'un produit 
     *
     * @param [type] $p_sous_cat
     * @param [type] $p_balle_type
     * @param [type] $p_balle_condi
     * @param [type] $p_poids
     * @param [type] $p_tamis
     * @param [type] $p_manche
     * @param [type] $p_equilibre
     * @param [type] $p_jauge
     * @param [type] $p_sac
     * @param [type] $p_ep
     * @param [type] $p_cou
     * @return void
     */
    public function insert($p_sous_cat, $p_balle_type, $p_balle_condi, $p_poids, $p_tamis, $p_manche, $p_equilibre, $p_jauge , $p_sac, $p_ep, $p_cou): void  {
        
        $categories = htmlspecialchars($_POST['cat']);
        $marques = htmlspecialchars($_POST['marques']);
        $id_sous_cat_acc = $p_sous_cat; 
        $id_bal_type = $p_balle_type ; 
        $id_bal_conditionnement = $p_balle_condi ;
        $art_nom = htmlspecialchars($_POST['art_nom']); 
        $art_courte_description = htmlspecialchars($_POST['art_courte_description']); 
        $art_description = htmlspecialchars($_POST['art_description']); 
        $stock = htmlspecialchars($_POST['stock']); 
        $prix = htmlspecialchars($_POST['prix']);
        $art_date = date("Y-m-d H:i:s"); 
        $raq_poids = $p_poids;
        $raq_tamis = $p_tamis;
        $raq_taille_manche = $p_manche;
        $raq_equilibre = $p_equilibre ;
        $cor_jauge = $p_jauge ; 
        $sac_thermobag = $p_sac;
        $acc_grip_eppaisseur = $p_ep;
        $acc_grip_couleur = $p_cou; 
       
        $requete = $this->bdd->prepare("INSERT INTO articles (id_categorie, id_marques, id_sous_cat_acc, id_balle_type, id_balle_conditionnement, art_nom, art_courte_description, art_description, stock, prix, art_date, raq_poids, raq_tamis, raq_taille_manche, raq_equilibre, cor_jauge, sac_thermobag, acc_grip_eppaisseur, acc_grip_couleur)
                            VALUES (:id_categorie, :id_marques, :id_sous_cat_acc, :id_balle_type, :id_balle_conditionnement, :art_nom, :art_courte_description, :art_description, :stock, :prix, :art_date, :raq_poids, :raq_tamis, :raq_taille_manche, :raq_equilibre, :cor_jauge, :sac_thermobag, :acc_grip_eppaisseur, :acc_grip_couleur)"
        );
        
        $requete->bindParam(':id_categorie', $categories);
        $requete->bindParam(':id_marques', $marques);
        $requete->bindParam(':id_sous_cat_acc',$id_sous_cat_acc);
        $requete->bindParam(':art_nom',$art_nom);
        $requete->bindParam(':art_courte_description',$art_courte_description);
        $requete->bindParam(':art_description',$art_description);
        $requete->bindParam(':stock',$stock);
        $requete->bindParam(':prix',$prix);
        $requete->bindParam(':art_date',$art_date);
        $requete->bindParam(':raq_poids',$raq_poids);
        $requete->bindParam(':raq_tamis',$raq_tamis);
        $requete->bindParam(':raq_taille_manche',$raq_taille_manche);
        $requete->bindParam(':raq_equilibre',$raq_equilibre);
        $requete->bindParam(':cor_jauge',$cor_jauge);
        $requete->bindParam(':sac_thermobag',$sac_thermobag);
        $requete->bindParam(':id_balle_conditionnement',$id_bal_conditionnement);
        $requete->bindParam(':id_balle_type',$id_bal_type);
        $requete->bindParam(':acc_grip_eppaisseur',$acc_grip_eppaisseur);
        $requete->bindParam(':acc_grip_couleur',$acc_grip_couleur);
   
        $requete->execute();
    }

    
    /**
     * Renvoie les informarmation du dernier article ajouté 
     *
     * @return array
     */
    public function getAllInfosArticle(): array{
    
        $requete = $this->bdd->prepare("SELECT * FROM articles ORDER BY id_articles DESC"); /* ORDER BY : Permet d'avoir l'id du dernier produit ajouter */
        $requete->execute();
    
        return $requete->fetch(PDO::FETCH_ASSOC); 
    
    }

    /**
     * Insertion d'une ou plusieurs images lors de l'ajout de l'article
     *
     * @param [type] $extensionUpload
     * @param [type] $i
     * @return void
     */
    public function insertImage($extensionUpload, $i): void {

        $result = $this->getAllInfosArticle();
        $nom = ''.$result['id_articles'].'-'.$i.'.'.$extensionUpload.''; 
    
        $requete = $this->bdd->prepare('INSERT INTO images_articles (id_articles, chemin)
                                    VALUES (:id_articles, :chemin)'
        );
        
        $requete->bindParam(':id_articles', $result['id_articles']);
        $requete->bindParam(':chemin',$nom);
    
        $requete->execute();
    
    }

}

