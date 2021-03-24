<?php

class View_Panier {

    function displayInfosPanier($tableau_produits,$prix)
    {
        foreach($tableau_produits as $product)
        {
            ?>
            <section id="panier">
                <div class="contenu_panier">
                    <div class="panier_img">
                        <img src="../medias/img_articles/<?= $product['MIN(chemin)'] ; ?>">
                    </div>

                    <div class="panier_nom">
                        <p> <?= $product['art_nom'] ; ?> </p>
                    </div>
                    
                    <div class="panier_prix">
                        <p> <?= $product['prix'] ; ?> € </p>
                    </div>

                    <div class="panier_quantité">
                        <p> <?= $_SESSION['panier'][$product['id_articles']] ;?> </p>
                        <a href="panier.php?quantite_plus=<?= $product['id_articles'] ; ?>"><i class="fa fa-plus"></i></a>
                        <a href="panier.php?quantite_moins=<?= $product['id_articles'] ; ?>"><i class="fa fa-minus"></i></a>

                    </div>

                    <div class="panier_del">
                        <a href="panier.php?del=<?= $product['id_articles'] ; ?>"><i class="fa fa-trash"></i></a>
                    </div>

                </div>

                
                
            </section>
            <?php
            
        }
        ?>
        <div class="panier_total">
            <p> Prix total : <?= $prix ; ?> € </p>
        </div>

        <form action="panier.php" method="POST">
            <input type="submit" value="Valider le panier" name="validation_panier">
        </form>

        <?php
    }
}