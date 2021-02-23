<?php

class viewArticle {

    public function displayAllArticles(array $result): void{
        foreach($result as $value)
        {
            ?>

            <div>
                <div class="img">
                    <a href="../pages/article.php?id=<?= $value['id_articles'] ; ?>"><img src="../medias/img_articles/<?=$value['chemin'] ; ?>"></a>
                </div>    
                <h1> <?= $value['art_nom'] ; ?> </h1>
                <p> <?= $value['prix'] ; ?> € </p>
                <p> <?= $value['art_courte_description'] ; ?> </p>

            </div>    

            <?php
        }
    }

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

}