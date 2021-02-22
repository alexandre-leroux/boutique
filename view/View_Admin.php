<?php

class View_Admin_Update
{




    public static function affiche_all_articles($tous_les_articles, $req_categorie, $req_marques,$req_sous_categorie_acc,$req_type_balle,$req_balle_conditionnement)
        {
            ?>
            <!-- formulaire modif catégorie, marques...Etc -->
            <form action="admin_update_article.php" method="post">
                <select name="id_categorie">
                    <option disabled value="CATEGORIES" selected="selected">CATEGORIES</option>
                    <?php foreach ($req_categorie as $value) {
                        echo  "<option value=" . $value['id_categorie'] . ">" . $value['categorie_type'] . "</option> ";
                    } ?>
                </select>
                <label for="nom">saisir le nouveau nom : </label>
                <input type="text" name="new_nom_categorie">
                <input type="submit" value="modifier" name="submit_cat">
            </form>

            <form action="admin_update_article.php" method="post">
                <select name='id_marques'>
                    <option disabled value="MARQUES" selected="selected">MARQUES</option>
                    <?php foreach ($req_marques as $value) {
                        echo  "<option value=" . $value['id_marques'] . ">" . $value['marques_nom'] . "</option> ";
                    } ?>
                </select>
                <label for="nom">saisir le nouveau nom : </label>
                <input type="text" name="new_nom_marque">
                <input type="submit" value="modifier" name="submit_marque">
            </form>

            <form action="admin_update_article.php" method="post">
                <select name='id_sous_cat_accessoires'>
                    <option disabled value="sous_cat" selected="selected">SOUS CATEGORIE</option>
                    <?php foreach ($req_sous_categorie_acc as $value) {
                        echo  "<option value=" . $value['id_sous_cat_accessoires'] . ">" . $value['sous_cat_acc_type'] . "</option> ";
                    } ?>
                </select>
                <label for="nom">saisir le nouveau nom : </label>
                <input type="text" name="new_nom_sous_cat_acc">
                <input type="submit" value="modifier" name="submit_sous_cat_acc">
            </form>

            <form action="admin_update_article.php" method="post">
                <select name='id_balle_type'>
                    <option disabled value="balle_type" selected="selected">TYPE DE BALLE</option>
                    <?php foreach ($req_type_balle as $value) {
                        echo  "<option value=" . $value['id_balle_type'] . ">" . $value['balle_type'] . "</option> ";
                    } ?>
                </select>
                <label for="nom">saisir le nouveau nom : </label>
                <input type="text" name="balle_type">
                <input type="submit" value="modifier" name="submit_balle_type">
            </form>

            <form action="admin_update_article.php" method="post">
                <select name='id_balle_conditionnement'>
                    <option disabled value="balle_conditionnement" selected="selected">BALLE CONDITIONNEMENT</option>
                    <?php foreach ($req_balle_conditionnement as $value) {
                        echo  "<option value=" . $value['id_balle_conditionnement'] . ">" . $value['balle_conditionnement'] . "</option> ";
                    } ?>
                </select>
                <label for="nom">saisir le nouveau nom : </label>
                <input type="text" name="balle_conditionnement">
                <input type="submit" value="modifier" name="submit_balle_conditionnement">
            </form>


        <!-- boucle d'affichage de tous les articles de la bdd -->
            <div style="display:flex">

            <?php
                $i = 0;
                while (@$tous_les_articles[$i]) {
                ?>
                <div style="width:200px;border:solid;margin-right:10px">
                    <a href="admin_update_one_article.php?id=<?= $tous_les_articles[$i]["id_articles"] ?>&idcat=<?= $tous_les_articles[$i]["id_categorie"] ?>&idsouscat=<?= $tous_les_articles[$i]["id_sous_cat_acc"] ?>">
                        <h3><?= $tous_les_articles[$i]['art_nom'] ?></h2><img style="height:200px" src="../medias/img_articles/<?= $tous_les_articles[$i]['MIN(chemin)'] ?>" alt="">
                    </a>
                </div>

                <?php $i++; } ?>
            </div>
            <?php
        }





// ----------------------------------------------------------------formulaire upadate des articles
    public static function donnees_generales_communes($donnees)
        {
            ?>
                <p><b>données actuelles :</b></p>
                <p>nom du produit : <?= $donnees['art_nom'] ?> </p>
                <p>marque : <?= $donnees['marques_nom'] ?> </p>
                <p>catégorie : <?= $donnees['categorie_type'] ?> </p>
                <p>resumé : <?= $donnees['art_courte_description'] ?> </p>
                <p>description : <?= $donnees['art_description'] ?> </p>
                <p>stock : <?= $donnees['stock'] ?> </p>
                <p>prix : <?= $donnees['prix'] ?> €</p>
            <?php
        }

