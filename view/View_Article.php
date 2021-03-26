<?php

class view_Article {

    /**
     * Affiche les articles sur la page boutique 
     *
     * @param array $result
     * @return void
     */
    public function displayAllArticles(array $result): void{

        ?>
            <section class="galerie_article">
                <?php
                    foreach($result as $value)
                    {
                        ?>

                        <div class="vignette_article">
                            <div class="img">                    
                                <a href="article.php?id=<?= $value['id_articles'] ; ?>"><img src="../medias/img_articles/<?=$value['MIN(chemin)'] ; ?>"></a>
                            </div>    
                            <h1> <?= $value['art_nom'] ; ?> </h1>
                            <p id="courte_descr_aff_article"> <?= $value['art_courte_description'] ; ?> </p>
                            <p> <?= $value['prix'] ; ?> € </p>

                        </div>    

                        <?php
                    }

                 ?>
            </section>
        <?php
    }

    /**
     * Afficher un form avec un select de toutes les marques 
     *
     * @param [type] $result_mar
     * @return void
     */
    public function formTrierParMarques($result_mar,$cat){
        ?>
        <section id="section_tri_des_articles_marques_prix">
            <form action="<?= $cat ; ?>.php" method="post">
                <label for="marques"> Trier par marques : </label>
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

                <input type="submit" name="tri_marque" value="Envoyer"> 
            </form>

        <?php
    }

    /**
     * Affiche un form avec un select des catégories
     *
     * @param [type] $result_cat
     * @return void
     */
    public function formTrierParCat($result_cat){
        ?>
        <div style="display: none" >
        <form action="boutique.php" method="post">
            <label for="categories"> Trier par catégories : </label>
            <select name="categories" id="categories">
                <option disabled selected="selected">Catégorie</option>
                <?php
                foreach($result_cat as $value){
                    ?>
                <option value="<?= $value['id_categorie']; ?>"><?= $value['categorie_type'] ; ?></option>
                <?php
                }
                ?>
            </select>
            
            <input type="submit" name="tri_cat" value="Envoyer"> 
        </form>
        </div>
        <?php
    }

    /**
     * Affiche un form avec un select pour trier par prix 
     *
     * @return void
     */
    public function TrierParPrix($cat)
    {
        ?>
    <div id="trier_par_prix">
        <form action="<?= $cat ; ?>.php" method="post">
            <label for="prix"> Trier par prix : </label>
            <select name="prix" id="prix">
                <option disabled selected="selected">Prix</option>
                <option value="asc"> Prix croissant </option>
                <option value="des"> Prix décroissant </option>
            </select>
            
            <input type="submit" name="tri_prix" value="Envoyer"> 
        </form>
        </div>
        </section>
        <?php
    }

    public function TrierParManche($cat)
    {
        ?>
        <div class=details_par_type_article_filtre>
        <p> Taille du Manche <p>
        <form action="<?= $cat ; ?>.php" method="post">
            <input type="radio" id="taille_manche_2" name="taille_manche" value="2" checked>
            <label for="taille_manche_2"> 2 </label>

            <input type="radio" id="taille_manche_3" name="taille_manche" value="3" >
            <label for="taille_manche_3"> 3 </label>

            <input type="radio" id="taille_manche_4" name="taille_manche" value="4" >
            <label for="taille_manche_4"> 4 </label>

            <input type="radio" id="taille_manche_5" name="taille_manche" value="5" >
            <label for="taille_manche_5"> 5 </label>

            <input type="submit" value="Envoyer" name="tri_manche">
        </form>  
        </div>
        <?php
            

    }

    public function TrierParThermo($cat){
        ?>
          <div class=details_par_type_article_filtre>
        <p> Thermobag  <p>
        <form action="<?= $cat ; ?>.php" method="post">
            <input type="checkbox" id="thermo_3" name="capacite_thermo_3" value="3" checked>
            <label for="thermo_3"> 3 </label>

            <input type="checkbox" id="thermo_6" name="capacite_thermo_6" value="6" >
            <label for="thermo_6"> 6 </label>

            <input type="checkbox" id="thermo_9" name="capacite_thermo_9" value="9" >
            <label for="thermo_9"> 9 </label>

            <input type="checkbox" id="thermo_12" name="capacite_thermo_12" value="12" >
            <label for="thermo_12"> 12 </label>

            <input type="checkbox" id="thermo_15" name="capacite_thermo_15" value="15" >
            <label for="thermo_15"> 15 </label>

            <!-- <input type="submit" value="Envoyer" name="tri_thermo"> -->
            <button name="tri_thermo"> Envoyer </button>
        </form>  
        </div>
            <?php

    }

