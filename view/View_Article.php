<?php

class viewArticle {

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
                    <a href="../pages/article.php?id=<?= $value['id_articles'] ; ?>"><img src="../medias/img_articles/<?=$value['MIN(chemin)'] ; ?>"></a>
                </div>    
                <h1> <?= $value['art_nom'] ; ?> </h1>
                <p> <?= $value['prix'] ; ?> € </p>
                <p> <?= $value['art_courte_description'] ; ?> </p>

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
    public function formTrierParMarques($result_mar){
        ?>
        <form action="boutique.php" method="post">
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
        <?php
    }

    /**
     * Affiche un form avec un select pour trier par prix 
     *
     * @return void
     */
    public function TrierParPrix()
    {
        ?>

        <form action="boutique.php" method="post">
            <label for="prix"> Trier par prix : </label>
            <select name="prix" id="prix">
                <option disabled selected="selected">Prix</option>
                <option value="asc"> Prix croissant </option>
                <option value="des"> Prix décroissant </option>
            </select>
            
            <input type="submit" name="tri_prix" value="Envoyer"> 
        </form>

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
        for($i = 0 ; isset($resultat[$i]) ; $i++){
            echo '<img src="../medias/img_articles/'.$resultat[$i]['chemin'].'">';
        }
        foreach($result as $key => $value)
        {
            if($value == NULL || $value == $result['id_articles'] || $value == $result['id_categorie'] || $value == $result['id_marques']){
                echo '<p class="dp_none">'.$value.'</p>'; 
            }
            else{
                if($value == $result['prix']){
        
                    echo '<p>'.$value.' € </p>'; 
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
                    echo '<a href="boutique.php?id_marques='.$result['id_marques'].'">'.$value.'</a>';
                }
                else{
                    echo '<p>'.$value.'</p>';
                }
            }
             
        }

        echo '<a href="addpanier.php?id='.$result['id_articles'].'"> Ajouter au panier</a>';
    }

    /**
     * Affiche les articles de meme catégorie en suggestion sur la page de l'article 
     *
     * @param array $array_art_similaire
     * @return void
     */
    public function displayArticlesSimilaires($array_art_similaire){

        for($i = 0; isset($array_art_similaire[$i]) ; $i++)
        {
        ?>

        <div>
            <div>
                <a href="article.php?id=<?= $array_art_similaire[$i]['id_articles'];?>"><img src="../medias/img_articles/<?= $array_art_similaire[$i]['MIN(chemin)']; ?>"></a>
                <h3> <?= $array_art_similaire[$i]['art_nom'] ; ?></h3>
                <p> <?= $array_art_similaire[$i]['prix'] ; ?> €</p>
            </div>

        </div>

        <?php

        }
    }

}