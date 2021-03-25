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

    function displayInfosCommande($tableau_commande)
    {
        
        for($i = 0 ; isset($tableau_commande[$i]) ; $i++)
        {
            if($tableau_commande[$i]['id_commande'] != @$tableau_commande[$i+1]['id_commande'])
            {
                ?>
                
                <p><b>Commande n° <?= $tableau_commande[$i]['id_commande'] ?> </b></p>
                <?php
                $prix_total = 0; 
                for($a = 0 ; isset($tableau_commande[$a]); $a++)
                {
                    if($tableau_commande[$a]['id_commande'] == $tableau_commande[$i]['id_commande'])
                    {
                        ?>
                        <p> Nom du produit : <?= $tableau_commande[$a]['art_nom'] ; ?> </p>
                        <p> Quantité : <?= $tableau_commande[$a]['quantite'] ; ?> </p>
                        <p> Prix : <?= $tableau_commande[$a]['prix'] ; ?> € </p>
                        <?php
                        $prix_total += $tableau_commande[$a]['prix'] ;
                    }
                }
                ?>
                <p> Prix Total : <?= $prix_total ; ?> € <p>
                <?php
            }
            
        }
    }
}