    public function TrierParCatAcc($result_sous_cat){
        ?>
        <!-- <p> Trier par catégories : </p> -->
        <div class=details_par_type_article_filtre>
        <form action="accessoires.php" method="post">
            <label for="cat_acc"> Trier par catégories : </label>
            <select name="cat_acc" id="cat_acc">
            <option disabled selected="selected">Catégories</option>
                <?php
                foreach($result_sous_cat as $value)
                {
                    ?>
                    <option value="<?= $value['id_sous_cat_accessoires']; ?>"> <?= $value['sous_cat_acc_type'] ; ?></option>
                    <?php
                }
                ?>
            </select>

            <input type="submit" value="Envoyer" name="tri_sous_cat">
        </form>
        </div>
        <?php
    }

    /**
     * Affiche les infos spécifique de l'article sur sa page 
     *
     * @param [type] $resultat
     * @param [type] $result
     * @return void
     */
    public function displayOneArticle($resultat,$result)
    {
        ?>
        <section id="conteneur_principal_article">
        <?php
        echo '<div id="conteneur_image_article">
                <img id="image_principale_page_article" src="../medias/img_articles/'.$resultat[0]['chemin'].'">
                    <div id="conteneur_image_suivantes_article">';

        for($i = 0 ; isset($resultat[$i]) ; $i++){
            echo '<img class="image_article_en_petite" src="../medias/img_articles/'.$resultat[$i]['chemin'].'">';
        }
        echo "</div>
            </div>
            <div id='reste_du_cntenu_article'>";



        
        foreach($result as $key => $value)
        {
            if($value == NULL || $value == $result['id_articles'] || $value == $result['id_categorie'] || $value == $result['id_marques']){
                echo '<p class="dp_none">'.$value.'</p>'; 
       
            }
            else{
                if($value == $result['prix']){
                    echo '<p id="prix_de_article">'.$value.' € </p>'; 
                }
                elseif($value == $result['raq_poids'])
                {
                    echo '<p> Poids : '.$value.' g </p>'; 
                }
                elseif($value == $result['raq_tamis'])
                {
                    echo '<p> Tamis : '.$value.' cm² </p>'; 
                }
                elseif($value == $result['raq_equilibre'])
                {
                    echo '<p> Equilibre : '.$value.' mm </p>'; 
                }
                elseif($value == $result['raq_taille_manche'])
                {
                    echo '<p> Taille du manche : '.$value.'</p>'; 
                }
                elseif($value == $result['cor_jauge'])
                {
                    echo '<p> Jauge : '.$value. ' mm </p>'; 
                }
                elseif($value == $result['sac_thermobag'])
                {
                    echo '<p> Thermobag : '.$value. '</p>'; 
                }
                elseif($value == $result['acc_grip_eppaisseur'])
                {
                    echo '<p> Epaisseur : '.$value. ' mm </p>'; 
                }
                elseif($value == $result['acc_grip_couleur'])
                {
                    echo '<p> Couleur : '.$value. '</p>'; 
                }
                elseif($value == $result['marques_nom']){
                    echo '<a id="lien_vers_marque" href="boutique.php?id_marques='.$result['id_marques'].'">'.$value.'</a>';
                }
                else{
                    echo '<p id="nom_du_produit_article">'.$value.'</p>';
                }
            }
             
        }

        echo '<div id="ajouter_au_panier"><a href="addpanier.php?id='.$result['id_articles'].'"> Ajouter au panier</a></div></div>';

        ?>
        </section>
        <?php
    }

