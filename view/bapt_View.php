<?php

class View {

    public function generalForm(){
        ?>
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
               
        </form> ' ; 
        <?php
    }

    public function formRaquette(){
        echo '

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

        <input type="submit" value="Envoyer" name="valider">
    
        ' ;

    }

    public function formSac(){

        echo '

        <div>
            <input type="radio" id="choix_3" name="choix_thermo" value="choix_3" checked>             
            <label for="choix_3">3</label>
        </div>
    
        <div>
            <input type="radio" id="choix_6" name="choix_thermo" value="choix_6" checked>             
            <label for="choix_3">6</label>
        </div>
    
        <div>
            <input type="radio" id="choix_9" name="choix_thermo" value="choix_9" checked>             
            <label for="choix_9">9</label>
        </div>
    
        <div>
            <input type="radio" id="choix_12" name="choix_thermo" value="choix_12" checked>             
            <label for="choix_12">12</label>
        </div>
    
        <div>
            <input type="radio" id="choix_15" name="choix_thermo" value="choix_15" checked>             
            <label for="choix_15">15</label>
        </div>
        <input type="submit" value="Envoyer" name="valider">
        ' ;

    }

    public function formCordage(){
        echo '
        <label for="jauge"> Jauge : </label>
        <input type="number" name="cor_jauge" id="jauge">
        <input type="submit" value="Envoyer" name="valider">
        ' ;
    }

    public function selectTypeArticle(){
        
    }
}