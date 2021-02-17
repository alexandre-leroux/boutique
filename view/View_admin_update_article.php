<?php

class Affichage_admin_update{




    public static function affiche_all_articles($tous_les_articles)
    {
        ?>
        <div style="display:flex">

            <?php
            $i=0;
            while(@$tous_les_articles[$i])
                {
                    ?>
                
                    <div style="width:200px;border:solid;margin-right:10px">
                        <?=$tous_les_articles[$i]['art_nom']?><img style="height:200px" src="../medias/img_articles/<?=$tous_les_articles[$i]['MIN(chemin)']?>" alt="">
                    </div>
                
                <?php
                    $i++;
                }
            ?>

        </div>
        <?php

    }


    public static function affiche_details_et_form_update($donnees,$req_categorie,$req_marques)
    {
    ?>
                
            <p><b>données actuelles :</b></p>
            <p>nom du produit : <?= $donnees['art_nom']?> </p>
            <p>catégorie : <?= $donnees['categorie_type']?> </p>
            <p>marque : <?= $donnees['marques_nom']?> </p>
            <p>resumé : <?= $donnees['art_courte_description']?> </p>
            <p>description : <?= $donnees['art_description']?> </p>
            <p>poids : <?= $donnees['raq_poids']?> gr </p>
            <p>tamis : <?= $donnees['raq_tamis']?> cm2</p>
            <p>manche : <?= $donnees['raq_taille_manche']?> </p>
            <p>équilibre : <?= $donnees['raq_equilibre']?> nr</p>
            <p>stock : <?= $donnees['stock']?> </p>
            <p>prix : <?= $donnees['prix']?> €</p>

            <p><b>modifier l'article :</b></p>



            <form action="index.php" method="post" >

            <div >

            <select name="id_categorie">
                <option disabled value="CATEGORIES"  selected="selected"  >CATEGORIES</option>
                <?php foreach($req_categorie as $value)
                {echo  "<option value=". $value['id_categorie'] . ">". $value['categorie_type'] ."</option> " ;  }?>
            </select>
                           
            <select name='id_marques'>
                <option disabled value="MARQUES"  selected="selected"  >MARQUES</option>
                <?php foreach($req_marques as $value)
                {echo  "<option value=". $value['id_marques'] . ">". $value['marques_nom'] ."</option> ";}?>
            </select>
                
            <div >
                <label for="nom">modifier le nom de l'article : </label>
                <input type="text" name="nom" value="<?= $donnees['art_nom']?>"  >
            </div>

            <div >
                <label for="resume">modifier le résumé : </label>
                <textarea name="resume" ><?= $donnees['art_courte_description']?></textarea>
            </div>

            <div >
                <label for="description">modifier la  description : </label>
                <textarea name="description"  ><?= $donnees['art_description']?></textarea>
            </div>

            <div >
                <label for="poids">modifier le poids : </label>
                <input type="number" name="poids" value="<?= $donnees['raq_poids']?>"  >
            </div>

            <div >
                <label for="tamis">modifier le tamis : </label>
                <input type="number" name="tamis" value="<?= $donnees['raq_tamis']?>">
            </div>

            <div>
                <label for="manche">modifier le manche : </label>
                <input type="number" name="manche" value="<?= $donnees['raq_taille_manche']?>" >
            </div>

            <div >
                <label for="equilibre">modifier l'équilibre : </label>
                <input type="number" name="equilibre" value="<?= $donnees['raq_equilibre']?>">
            </div>

            <div>
                <label for="prix">modifier le prix : </label>
                <input type="number" name="prix" value="<?= $donnees['prix']?>" >
            </div>

            <div>
                <label for="stock">modifier le stock : </label>
                <input type="number" name="stock" value="<?= $donnees['stock']?>" >
            </div>

            <div class="form-example">
                <input type="submit" value="modifier" name="submit">
            </div>

            </form>
        <?php

    }








}