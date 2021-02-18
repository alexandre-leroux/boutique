
<?php

//include("fonctions.php"); 
require_once("models/bapt_Admin.php"); 

$admin = new Admin(); 

$result_cat = $admin->display("categorie"); // renvoie un tableau de toutes les catégorie
$result_mar = $admin->display("marques"); // renvoie un tableau de toutes les marques
$result_balle_conditionnement = $admin->display("balle_conditionnement"); 
$result_balle_type = $admin->display("balle_type"); 
$result_sous_cat_accessoires = $admin->display("sous_cat_accessoires");


if(isset($_POST['valider'])){
    

    $admin->insert();

    $result = $admin->getAllInfosArticle();

    if(isset($_FILES['image']) AND !empty($_FILES['image']['name'])){
        var_dump($_FILES['image']);
        for($i = 0 ; isset($_FILES['image']['size'][$i]) ; $i++)
        {   
            $tailleMax = 2097152; 
            $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
            if($_FILES['image']['size'][$i] <= $tailleMax)
            {
                 $extensionUpload = strtolower(substr(strrchr($_FILES['image']['name'][$i], '.'),1));
                 if(in_array($extensionUpload, $extensionsValides))
                 {
                     $chemin = "medias/img_articles/".$result['id_articles']."-".$i.".".$extensionUpload;
                     $mouvement = move_uploaded_file($_FILES['image']['tmp_name'][$i], $chemin ); 
                     if($mouvement)
                     {
                         var_dump($_FILES['image']['name'][$i]); 
                         $admin->insertImage($extensionUpload, $i);
                     }
                     else{
                         echo "Erreur durant l'importation du fichier"; 
                     }
                 }
                 else{
                     echo "Votre image doit etre au format jpg, jpeg, gif ou png" ;
                 }
            }
            else{
                echo "L'image ne dois pas dépasser 2mo" ; 
            }

        }
    }
    
}


?>

<html>
    <head>
        <meta charset='utf-8'>
        <title> Page insert admin </title>
    <head>    

    <body>
        <form action="index.php" method="POST" enctype="multipart/form-data">
            
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
                <option value="<?= $value['id_marques']; ?>"><?= $value['marques_nom'] ; ?></option>
                <?php
                }
                ?>
            </select>

            </br>

            <label for="categorie"> Catégorie : </label>
            <select name="cat" id="categorie">
                <option value="" disabled selected="selected" >Categorie</option>
                <?php
                    foreach($result_cat as $value){
                        ?>
                <option value="<?= $value['id_categorie']; ?>"><?= $value['categorie_type'] ; ?></option>
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

            <label for="image"> Image : </label>
            <input id="image" type="file" name="image[]" multiple>

            </br>

            <p> Cordage : </p>
            <label for="jauge"> Jauge : </label>
            <input type="number" name="cor_jauge" id="jauge">
            
            <p> Sac : </p>
            <div>
                <input type="radio" id="choix_3" name="choix_thermo" value="3" checked>             
                <label for="choix_3">3</label>
            </div>

            <div>
                <input type="radio" id="choix_6" name="choix_thermo" value="6" checked>             
                <label for="choix_3">6</label>
            </div>

            <div>
                <input type="radio" id="choix_9" name="choix_thermo" value="9" checked>             
                <label for="choix_9">9</label>
            </div>

            <div>
                <input type="radio" id="choix_12" name="choix_thermo" value="12" checked>             
                <label for="choix_12">12</label>
            </div>

            <div>
                <input type="radio" id="choix_15" name="choix_thermo" value="15" checked>             
                <label for="choix_15">15</label>
            </div>

            <p> Raquette </p>
            <div>
                <label for="poids"> Poids : </label>
                <input type="number" name="raq_poids" id="poids">
            </div>

            <div>
                <label for="tamis"> Tamis : </label>
                <input type="number" name="raq_tamis" id="tamis">
            </div>

            <div>
                <label for="equilibre"> Equilibre : </label>
                <input type="number" name="raq_equilibre" id="equilibre">
            </div>

            <div>
                <label for="taille_manche"> Taille manche : </label>
                <input type="number" name="raq_taille_manche" id="taille_manche">
            </div>  

            <p> Balles </p>
            <div>        
                <label for="balle_conditionnement"> Conditionnement : </label>
                <select name="balle_conditionnement" id="balle_conditionnement">
                    <option value="" disabled selected="selected" >Conditionnement :</option>
                    <?php
                        foreach($result_balle_conditionnement as $value){
                            ?>
                    <option value="<?= $value['id_balle_conditionnement']; ?>"><?= $value['balle_conditionnement'] ; ?></option>
                    <?php
                        }
                        ?>
                </select>
            </div>

            <div>        
                <label for="balle_type"> Type : </label>
                <select name="balle_type" id="balle_type">
                    <option value="" disabled selected="selected" >Type :</option>
                    <?php
                        foreach($result_balle_type as $value){
                            ?>
                    <option value="<?= $value['id_balle_type']; ?>"><?= $value['balle_type'] ; ?></option>
                    <?php
                        }
                        ?>
                </select>
            </div>

            <p> Accessoires </p>
            <div>        
                <label for="type_accessoire"> Type Accessoire : </label>
                <select name="type_accessoire" id="type_accessoire">
                    <option value="" disabled selected="selected" >Type Accessoire :</option>
                    <?php
                        foreach($result_sous_cat_accessoires as $value){
                            ?>
                    <option value="<?= $value['id_sous_cat_accessoires']; ?>"><?= $value['sous_cat_acc_type'] ; ?></option>
                    <?php
                        }
                        ?>
                </select>
            </div>
            
            <div>
                <label for="acc_grip_epaisseur"> Epaisseur grip : </label>
                <input type="number" id="acc_grip_epaisseur" name="acc_grip_eppaisseur">   
            </div>    

            <div>
                <label for="acc_grip_couleur"> Couleur grip : </label>
                <input type="text" id="acc_grip_couleur" name="acc_grip_couleur">   
            </div>   


            </br>

            <input type="submit" value="Envoyer" name="valider">
       
        </form>    
    <body>    
</html>    
