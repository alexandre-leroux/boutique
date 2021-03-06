<?php


class View_Accueil{



public static function Affiche_Slider()
    {
        ?>
        <section class="section_accueil">
            <div id="slider">
            <figure>
                <img src="medias/img_pub/slide-gravity-2021-03032021.jpg" alt>
                <img src="medias/img_pub/slide-radical-2021.jpg" alt>
                <img src="medias/img_pub/slide-ultra-100-reverse-17022021_602cf872af47a.jpg" alt>
                <img src="medias/img_pub/slide-radical-2021.jpg" alt>
                <img src="medias/img_pub/slide-gravity-2021-03032021.jpg" alt>
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
                        <div>
                            <a href="admin_update_one_article.php?id=<?= $articles_en_avant[$i]["id_articles"] ?>&idcat=<?= $articles_en_avant[$i]["id_categorie"] ?>&idsouscat=<?= $articles_en_avant[$i]["id_sous_cat_acc"] ?>">
                                <h3><?= $articles_en_avant[$i]['art_nom'] ?></h2><img src="medias/img_articles/<?= $articles_en_avant[$i]['MIN(chemin)'] ?>" alt="">
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

                <a href=""><img src="medias/img_pub/bloc-home-promo-03032021-2.jpg" alt=""></a>
                <a href=""><img src="medias/img_pub/bloc-home-nouveautes-03032021_1.jpg" alt=""></a>

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


public static function Affiche_bandeau_et_logos()
    {

        ?>
        <section class="section_accueil">
            <div id="bandeau_et_logo">

                  <img src="medias/bandeau_accueil.png" alt="">
                    <div id="debut_fond_bleu">
                        <div id="conteneur_logos">
                        
                            <div class="logo_et_mini_slogan">   <img src="medias/126091-ecommerce-set/png/shop1.png" alt="logo_magasin"><p>Retrait gratuit en magasin</p> </div>
                            <div class="logo_et_mini_slogan">    <img src="medias/126091-ecommerce-set/png/headphones1.png" alt="logo_service_client"><p>Service client 04.43.02.45.71</p> </div>
                            <div class="logo_et_mini_slogan">   <img src="medias/126091-ecommerce-set/png/like1.png" alt="logo_satisait_ou_remboursé"><p>Satisfait ou remboursé</p> </div>
                            <div class="logo_et_mini_slogan">   <img src="medias/126091-ecommerce-set/png/settings1.png" alt="logo paiement securisé"><p>Paiement sécurisé</p> </div>
                            <div class="logo_et_mini_slogan"> <img id="trucks" src="medias/126091-ecommerce-set/png/truck-1.png" alt="logo"><p>Frais de port gratuits > 75€ en France métropolitaine</p> </div>
            
                        </div>
                    </div>
            </div>
        </section>
        <?php


    }











}