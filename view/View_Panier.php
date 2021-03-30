<?php

class View_Panier {

    function displayInfosPanier($tableau_produits,$prix,$id_produit_panier)
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

                    <div class="panier_quantite">
                        <p> <?= @$_SESSION['panier'][$product['id_articles']] ;?> </p>
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
        if(!empty($id_produit_panier))
        {
            ?>
            <div class="panier_total">
                <p> Prix total : <?= $prix ; ?> € </p>
            </div>

            <form action="paiement.php" method="POST">
                <input type="submit" value="Valider le panier" name="validation_panier">
            </form>
            <?php
        }

    }

    function displayInfosCommande($tableau_commande)
    {
        
        for($i = 0 ; isset($tableau_commande[$i]) ; $i++)
        {
            if($tableau_commande[$i]['id_commande'] != @$tableau_commande[$i+1]['id_commande'])
            {
                ?>
                
                <div class="commande">
                <p class="num_commande"><b>Commande n° <?= $tableau_commande[$i]['id_commande'] ?> </b></p>
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
                </div>
                <?php
            }
            
        }
    }


    function displayPaiement($table,$prix)
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD" data-sdk-integration-source="button-factory"></script>
            <title>Paiement</title>
        </head>
        <body>

            <main>
                <section id="paiement">

                    <div id="recap_paiement">

                        <div>
                            <h1> Paiement </h1>
                        </div>

                        <div>
                            <h2> Adresse mail </h2>
                            <p> <?= $_SESSION['uti_mail'] ; ?></p>
                        </div>

                        <div>
                            <h2> Adresse de livraison </h2>
                            <p> <?= $_SESSION['uti_rue'] ; ?></p>
                            <p> <?= $_SESSION['uti_ville'] ; ?></p>
                            <p> <?= $_SESSION['uti_code_postal'] ; ?></p>
                            <p> <?= $_SESSION['uti_tel'] ; ?></p>
                        </div>

                        <div>
                            <h2> Type de paiement </h2>

                            <div id="smart-button-container">
                                <div style="text-align: center;">
                                    <div id="paypal-button-container"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="recap_commande">
                        <div>
                            <h1> Recap de la commande </h1>
                            <a href="panier.php"> Modifier </a>
                        </div>
                        <?php
                        foreach($table as $product)
                        {
                            ?>
                            <div class="recap_produit">
                                <img src="../medias/img_articles/<?= $product['MIN(chemin)'];?>" alt="img_produit">
                                <p> <?= $product['art_nom'] ; ?></p>
                                <p> Quantité : <?= $_SESSION['panier'][$product['id_articles']] ; ?></p>
                                <p> <?= $product['prix'] ; ?> € </p>
                            </div>
                            <?php
            
                        }
                        ?>
                        <div class="total">
                            <p> Total à régler <?= $prix; ?> € </p>
                        </div>
                    </div>

                </section>

            </main>
            
            <script src="../script/script_paypal.js"></script>
        </body>
        </html>
        <?php
    }
}
