<?php

class View_Admin_Insert {

    /**
     * Affichage du formulaire commun de tous les produits  
     *
     * @param [type] $result_cat
     * @param [type] $result_mar
     * @return void
     */
    public function generalForm($result_cat,$result_mar){
        
        ?>
            <section id="section_centrale_admin_insert_type_article">

                    <form action="admin_insert.php" method="POST" enctype="multipart/form-data">

                    <div class="div_formulaire_insert_par_type_article">
                        <label for="name">Nom du produit :</label>
                        <input type="text" id="name" name="art_nom" required>
                    </div>

                    <div class="div_formulaire_insert_par_type_article">
                        <label for="courte_description">Courte description :</label>
                        <input type="text" id="courte_description" name="art_courte_description" required>
                    </div>

                    <div class="div_formulaire_insert_par_type_article">
                        <label for="description"> Description : </label>
                        <textarea id="description" name="art_description"></textarea>
                    </div>

                    <div class="div_formulaire_insert_par_type_article">
                        <label for="marques"> Marques : </label>
                        <select name="marques" id="marques">
                    </div>



                    <div class="div_insert_marques_categorie">
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
                    </div>
             
                    <div class="div_formulaire_insert_par_type_article">

                        <label for="stock">Stock :</label>
                        <input type="number" id="stock" name="stock" required>
                    </div>
                    <div class="div_formulaire_insert_par_type_article">
                        <label for="prix">Prix :</label>
                        <input type="number" id="prix" name="prix" step="0.01" min=1 max=400 required>
                    </div>
                    <div class="div_formulaire_insert_par_type_article">
                        <label for="image"> Image : </label>
                        <input id="image" type="file" name="image[]" multiple>
                    </div>

        
               
        <?php
    }

    /**
     * Affichage form spécifique -> raquette
     *
     * @return void
     */
    public function formRaquette(){

        ?>
        <div class="div_formulaire_insert_par_type_article">
            <label for="poids"> Poids : </label>
            <input type="number" name="raq_poids" id="poids">
        </div>
    
        <div class="div_formulaire_insert_par_type_article">
            <label for="tamis"> Tamis : </label>
            <input type="number" name="raq_tamis" id="tamis">
        </div>
    
        <div class="div_formulaire_insert_par_type_article">
            <label for="equilibre"> Equilibre : </label>
            <input type="number" name="raq_equilibre" id="equilibre">
        </div>
    
        <div class="div_formulaire_insert_par_type_article">
            <label for="taille_manche"> Taille manche : </label>
            <input type="number" name="raq_taille_manche" id="taille_manche">
        </div>
    
        <input class="boutton_submit_choix_typre_article_insert" type="submit" value="Envoyer" name="valider">

        </form> 

        </section>
        <?php
 
    }

    /**
     * Affichage form spécifique -> sac
     *
     * @return void
     */
    public function formSac(){

        ?>
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
        <input class="boutton_submit_choix_typre_article_insert" type="submit" value="Envoyer" name="valider">

        </form>

        </section>

        <?php
        
    }

    /**
     * Affichage form spécifique -> cordage
     *
     * @return void
     */
    public function formCordage(){
      
        ?>
        
        <label for="jauge"> Jauge : </label>
        <input type="number" name="cor_jauge" id="jauge" step="0.01">
        </br>
        <input class="boutton_submit_choix_typre_article_insert" type="submit" value="Envoyer" name="valider">

        </form>

        </section>
        
        <?php
        
    }

    /**
     * Affichage form spécifique -> balle
     *
     * @param [type] $result_balle_conditionnement
     * @param [type] $result_balle_type
     * @return void
     */
    public function formBalle($result_balle_conditionnement,$result_balle_type){
        ?>
        <label for="conditionnement"> Conditionnement : </label>
        <select name="balle_conditionnement" id="conditionnement">
            <option value="" disabled selected="selected" >Conditionnement</option>
            <?php
                foreach($result_balle_conditionnement as $value){
                    ?>
            <option value="<?= $value['id_balle_conditionnement']; ?>"><?= $value['balle_conditionnement'] ; ?></option>
            <?php
                }
                ?>
        </select>

        <label for="type"> Type : </label>
        <select name="balle_type" id="type">
            <option value="" disabled selected="selected" >Type</option>
            <?php
                foreach($result_balle_type as $value){
                    ?>
            <option value="<?= $value['id_balle_type']; ?>"><?= $value['balle_type'] ; ?></option>
            <?php
                }
                ?>
        </select>
        </br>
        <input class="boutton_submit_choix_typre_article_insert" type="submit" value="Envoyer" name="valider">
        </form>

        </section>
        <?php        
    }

    /**
     * Affichage form spécifique -> accessoires
     *
     * @param [type] $result_sous_cat_accessoires
     * @return void
     */
    public function formAccessoires($result_sous_cat_accessoires){
        ?>

        <label for="accessoires"> Accessoires : </label>
        <select name="id_sous_cat_acc" id="accessoires">
            <option value="" disabled selected="selected">Accessoires</option>
            <?php
                foreach($result_sous_cat_accessoires as $value){
                    ?>
            <option value="<?= $value['id_sous_cat_accessoires']; ?>"><?= $value['sous_cat_acc_type'] ; ?></option>
            <?php
                }
                ?>
        </select>

        <div class="visibility_grip">
            <label for="grip_eppaisseur"> Epaisseur grip : </label>
            <input type="number" id="grip_eppaisseur" name="grip_eppaisseur" step="0.01">
        </div>

        <div class="visibility_grip">
            <label for="grip_couleur"> Couleur grip : </label>
            <input type="text" id="grip_couleur" name="grip_couleur">
        </div>
        </br>
        <input class="boutton_submit_choix_typre_article_insert" type="submit" value="Envoyer" name="valider">
        </form>

        </section>
        <?php

    }

    /**
     * Affichage du form pour choisir quel type de produit à ajouté
     *
     * @return void
     */
    public function selectTypeArticle(){
        ?>
            <section id="section_centrale_admin_insert">

                <h2> Veuillez choisir quel type d'article a ajouter : </h2>

                <div id="formulaire_choix_ajout_type_article">

                    <form action="admin_insert.php" method="post">
                        <div>
                            <input type="radio" id="raquette" name="choix_cat" value="raquette" checked>             
                            <label for="raquette"> Raquette</label>
                        </div>
                    
                        <div>
                            <input type="radio" id="sacs" name="choix_cat" value="sacs" checked>             
                            <label for="sacs"> Sacs </label>
                        </div>
                    
                        <div>
                            <input type="radio" id="cordage" name="choix_cat" value="cordage" checked>             
                            <label for="cordage">Cordages</label>
                        </div>
                    
                        <div>
                            <input type="radio" id="balles" name="choix_cat" value="balles" checked>             
                            <label for="balles">Balles</label>
                        </div>
                    
                        <div>
                            <input type="radio" id="accessoires" name="choix_cat" value="accessoires" checked>             
                            <label for="accessoires">Accessoires</label>
                        </div>
                        
                        <input class="boutton_submit_choix_typre_article_insert" type="submit" value="Envoyer" name="valider_cat">
        
                    </form>

                </div>

            </section>


        <?php
    }

}