    public static function formulaire_general_commun($donnees, $req_categorie, $req_marques)
        {
            ?>
        <form action="admin_update_one_article.php?id=<?= $_GET['id'] ?>&idcat=<?= $_GET['idcat'] ?>&idsouscat=<?= $_GET['idsouscat'] ?>" method="post">

            <div>

                <select name="id_categorie">
                    <option disabled value="CATEGORIES" selected="selected">CATEGORIES</option>
                    <?php foreach ($req_categorie as $value) {
                        echo  "<option value=" . $value['id_categorie'] . ">" . $value['categorie_type'] . "</option> ";
                    } ?>
                </select>

                <select name='id_marques'>
                    <option disabled value="MARQUES" selected="selected">MARQUES</option>
                    <?php foreach ($req_marques as $value) {
                        echo  "<option value=" . $value['id_marques'] . ">" . $value['marques_nom'] . "</option> ";
                    } ?>
                </select>

                <div>
                    <label for="nom">modifier le nom de l'article : </label>
                    <input type="text" name="nom" value="<?= $donnees['art_nom'] ?>">
                </div>

                <div>
                    <label for="resume">modifier le résumé : </label>
                    <textarea name="resume"><?= $donnees['art_courte_description'] ?></textarea>
                </div>

                <div>
                    <label for="description">modifier la description : </label>
                    <textarea name="description"><?= $donnees['art_description'] ?></textarea>
                </div>
                <div>
                    <label for="prix">modifier le prix : </label>
                    <input type="number" name="prix" value="<?= $donnees['prix'] ?>">
                </div>

                <div>
                    <label for="stock">modifier le stock : </label>
                    <input type="number" name="stock" value="<?= $donnees['stock'] ?>">
                </div>
            <?php
        }


    public static function affichage_modif_photo($req_img_article)
        {
            ?>
                <div style="display:flex">
                    <?php

                    $i = 0;
                    foreach ($req_img_article as $value) {
                    ?>
                        <div>

                            <p><img style="height:200px" src="../medias/img_articles/<?= $value['chemin'] ?>" alt=""></p>

                            <form action="admin_update_one_article.php?id=<?= $_GET['id'] ?>&idcat=<?= $_GET['idcat'] ?>&idsouscat=<?= $_GET['idsouscat'] ?>" method="post">
                                <input type="checkbox" name="chemin<?= $i ?>" value='../medias/img_articles/<?= $value['chemin'] ?>'>


                        </div>
                    <?php $i++;
                    }
                    ?>

                    <input type="submit" value="supprimer" style="height:20px" name="submit2">
                </div>


        </form>

        <?php
        }

    public static function affiche_details_et_form_update_raquette($donnees, $req_categorie, $req_marques, $req_img_article)
        {
            View_Admin_Update::donnees_generales_communes($donnees);
        ?>

            <p>poids : <?= $donnees['raq_poids'] ?> gr </p>
            <p>tamis : <?= $donnees['raq_tamis'] ?> cm2</p>
            <p>manche : <?= $donnees['raq_taille_manche'] ?> </p>
            <p>équilibre : <?= $donnees['raq_equilibre'] ?> nr</p>
            <p><b>modifier l'article :</b></p>


            <?php
                View_Admin_Update::formulaire_general_commun($donnees, $req_categorie, $req_marques)
            ?>
            <div>
                <label for="poids">modifier le poids : </label>
                <input type="number" name="poids" value="<?= $donnees['raq_poids'] ?>">
            </div>

            <div>
                <label for="tamis">modifier le tamis : </label>
                <input type="number" name="tamis" value="<?= $donnees['raq_tamis'] ?>">
            </div>

            <div>
                <label for="manche">modifier le manche : </label>
                <input type="number" name="manche" value="<?= $donnees['raq_taille_manche'] ?>">
            </div>

            <div>
                <label for="equilibre">modifier l'équilibre : </label>
                <input type="number" name="equilibre" value="<?= $donnees['raq_equilibre'] ?>">
            </div>

            <div class="form-example">
                <input type="submit" value="modifier" name="submit">
            </div>

            </form>

        <?php
                View_Admin_Update::affichage_modif_photo($req_img_article);
        }




