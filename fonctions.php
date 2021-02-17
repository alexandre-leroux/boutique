<?php

function getPdo(){
    $bdd = new PDO('mysql:host=localhost;dbname=boutique', "root", "");
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;

    return $bdd; 
}

function displayCat(): array{

    $bdd = getPdo();
    $requete = $bdd->prepare("SELECT * FROM categorie"); 
    $requete->execute();

    return $requete->fetchAll(); 
}

function displayMarques(): array{

    $bdd = getPdo();
    $requete = $bdd->prepare("SELECT * FROM marques") ;
    $requete->execute();

    return $requete->fetchAll(); 
}

function insertArticle(): void  {
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

    $bdd = getPdo();
    $requete = $bdd->prepare("INSERT INTO articles (id_categorie,id_marques,id_sous_cat_acc,art_nom, art_courte_description, art_description,stock, prix, raq_poids,raq_tamis,raq_taille_manche,raq_equilibre,cor_jauge,sac_thermobag,bal_conditionnement,bal_type,acc_type,acc_grip_eppaisseur,acc_grip_couleur)
                        VALUES (:id_categorie, :id_marques, :id_sous_cat_acc, :art_nom, :art_courte_description, :art_description, :stock, :prix, NULL ,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)"
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

function getAllInfosArticle(): array{
    $bdd = getPdo() ;

    $requete = $bdd->prepare("SELECT * FROM articles ORDER BY id_articles DESC"); /* ORDER BY : Permet d'avoir l'id du dernier produit ajouter */
    $requete->execute();

    return $requete->fetch(PDO::FETCH_ASSOC); 

}

function isertImage($extensionUpload, $i): void {
    $bdd = getPdo(); 
    $result = getAllInfosArticle();
    $nom = ''.$result['id_articles'].'-'.$i.'.'.$extensionUpload.''; 

    $requete = $bdd->prepare('INSERT INTO images_articles (id_articles, chemin)
                                VALUES (:id_articles, :chemin)'
    );
    
    $requete->bindParam(':id_articles', $result['id_articles']);
    $requete->bindParam(':chemin',$nom);

    $requete->execute();

}

// function selectCat(){
//     $bdd = getPdo();

//     if($_POST)
// }