<?php

class View_Admin_Update
{




    public static function affiche_all_articles($recherche,$tous_les_articles, $req_categorie, $req_marques, $req_sous_categorie_acc, $req_type_balle, $req_balle_conditionnement)
        {
        ?>


                    
    <section id="section_centrale_update_article">        

                                <!-- input recherche -->
                        <div>
                                <form action="admin_update_article.php" method="post">
                                    <input type="text" minlength="3" name="mot_cle" placeholder="chercher">
                                    <input type="submit" value="rechercher" name="rechercher">
                                </form>
                        </div>    

                            <!-- formulaire modif catégorie, marques...Etc -->
                        <div id="modif_categorie_marques_etc">
                            <form action="admin_update_article.php" method="post">
                                <select name="id_categorie">
                                    <option  disabled value="CATEGORIES" selected="selected">CATEGORIES</option>
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
                        </div>    


        <!-- boucle d'affichage dela recherche -->
                <div id="affichage_resultat_recherche_admin" >

                <?php  
                $i = 0;
                while (@$recherche[$i]) {
                ?>
                    <div class="vignette_affichage_recherche_photo"   >
                        <a href="admin_update_one_article.php?id=<?= $recherche[$i]["id_articles"] ?>&idcat=<?= $recherche[$i]["id_categorie"] ?>&idsouscat=<?= $recherche[$i]["id_sous_cat_acc"];?>">
                        <img  src="../medias/img_articles/<?= $recherche[$i]['min(chemin)']?>" alt=""><h3><?= $recherche[$i]['art_nom'] ?></h3>
                        </a>
                    </div>

                <?php $i++; 
                } ?>
                </div>

        <!-- boucle d'affichage de tous les articles de la bdd -->
        <div id="affichage_tous_articles_recherche_admin">

            <?php
            $i = 0;
            while (@$tous_les_articles[$i]) { 
            ?>
                <div class="vignette_affichage_recherche_photo">
                    <a href="admin_update_one_article.php?id=<?= $tous_les_articles[$i]["id_articles"] ?>&idcat=<?= $tous_les_articles[$i]["id_categorie"] ?>&idsouscat=<?= $tous_les_articles[$i]["id_sous_cat_acc"] ?>">
                    <img src="../medias/img_articles/<?= $tous_les_articles[$i]['MIN(chemin)'] ?>" alt=""> <h3><?= $tous_les_articles[$i]['art_nom'] ?></h3>
                    </a>
                </div>

            <?php $i++;
            } ?>
        </div>
</section>
            <?php

}


public static function Update_one_article_boutton_retour_et_supp()
    {?>
        
        <section id="section_boutton_retour_et_supp">
            <div id="div_boutton_retour_et_supp">

                <div id="lien_retour">
                    <a href="admin_update_article.php">RETOUR</a></br>
                </div>

                <form action="admin_update_article.php?id=<?= $_GET['id'] ?>" method="post">

                <button type='submit'>SUPPRIMER CET ARTICLE</button>
                </form>
            
            </div>
        </section>

    <?php
    }


    // ----------------------------------------------------------------formulaire upadate des articles
public static function donnees_generales_communes($donnees)
        {
        ?>
            <section id="section_donnees_generales_communes">
                <div>
        

   
                    <div id="affichage_donnees_generales">
                        <h1><b>données actuelles :</b></h1>
                        <p><b>nom du produit :</b> <?= $donnees['art_nom'] ?> </p>
                        <p><b>marque :</b> <?= $donnees['marques_nom'] ?> </p>
                        <p><b>catégorie :</b> <?= $donnees['categorie_type'] ?> </p>
                        <p><b>resumé :</b> <?= $donnees['art_courte_description'] ?> </p>
                        <p><b>description :</b> <?= $donnees['art_description'] ?> </p>
                        <p><b>stock :</b> <?= $donnees['stock'] ?> </p>
                        <p><b>prix :</b> <?= $donnees['prix'] ?> €</p>
                    </div>
                </div>
            </section>
        <?php
        }

public static function formulaire_general_commun($donnees, $req_categorie, $req_marques)
            {
            ?>
            <section id="formulaire_update_general_commun">
            <div>
                <form action="admin_update_one_article.php?id=<?= $_GET['id'] ?>&idcat=<?= $_GET['idcat'] ?>&idsouscat=<?= $_GET['idsouscat'] ?>" method="post">

                    <div id="div_ensemble_formulaire">
                    <h1><b>modifier l'article :</b></h1>
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

                        <div class="form_changement_details_art">
                            <label for="nom">modifier le nom de l'article : </label>
                            <input type="text" name="nom" value="<?= $donnees['art_nom'] ?>">
                        </div>

                        <div class="form_changement_details_art">
                            <label for="resume">modifier le résumé : </label>
                            <textarea name="resume"><?= $donnees['art_courte_description'] ?></textarea>
                        </div>

                        <div class="form_changement_details_art">
                            <label for="description">modifier la description : </label>
                            <textarea name="description"><?= $donnees['art_description'] ?></textarea>
                        </div>
                        <div class="form_changement_details_art">
                            <label for="prix">modifier le prix : </label>
                            <input type="number" name="prix" value="<?= $donnees['prix'] ?>">
                        </div>

                        <div class="form_changement_details_art">
                            <label for="stock">modifier le stock : </label>
                            <input type="number" name="stock" value="<?= $donnees['stock'] ?>">
                        </div>
                    <?php
                }


