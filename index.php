
<?php

$bdd = new PDO('mysql:host=localhost;dbname=boutique', "root", "");
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;

var_dump($bdd);

$requete = $bdd->prepare("SELECT * FROM categorie"); 
$requete->execute();

$result_cat = $requete->fetchAll(); 

$requete = $bdd->prepare("SELECT * FROM marques") ;
$requete->execute();

$result_mar = $requete->fetchAll(); 

var_dump($result_mar); 

if(isset($_POST['valider'])){
    
    $art_nom = htmlspecialchars($_POST['art_nom']); 
    $art_courte_description = htmlspecialchars($_POST['art_courte_description']); 
    $art_description = htmlspecialchars($_POST['art_description']); 
    $stock = htmlspecialchars($_POST['stock']); 
    $prix = htmlspecialchars($_POST['prix']);
    $id_sous_cat_acc = NULL; 
    // $raq_poids = NULL;
    // $raq_tamis = NULL;
    // $raq_taille_manche = NULL;
    // $raq_equilibre = NULL ;
    // $cor_jauge = NULL ; 
    // $sac_thermobag = NULL;
    
    $requete = $bdd->prepare('INSERT INTO articles (id_categorie,id_marques,id_sous_cat_acc,art_nom, art_courte_description, art_description, stock, prix, raq_poids,raq_tamis,raq_taille_manche,raq_equilibre,cor_jauge,sac_thermobag,bal_conditionnement,bal_type,acc_type,acc_grip_eppaisseur,acc_grip_couleur)
                        VALUES (:id_categorie,:id_marques,:id_sous_cat_acc,:art_nom, :art_courte_description , :art_description, :stock, :prix , NULL ,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)'
    );
    
    $requete->bindParam(':id_categorie', $result_cat[0]['id_categorie']);
    $requete->bindParam(':id_marques', $result_mar[0]['id_marques']);
    $requete->bindParam(':id_sous_cat_acc',$id_sous_cat_acc);
    $requete->bindParam(':art_nom',$art_nom);
    $requete->bindParam(':art_courte_description',$art_courte_description);
    $requete->bindParam(':art_description',$art_description);
    $requete->bindParam(':stock',$stock);
    $requete->bindParam(':prix',$prix);

    $requete->execute(); 
}


?>

<html>
    <head>
        <meta charset='utf-8'>
        <title> Page insert admin </title>
    <head>    

    <body>
        <form action="index.php" method="POST">
        
        <label for="name">Nom du produit :</label>
        <input type="text" id="name" name="art_nom" required>

        </br>

        <label for="courte_description">Courte description :</label>
        <input type="text" id="courte_description" name="art_courte_description" required>

        </br>

        <label for="description"> Description : </label>
        <textarea id="description" name="art_description"></textarea>

        </br>

        <label for="marques"> Marques : </label>
        <select name="marques" id="marques">
            <option disabled selected="selected">Marques</option>
            <?php
            foreach($result_mar as $value){
                ?>
            <option value="marque"><?= $value['marques_nom'] ; ?></option>
            <?php
            }
            ?>
        </select>

        </br>

        <label for="categorie"> Catégorie : </label>
        <select name="marques" id="categorie">
            <option value="" disabled selected="selected" >Categorie</option>
            <?php
                foreach($result_cat as $value){
                    ?>
            <option value="cat"><?= $value['categorie_type'] ; ?></option>
            <?php
                }
                ?>
        </select>

        </br>

        <label for="stock">Stock :</label>
        <input type="number" id="stock" name="stock" required>

        </br>

        <label for="prix">Prix :</label>
        <input type="number" id="prix" name="prix" required>

        </br>

        <input type="submit" value="Envoyer" name="valider">
       
        </form>    
    <body>    
</html>    
