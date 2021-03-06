<?php


class View_Accueil{



public static function Affiche_Slider()
    {
        ?>
        <section id="section_slider">
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
        <section id="section_selection_tennisworld">
            <div id="titre_et_affichage_art">

                <h1>selection<span>tennisworld</span></h1>

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
















}