 public static function affichage_modif_photo($req_img_article,$erreur_choix_premiere_image)
                    {
                            ?>
                        <section id="section_modif_image_update_art">
                            <div id="conteneur_choix_photo_principale">
                                <form action="admin_update_one_article.php?id=<?= $_GET['id'] ?>&idcat=<?= $_GET['idcat'] ?>&idsouscat=<?= $_GET['idsouscat'] ?>" method="post">
                                    <?php

                                
                                    foreach ($req_img_article as $value) {
                                    ?>
                                        <div id="div_affichage_images" >

                                            <p><img src="../medias/img_articles/<?= $value['chemin'] ?>" alt=""></p>

                                                <input type="checkbox" name="<?=$value['chemin']?>" value='../medias/img_articles/<?= $value['chemin']?>'>
                                            
                                            
                                                <?php  if(substr_count($value['chemin'],'-0.'))  {echo '<p>photo principale</p>';} ?>
                                        </div>
                                    <?php 
                                }
                                ?>



                                <input type="submit" value="supprimer" name="submit2">
                                </br>

                                <input type="submit" value="CHOISIR COMME PHOTO PRINCIPALE"  name="photo_principale">
                             
                                <?=$erreur_choix_premiere_image?>
                                
                                
                            </form>
                            <div id="rafraichir_page_photo"><a href="rafraichir_page_photos.php?id=<?=$_GET['id']?>">rafraichir la page</a></div>
                            </div>
                            <div id="form_ajouter_nouvelles_images">
                                <form action="admin_update_one_article.php?id=<?= $_GET['id'] ?>&idcat=<?= $_GET['idcat'] ?>&idsouscat=<?= $_GET['idsouscat'] ?>" method="post" enctype="multipart/form-data">
                                
                                    <label for="image"> Ajouter des images : </label>
                                    <input  type="file" name="image[]" multiple >
                                    <input type="submit" value="Envoyer" name="ajout_photo">
                                    
                                </form>
                            </div>




                        </section>
                            <?php
                    }



public static function affiche_details_et_form_update_raquette($donnees, $req_categorie, $req_marques, $req_img_article,$erreur_choix_premiere_image)
            {           
                        View_Admin_Update::affichage_modif_photo($req_img_article,$erreur_choix_premiere_image);
                        View_Admin_Update::donnees_generales_communes($donnees);
                        ?>
                    <section class="donnees_specifique_article">
                        <div>
                            <h2>détails articles :</h2>
                            <p>poids : <?= $donnees['raq_poids'] ?> gr </p>
                            <p>tamis : <?= $donnees['raq_tamis'] ?> cm2</p>
                            <p>manche : <?= $donnees['raq_taille_manche'] ?> </p>
                            <p>équilibre : <?= $donnees['raq_equilibre'] ?> nr</p>
                        </div>
                    </section>


                    <?php
                        View_Admin_Update::formulaire_general_commun($donnees, $req_categorie, $req_marques)
                    ?>
                           
                    <div class="form_changement_details_art">
                        <label for="poids">modifier le poids : </label>
                        <input type="number" name="poids" value="<?= $donnees['raq_poids'] ?>">
                    </div>

                    <div class="form_changement_details_art">
                        <label for="tamis">modifier le tamis : </label>
                        <input type="number" name="tamis" value="<?= $donnees['raq_tamis'] ?>">
                    </div>

                    <div class="form_changement_details_art">
                        <label for="manche">modifier le manche : </label>
                        <input type="number" name="manche" value="<?= $donnees['raq_taille_manche'] ?>">
                    </div>

                    <div class="form_changement_details_art">
                        <label for="equilibre">modifier l'équilibre : </label>
                        <input type="number" name="equilibre" value="<?= $donnees['raq_equilibre'] ?>">
                    </div>

                    <div class="form-example">
                        <input type="submit" value="modifier" name="submit">
                    </div>

                    </form>
                    </div>
                    </section>
                <?php
                       
            }