    public static function affiche_details_et_form_update_sacs($donnees, $req_categorie, $req_marques, $req_img_article)
        {
                View_Admin_Update::donnees_generales_communes($donnees);
            ?>

                <p>thermobag : <?= $donnees['sac_thermobag'] ?> raquettes </p>
                <p><b>modifier l'article :</b></p>

            <?php
                View_Admin_Update::formulaire_general_commun($donnees, $req_categorie, $req_marques)
            ?>

                <div>
                    <label for="thermobag">modifier le thermobag : </label>
                    <input type="number" name="thermobag" value="<?= $donnees['sac_thermobag'] ?>">
                </div>

                <div class="form-example">
                    <input type="submit" value="modifier" name="submit">
                </div>

                </form>
            <?php
                View_Admin_Update::affichage_modif_photo($req_img_article);
        }





    public static function affiche_details_et_form_update_cordage($donnees, $req_categorie, $req_marques, $req_img_article)
        {
                View_Admin_Update::donnees_generales_communes($donnees);
                ?>

                    <p>jauge : <?= $donnees['cor_jauge'] ?> mm </p>
                    <p><b>modifier l'article :</b></p>

                <?php
                    View_Admin_Update::formulaire_general_commun($donnees, $req_categorie, $req_marques)
                ?>

                    <div>
                        <label for="jauge">modifier la jauge : </label>
                        <input type="number" name="jauge" value="<?= $donnees['cor_jauge'] ?>">
                    </div>

                    </div>

                    <div class="form-example">
                        <input type="submit" value="modifier" name="submit">
                    </div>

                    </form>

                <?php
                    View_Admin_Update::affichage_modif_photo($req_img_article);
        }




    public static function affiche_details_et_form_update_balle($donnees, $req_categorie, $req_marques, $req_img_article, $req_type_balle, $req_conditionnement_balle)
        {
                View_Admin_Update::donnees_generales_communes($donnees);
            ?>

                <p>type de balle : <?= $donnees['balle_type'] ?> </p>
                <p>type de conditionnement : <?= $donnees['balle_conditionnement'] ?> </p>
                <p><b>modifier l'article :</b></p>

            <?php
                View_Admin_Update::formulaire_general_commun($donnees, $req_categorie, $req_marques)
            ?>

                <select name="balle_type">
                    <option disabled value="TYPE DE BALLE" selected="selected">MODIFIER LE TYPE</option>
                    <?php foreach ($req_type_balle as $value) {
                        echo  "<option value=" . $value['id_balle_type'] . ">" . $value['balle_type'] . "</option> ";
                    }    ?>
                </select>

                <select name="balle_conditionnement">
                    <option disabled value="TYPE DE CONDITIONNEMENT" selected="selected">MODIFIER LE CONDITIONNEMENT</option>
                    <?php foreach ($req_conditionnement_balle as $value) {
                        echo  "<option value=" . $value['id_balle_conditionnement'] . ">" . $value['balle_conditionnement'] . "</option> ";
                    }    ?>
                </select>

                <div class="form-example">
                    <input type="submit" value="modifier" name="submit">
                </div>

                </form>

            <?php
                View_Admin_Update::affichage_modif_photo($req_img_article);
        }





    public static function affiche_details_et_form_update_accessoires($donnees, $req_categorie, $req_marques, $req_img_article, $req_sous_cat_accessoires)
        {
                View_Admin_Update::donnees_generales_communes($donnees);
            ?>

                <p>sous catégorie : <?= $donnees['sous_cat_acc_type'] ?> </p>
                <p><b>modifier l'article :</b></p>

                <?php
                        View_Admin_Update::formulaire_general_commun($donnees, $req_categorie, $req_marques)
                    ?>

                        <select name="sous_cat_acc">
                            <option disabled value="SOUS CAT ACC" selected="selected">MODIFIER LA SOUS CATEGORIE</option>
                            <?php foreach ($req_sous_cat_accessoires as $value) {
                                echo  "<option value=" . $value['id_sous_cat_accessoires'] . ">" . $value['sous_cat_acc_type'] . "</option> ";
                            }    ?>
                        </select>

                        <div class="form-example">
                            <input type="submit" value="modifier" name="submit">
                        </div>

                </form>

            <?php
            View_Admin_Update::affichage_modif_photo($req_img_article);
        }



        
}