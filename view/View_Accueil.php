<?php


class View_Accueil{



public static function Affiche_Slider()
    {
        ?>
        <section class="section_accueil">
            <div id="slider">
            <figure>
               <a href="pages/article.php?id=16"><img src="medias/img_pub/slide-gravity-2021-03032021.jpg" alt></a> 
               <a href="pages/article.php?id=15"><img src="medias/img_pub/slide-radical-2021.jpg" alt></a> 
               <a href="pages/article.php?id=17"><img src="medias/img_pub/slide-ultra-100-reverse-17022021_602cf872af47a.jpg" alt></a> 
               <a href="pages/article.php?id=15"><img src="medias/img_pub/slide-radical-2021.jpg" alt></a> 
               <a href="pages/article.php?id=16"><img src="medias/img_pub/slide-gravity-2021-03032021.jpg" alt></a> 
            </figure>
            </div>
        </section>
        <?php

    }


public static function Affiche_Selection_TennisWorld()
    {
        $new_model = new Model;
        $articles_en_avant = $new_model->select_all_articles_mis_en_avant(); 

        ?>
         <section class="section_accueil">
            <div id="titre_et_affichage_articles">

                <h1>selection <span> tennisworld</span></h1>

                <div id="div_article_avant">
                    <?php
                    $i = 0;
                    while (@$articles_en_avant[$i]) { 
                    ?>
                        <div id="conteneur_lien_promo">

                            <div id="affichage_promotion">
                                <p id="poucentage">NEW</p>
                                <p id="stock_restant">Plus que <?=$articles_en_avant[$i]['stock']?> restants</p>
                            </div>

                            <a href="pages/article.php?id=<?= $articles_en_avant[$i]["id_articles"] ?>&idcat=<?= $articles_en_avant[$i]["id_categorie"] ?>&idsouscat=<?= $articles_en_avant[$i]["id_sous_cat_acc"] ?>">
                                
                                <img src="medias/img_articles/<?= $articles_en_avant[$i]['MIN(chemin)'] ?>" alt="">

                                <h2><?= $articles_en_avant[$i]['art_nom'] ?></h2>
                                <p id="courte_description"><?=$articles_en_avant[$i]['art_courte_description']?></p>
                                <p id="prix_mise_en_avant"><?=$articles_en_avant[$i]['prix']?> €</p>
                            </a>
                          
                        </div>


                    <?php $i++;
                    } ?>
                </div>

            </div>
        </section>
        <?php


    }


public static function Affiche_pub()
    {

        ?>
        <section class="section_accueil">
            <div id="affichage_pub">

                <a href="pages/article.php?id=18"><img src="medias/img_pub/bloc-home-promo-03032021-2.jpg" alt=""></a>
                <a href="pages/article.php?id=19"><img src="medias/img_pub/bloc-home-zoom-sur-25032021.jpg" alt=""></a>

            </div>
        </section>
        <?php


    }

public static function Affiche_Texte_Presentation()
    {

        ?>
        <section class="section_accueil">
            <div id="affichage_presentation">

                <p>Tennis World, le spécialiste tennis depuis 20 ans avec ses magasins sur Marseille et son site internet,
                    vous propose la vente du matériel de tennis pour les joueurs avec des raquettes Babolat, Wilson, Head,
                    Yonex, Tecnifibre, des sacs, des cordages, des balles et aussi les accessoires de tennis des champions dans
                    les meilleures marques : Nike, Adidas, Asics, Fila... Vous pouvez aussi trouver les toutes dernières
                    nouveautés et les meilleures promotions. Des 
                    articles de tennis pro et amateurs parmi des centaines de références pour tous vos achats tennis...
                </p>

            </div>
        </section>
        <?php


    }















}