        public static function affiche_details_et_form_update_sacs($donnees, $req_categorie, $req_marques, $req_img_article,$erreur_choix_premiere_image)
            {  
                        View_Admin_Update::affichage_modif_photo($req_img_article,@$erreur_choix_premiere_image);
                        View_Admin_Update::donnees_generales_communes($donnees);
                ?>  
                    <section class="donnees_specifique_article">
                        <div>
                            <h2>détails articles :</h2>
                            <p>thermobag : <?= $donnees['sac_thermobag'] ?> raquettes </p>
                            <p><b>modifier l'article :</b></p>
                        </div>
                    </section>

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
                    </div>
                    </section>
                <?php
                       
            }





        public static function affiche_details_et_form_update_cordage($donnees, $req_categorie, $req_marques, $req_img_article,$erreur_choix_premiere_image)
            {

                        View_Admin_Update::affichage_modif_photo($req_img_article,$erreur_choix_premiere_image);

                        View_Admin_Update::donnees_generales_communes($donnees);
                ?>
                    <section class="donnees_specifique_article">
                        <div>
                            <h2>détails articles :</h2>
                            <p>jauge : <?= $donnees['cor_jauge'] ?> mm </p>
                         </div>
                    </section>


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
                    </div>
                    </section>
                <?php
            }




        public static function affiche_details_et_form_update_balle($donnees, $req_categorie, $req_marques, $req_img_article, $req_type_balle, $req_conditionnement_balle,$erreur_choix_premiere_image)
             {

                View_Admin_Update::affichage_modif_photo($req_img_article,$erreur_choix_premiere_image);
                        View_Admin_Update::donnees_generales_communes($donnees);
                ?>
                    <section class="donnees_specifique_article">
                    <div>
                        <h2>détails articles :</h2>
                        <p>type de balle : <?= $donnees['balle_type'] ?> </p>
                        <p>type de conditionnement : <?= $donnees['balle_conditionnement'] ?> </p>
                    </div>
                    </section>
           

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
                    </div>
                    </section>

                <?php
                        
        }





        public static function affiche_details_et_form_update_accessoires($donnees, $req_categorie, $req_marques, $req_img_article, $req_sous_cat_accessoires,$erreur_choix_premiere_image)
            {
                View_Admin_Update::affichage_modif_photo($req_img_article,$erreur_choix_premiere_image);
                View_Admin_Update::donnees_generales_communes($donnees);
                ?>
                    <section class="donnees_specifique_article">
                    <div>
                        <h2>détails articles :</h2>
                        <p>sous catégorie : <?= $donnees['sous_cat_acc_type'] ?> </p>
                    </div>
                    </section>
       

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
                    </div>
                    </section>

                    <?php
                
            }


        public static function affiche_all_user($req_all_users)
            {   
                foreach ($req_all_users as $key => $value) {
                ?>
                    <section id="section_principale_all_user">
                    <div id="div_all_user">
              
                            <div id="affichage_recap_user">
                                <p><b>id de l'utilisateur :</b> <?= $value['id_utilisateurs'] ?></p>
                                <p><b>niveau de droit :</b> <?= $value['uti_droits'] ?></p>
                                <p><b>nom :</b> <?= $value['uti_nom'] ?></p>
                                <p><b>prénom :</b> <?= $value['uti_prenom'] ?></p>
                                <p><b>mail :</b> <?= $value['uti_mail'] ?></p>
                                <p><b>téléphone :</b> <?= $value['uti_tel'] ?></p>
                                <p><b>rue :</b> <?= $value['uti_rue'] ?></p>
                                <p><b>code postal :</b> <?= $value['uti_code_postal'] ?></p>
                                <p><b>ville :</b> <?= $value['uti_ville'] ?></p></br>
                                <a href="admin_update_one_user.php?id_utilisateur=<?= $value['id_utilisateurs'] ?>">modifier cet utilisateur</a>
                            </div>
                    </div>
                    </section>

                <?php
                    }
            }