    /**
     * Affiche les articles de meme catégorie en suggestion sur la page de l'article 
     *
     * @param array $array_art_similaire
     * @return void
     */
    public function displayArticlesSimilaires($array_art_similaire){

        ?>
        <section id="articles_similaires">
            <h1> Articles similaires </h1>
            <div id="photos_articles_similaires">
                <?php
                for($i = 0; isset($array_art_similaire[$i]) ; $i++)
                {
                ?>

                <div>
                    <div class="conteneur_images_art_siilaire">
                        <a href="article.php?id=<?= $array_art_similaire[$i]['id_articles'];?>"><img src="../medias/img_articles/<?= $array_art_similaire[$i]['MIN(chemin)']; ?>"></a>
                        <h3> <?= $array_art_similaire[$i]['art_nom'] ; ?></h3>
                        <p> <?= $array_art_similaire[$i]['prix'] ; ?> €</p>
                    </div>

                </div>

                <?php

                }
                ?>
                </div>
        </section>
        <?php
    }






public static function Presentation_raquette()
    {
        ?>
            <section class="section_presentation_generale_articles">

                <div class="conteneur_presentation_generale_articles">

                    <img src="../medias/img_articles/raquettes-de-tennis.jpg"  alt="">

                    <div>
                        <h1>RAQUETTES DE TENNIS</h1>
                        <p>Retrouvez toutes les raquettes de tennis dans les plus grandes marques chez SPORTSYSTEM : Babolat, Head, Wilson, Dunlop, Prince, Yonex, Tecnifibre, Pro Kennex... Vous pourrez trouver à coup sûr la raquette idéale parmi de nombreux modèles adaptés à votre style et niveau de jeu : puissance, contrôle, polyvalence... </p>
                    </div>
                    
                </div>

            </section>
        <?php

    }



public static function Presentation_sacs()
    {
        ?>
            <section class="section_presentation_generale_articles">

                <div class="conteneur_presentation_generale_articles">

                    <img src="../medias/img_articles/sacs-de-tennis.jpg"  alt="">

                    <div>
                        <h1>SACS DE TENNIS</h1>
                        <p>Découvrez les sacs de tennis et les thermobags pour ranger vos raquettes et toutes vos affaires de tennis durant les tournois et les entrainements... Une large gamme du grand sac de sport au thermobag large ou moyen en passant par les sacs à dos. Vous trouverez dans la rubrique sacs de tennis, les thermobags pour 3, 6, 9, 12 ou 15 raquettes selon vos besoins avec de nombreuses poches de rangement de tailles diverses et des compartiments avec protection isolante pour vos raquettes... Un grand choix de sacs à dos spécialement conçus pour le tennis avec une poche de rangement dédiée aux raquettes, des compartiment plus grands et plus larges pour les chaussures ou les vêtements et des petites pochettes accessoires.</p>
                    </div>
                    
                </div>

            </section>
        <?php

    }

public static function Presentation_cordages()
    {
        ?>
            <section class="section_presentation_generale_articles">

                <div class="conteneur_presentation_generale_articles">

                    <img src="../medias/img_articles/cordages-de-tennis.jpg"  alt="">

                    <div>
                        <h1>CORDAGES DE TENNIS</h1>
                        <p>Les meilleurs cordages de tennis sont chez SPORTSYSTEM : Babolat, Tecnifibre, Luxilon, West-Gut, Head, Wilson, Signum Pro, Still in Balck... Vous trouverez des cordages monofilament polyester qui apportent de la résistance, du contrôle et du lift mais qui sont peu confortables, aussi les cordages multifilaments plus souples et plus puissants pour un jeu plus dynamique. Vous trouverez également des cordages en boyaux naturels pour plus de puissance et de confort, et des cordages hybrides pour un meilleur compromis...</p>
                    </div>
                    
                </div>

            </section>
        <?php

    }

public static function Presentation_balles()
    {
        ?>
            <section class="section_presentation_generale_articles">

                <div class="conteneur_presentation_generale_articles">

                    <img src="../medias/img_articles/balles-de-tennis.jpg"  alt="">

                    <div>
                        <h1>BALLES DE TENNIS</h1>
                        <p>Toutes les balles de tennis adultes ou juniors : les balles pression haut de gamme pour les tournois et la compétition, les gammes intermédiaires pour les joueurs de club réguliers, les balles enfant avec les balles vertes, oranges, rouges et aussi les balles mousse pour le mini tennis !</p>
                    </div>
                    
                </div>

            </section>
        <?php

    }


public static function Presentation_accessoires()
    {
        ?>
            <section class="section_presentation_generale_articles">

                <div class="conteneur_presentation_generale_articles">

                    <img src="../medias/img_articles/accessoires-tennis.jpg"  alt="">

                    <div>
                        <h1>ACCESSOIRES POUR LE TENNIS</h1>
                        <p>Tous les accessoires pour votre raquette de tennis : Surgrip, grip, antivibrateur, coques, joncs de remplacement. toutes les marques sont disponibles : babolat, wilson, head, west gut, yonex, prince. Vous trouverez également une rubrique accessoire du joueur : caquette, poignets éponges, bandeau, bandana, chaussette, semelle disponibles chez sportsystem.fr Nike, Adidas, babolat, head, wilson les plus grandes marques sont ici. En cas de blessures, vous trouverez la solution adapté grâce a un large choix de : chevillères, genouillères, chaussette de maintient, coudière ....</p>
                    </div>
                    
                </div>

            </section>
        <?php

    }





}