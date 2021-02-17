<?php

require_once("bapt_Model.php") ;

class Admin extends Models {

    public function display(string $table){
        $requete = $this->bdd->prepare("SELECT * FROM {$table}") ;
        $requete->execute();
    
        return $requete->fetchAll(); 
    }

    public function insertArticle(): void  {
        $art_nom = htmlspecialchars($_POST['art_nom']); 
        $art_courte_description = htmlspecialchars($_POST['art_courte_description']); 
        $art_description = htmlspecialchars($_POST['art_description']); 
        $stock = htmlspecialchars($_POST['stock']); 
        $prix = htmlspecialchars($_POST['prix']);
        $categories = htmlspecialchars($_POST['cat']);
        $marques = htmlspecialchars($_POST['marques']);
        $id_sous_cat_acc = NULL; 
        // $raq_poids = NULL;
        // $raq_tamis = NULL;
        // $raq_taille_manche = NULL;
        // $raq_equilibre = NULL ;
        // $cor_jauge = NULL ; 
        // $sac_thermobag = NULL;
    
        $requete = $this->bdd->prepare("INSERT INTO articles (id_categorie,id_marques,id_sous_cat_acc,art_nom, art_courte_description, art_description,stock, prix, raq_poids,raq_tamis,raq_taille_manche,raq_equilibre,cor_jauge,sac_thermobag,bal_conditionnement,bal_type,acc_grip_eppaisseur,acc_grip_couleur)
                            VALUES (:id_categorie, :id_marques, :id_sous_cat_acc, :art_nom, :art_courte_description, :art_description, :stock, :prix, NULL ,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)"
        );
        
        $requete->bindParam(':id_categorie', $categories);
        $requete->bindParam(':id_marques', $marques);
        $requete->bindParam(':id_sous_cat_acc',$id_sous_cat_acc);
        $requete->bindParam(':art_nom',$art_nom);
        $requete->bindParam(':art_courte_description',$art_courte_description);
        $requete->bindParam(':art_description',$art_description);
        $requete->bindParam(':stock',$stock);
        $requete->bindParam(':prix',$prix);
    
        $requete->execute(); 
    }

    public function insertCordage(): void  {
        
        $id_sous_cat_acc = NULL; 
        $art_nom = htmlspecialchars($_POST['art_nom']); 
        $art_courte_description = htmlspecialchars($_POST['art_courte_description']); 
        $art_description = htmlspecialchars($_POST['art_description']); 
        $stock = htmlspecialchars($_POST['stock']); 
        $prix = htmlspecialchars($_POST['prix']);
        $categories = htmlspecialchars($_POST['cat']);
        $marques = htmlspecialchars($_POST['marques']);
        $raq_poids = NULL;
        $raq_tamis = NULL;
        $raq_taille_manche = NULL;
        $raq_equilibre = NULL ;
        $cor_jauge = $_POST['cor_jauge'] ; 
        $sac_thermobag = NULL;
        $bal_conditionnement = NULL ;
        $bal_type = NULL; 
        $acc_grip_eppaisseur = NULL;
        $acc_grip_couleur = NULL; 
    
        $requete = $this->bdd->prepare("INSERT INTO articles (id_categorie,id_marques,id_sous_cat_acc,art_nom, art_courte_description, art_description,stock, prix, raq_poids,raq_tamis,raq_taille_manche,raq_equilibre,cor_jauge,sac_thermobag,bal_conditionnement,bal_type,acc_grip_eppaisseur,acc_grip_couleur)
                            VALUES (:id_categorie, :id_marques, :id_sous_cat_acc, :art_nom, :art_courte_description, :art_description, :stock, :prix, :raq_poids ,:raq_tamis,:raq_taille_manche,:raq_equilibre,:cor_jauge,:sac_thermobag,:bal_conditionnement,:bal_type,:acc_grip_eppaisseur,:acc_grip_couleur)"
        );
        
        $requete->bindParam(':id_categorie', $categories);
        $requete->bindParam(':id_marques', $marques);
        $requete->bindParam(':id_sous_cat_acc',$id_sous_cat_acc);
        $requete->bindParam(':art_nom',$art_nom);
        $requete->bindParam(':art_courte_description',$art_courte_description);
        $requete->bindParam(':art_description',$art_description);
        $requete->bindParam(':stock',$stock);
        $requete->bindParam(':prix',$prix);
        $requete->bindParam(':raq_poids',$raq_poids);
        $requete->bindParam(':raq_tamis',$raq_tamis);
        $requete->bindParam(':raq_taille_manche',$raq_taille_manche);
        $requete->bindParam(':raq_equilibre',$raq_equilibre);
        $requete->bindParam(':cor_jauge',$cor_jauge);
        $requete->bindParam(':sac_thermobag',$sac_thermobag);
        $requete->bindParam(':bal_conditionnement',$bal_conditionnement);
        $requete->bindParam(':bal_type',$bal_type);
        $requete->bindParam(':acc_grip_eppaisseur',$acc_grip_eppaisseur);
        $requete->bindParam(':acc_grip_couleur',$acc_grip_couleur);
    
        $requete->execute(); 
    }

    

    public function getAllInfosArticle(): array{
    
        $requete = $this->bdd->prepare("SELECT * FROM articles ORDER BY id_articles DESC"); /* ORDER BY : Permet d'avoir l'id du dernier produit ajouter */
        $requete->execute();
    
        return $requete->fetch(PDO::FETCH_ASSOC); 
    
    }

    public function insertImage($extensionUpload, $i): void {

        $result = getAllInfosArticle();
        $nom = ''.$result['id_articles'].'-'.$i.'.'.$extensionUpload.''; 
    
        $requete = $this->bdd->prepare('INSERT INTO images_articles (id_articles, chemin)
                                    VALUES (:id_articles, :chemin)'
        );
        
        $requete->bindParam(':id_articles', $result['id_articles']);
        $requete->bindParam(':chemin',$nom);
    
        $requete->execute();
    
    }

}