        public static function affiche_details_et_form_update_user($requete_one_user)
                    {
                        
                ?>
                <section id='update_one_user_details'>
                    <div id='update_one_user_details'>
                    <a href="admin_affiche_all_user.php">RETOUR</a></br>

                        <p><b>niveau de droit : <?=$requete_one_user["uti_droits"]?></b></p>
                        <form action="admin_update_one_user.php?id_utilisateur=<?= $_GET['id_utilisateur'] ?>" method="post">
                            <label for="uti_droits">Modifier le niveau de droit :</label>
                            <select name="uti_droits">
                                <option value="0">Utilisateur simple</option>
                                <option value="1">Administrateur</option>
                            </select>
                            <input type="submit" value="modifier" name="droit">
                        </form></br>

                        <p><b>nom : <?= $requete_one_user['uti_nom'] ?></b></p>
                        <form action="admin_update_one_user.php?id_utilisateur=<?= $_GET['id_utilisateur'] ?>" method="post">
                            <label for="uti_nom">Modifier le nom :</label>
                            <input type="text" id="uti_nom" name="uti_nom">
                            <input type="submit" value="modifier" name="nom">
                        </form></br>

                        <p><b>prénom : <?= $requete_one_user['uti_prenom'] ?></b></p>
                        <form action="admin_update_one_user.php?id_utilisateur=<?= $_GET['id_utilisateur'] ?>" method="post">
                            <label for="uti_prenom">Modifier le prénom :</label>
                            <input type="text" name="uti_prenom">
                            <input type="submit" value="modifier" name="prenom">
                        </form></br>

                        <p><b>mail : <?= $requete_one_user['uti_mail'] ?></b></p>
                        <form action="admin_update_one_user.php?id_utilisateur=<?= $_GET['id_utilisateur'] ?>" method="post">
                            <label for="uti_mail">Modifier le mail :</label>
                            <input type="email" name="uti_mail">
                            <input type="submit" value="modifier" name="email">
                        </form></br>

                        <p><b>téléphone : <?= $requete_one_user['uti_tel'] ?></b></p>
                        <form action="admin_update_one_user.php?id_utilisateur=<?= $_GET['id_utilisateur'] ?>" method="post">
                            <label for="uti_tel">Modifier le téléphone :</label>
                            <input type="tel" name="uti_tel">
                            <input type="submit" value="modifier" name="tel">
                        </form></br>

                        <p><b>rue : <?= $requete_one_user['uti_rue'] ?></b></p>
                        <form action="admin_update_one_user.php?id_utilisateur=<?= $_GET['id_utilisateur'] ?>" method="post">
                            <label for="uti_rue">Modifier la rue :</label>
                            <input type="text" name="uti_rue">
                            <input type="submit" value="modifier" name="rue">
                        </form></br>

                        <p><b>code postal : <?= $requete_one_user['uti_code_postal'] ?></b></p>
                        <form action="admin_update_one_user.php?id_utilisateur=<?= $_GET['id_utilisateur'] ?>" method="post">
                            <label for="uti_code_postal">Modifier le code postal :</label>
                            <input type="number" name="uti_code_postal">
                            <input type="submit" value="modifier" name="code_postal">
                        </form></br>

                        <p><b>ville : <?= $requete_one_user['uti_ville'] ?></b></p>
                        <form action="admin_update_one_user.php?id_utilisateur=<?= $_GET['id_utilisateur'] ?>" method="post">
                            <label for="uti_ville">Modifier la ville :</label>
                            <input type="text" name="uti_ville">
                            <input type="submit" value="modifier" name="ville">
                        </form>
                    </div>
                    </section>
            <?php
                    }





public static function affiche_un_article($donnees,$req_categorie,$req_marques,$req_img_article,$req_type_balle,$req_conditionnement_balle,$req_sous_cat_accessoires,$erreur_choix_premiere_image)

    {                   
                        $admin = new Model_Admin_Update();

                        if ($_GET['idcat'] == 1) {

                            View_Admin_Update::affiche_details_et_form_update_raquette($donnees, $req_categorie, $req_marques, $req_img_article,$erreur_choix_premiere_image);
                          
                        }

                        if ($_GET['idcat'] == 2) {

                            View_Admin_Update::affiche_details_et_form_update_sacs($donnees, $req_categorie, $req_marques, $req_img_article,$erreur_choix_premiere_image);
  
                        }


                        if ($_GET['idcat'] == 3) {

                            View_Admin_Update::affiche_details_et_form_update_cordage($donnees, $req_categorie, $req_marques, $req_img_article,$erreur_choix_premiere_image);
    
                        }

                        if ($_GET['idcat'] == 4) {

                            $donnees = $admin->select_one_articles_updates_balle();
                            View_Admin_Update::affiche_details_et_form_update_balle($donnees, $req_categorie, $req_marques, $req_img_article, $req_type_balle, $req_conditionnement_balle,$erreur_choix_premiere_image);

                        }

                        if ($_GET['idcat'] == 5) {

                            $donnees = $admin->select_one_articles_update_accessoire();
                            View_Admin_Update::affiche_details_et_form_update_accessoires($donnees, $req_categorie, $req_marques, $req_img_article, $req_sous_cat_accessoires,$erreur_choix_premiere_image);
    
                        }


                        
    }

    





public static function Page_choix_update_ou_insert()
    {
        ?>
            <div id="section_centrale_accueil_admin">
            
                <div class="lien_update_ou_insert">
                    <a href="admin_insert.php">AJOUTER UN NOUVEL ARTICLE</a></br>
                </div>
                <div class="lien_update_ou_insert">
                    <a href="admin_update_article.php">MODIFIER UN ARTICLE EXISTANT</a></br>
                </div>
            
            </div>
        
        <?php



    }










}
