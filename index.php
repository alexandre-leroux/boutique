
<?php

include("fonctions.php"); 

$result_cat = displayCat(); // renvoie un tableau de toutes les catégorie
$result_mar = displayMarques(); // renvoie un tableau de toutes les marques

if(isset($_POST['valider'])){
    

    insertArticle();

    $result = getAllInfosArticle();

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
                         isertImage($extensionUpload, $i);
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

            echo 'ca marche' ; 

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

        <input type="submit" value="Envoyer" name="valider">
       
        </form>    
    <body>    
</html>    
