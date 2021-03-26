<?php

class View_User
{

    public static function form_inscription($error_mail_pris,$error_mdp)    
    {
        ?>
            <section class="section_formulaire_inscription">
                <div class="conteneur_form_inscription">
                    <form action="user_inscription.php" method="POST" >
                    <div class="form-group">
                        <label for="user_nom">Votre nom :</label>
                        <input class="input_form_inscription" type="text" id="user_nom" name="nom" >
                    </div>

                    <div class="form-group">
                        <label for="prenom">prenom : </label> 
                        <input class="input_form_inscription"  type="text" id="prenom" name="prenom" >
                    </div>

                    <div class="form-group">
                        <label for="mail">mail : </label>
                        <input class="input_form_inscription" type="email"  id="mail" name="mail" >
                        <?php if(@$error_mail_pris){echo "<p id='mess_erreur_inscription'>".$error_mail_pris."</p>";}?>

                    </div>

                    <div class="form-group">
                        <label for="telephone">telephone : </label>
                        <input class="input_form_inscription"  type="tel" id="telephone" name="telephone">
                    </div>

                    <div class="form-group">
                        <label for="mdp"> Mot de passe : </label>
                        <input class="input_form_inscription" type="password"  id="mdp" name="mdp" >
                        <?php if(@$error_mdp){echo "<p id='mess_erreur_inscription'>".$error_mdp."</p>";}?>
                    </div>


                    <div class="form-group">
                        <label for="confirm_mdp">Confirmation de mot de passe : </label>
                        <input class="input_form_inscription" type="password"  id="confirm_mdp" name="confirm_pass" >
                    </div>

                    <div class="form-group">
                        <label for="rue">rue : </label>
                        <input class="input_form_inscription" type="text"  id="rue" name="rue" >
                    </div>


                    <div class="form-group">
                        <label for="code_postal">code_postal : </label>
                        <input class="input_form_inscription"  type="number" id="code_postal" name="code_postal">
                    </div>

                    <div class="form-group">
                        <label for="ville">ville : </label>
                        <input class="input_form_inscription" type="text"  id="ville" name="ville" >
                    </div>

                    <div id="validation_inscription">
                        <input  type="submit" value="VALIDER L'INSCRIPTION" name="valider">
                    </div>    

                    </form>
                </div>
            </section>
        <?php
    }


    public static function form_connexion($error)    
    {
        ?>
            <section class="section_formulaire_inscription">
                <div class="conteneur_form_inscription">

                    <form action="user_connexion.php" method="POST">
                        <div class="form-group">
                            <label for="mail">Email</label>
                            <input class="input_form_inscription" type="mail" name="mail">
                        </div>

                        <div class="form-group">
                            <label for="mdp"> Mot de passe </label>
                            <input class="input_form_inscription" type="password" name="pass">
                        </div>
                        <?php if (isset($error)) {echo "<p id='erreur_connect'>".$error."</p>"; } ?>
                        <div  id="validation_connexion">
                            <input type="submit" value="Se connecter" name="valider">
                        </div>
                    </form>

                </div>
            </section>
    <?php
    }
    
    public static function form_update_profil($erreur)
    {
        ?>  <section id="section_form_user_modif_profil">

                <div id="lien_retour_user">
                    <a href="../index.php">RETOUR</a>
                </div>

            <div id="div_form_user_modif_profil">


                <form action="user_modification_profil.php" method="POST">
    
                        <div class="form-group">
                        <label for="nom">Votre nom : </label>
                            <input type="text" name="nom" value="<?=$_SESSION['uti_nom']?>">
                        </div>
    
                        <div class="form-group">
                        <label for="prenom">Votre prénom : </label>
                            <input type="text" name="prenom" value="<?=$_SESSION['uti_prenom']?>">
                        </div>
    
                        <div class="form-group">
                        <label for="mail">Votre mail : </label>
                            <input type="text" name="mail" value="<?=$_SESSION['uti_mail']?>">
                            <span class="span_erreur_user"><?php if(@$_POST['submit'] AND !empty($erreur)){echo @$erreur;}?></span>
                        </div>
    
                        <div class="form-group">
                        <label for="tel">Votre numéro de téléphone : </label>
                            <input type="tel" name="tel" value="<?=$_SESSION['uti_tel']?>">
                        </div>
    
                        <div class="form-group">
                        <label for="rue">Votre adresse : </label>
                            <input type="text" name="rue" value="<?=$_SESSION['uti_rue']?>">
                        </div>
                        
                        <div class="form-group">
                        <label for="code_postal">Votre code postal : </label>
                            <input type="number" name="code_postal" value="<?=$_SESSION['uti_code_postal']?>">
                        </div>
    
                        <div class="form-group">
                        <label for="ville">Votre ville : </label>
                            <input type="text" name="ville" value="<?=$_SESSION['uti_ville']?>">
                        </div>
                            <input  class="submit_user_profil" type="submit" value="enregistrer les modifications" name="submit">
                       
    
                    </form>
    
                    <form action="user_modification_profil.php" method="POST">
                        <div class="form-group">
                            <label for="mdp"> Modifier le mot de passe : </label>
                            <input type="password"  id="mdp" name="mdp" >
                            <span class="span_erreur_user"><?php if(@$_POST['submit_update_mdp'] AND !empty($erreur)){echo @$erreur;}?></span>
                        </div>
    
    
                        <div class="form-group">
                            <label for="confirm_mdp">Confirmer le nouveau mot de passe : </label>
                            <input type="password"  id="confirm_mdp" name="confirm_pass" >
                        </div>
                        <input class="submit_user_profil" type="submit" value="modifier le mot de passe" name="submit_update_mdp">
                    </form>
                    
                    <div id="lien_mes_commandes" class="mescommandes">
                        <a href="mescommandes.php?id_utilisateurs=<?= $_SESSION['id_utilisateurs'] ; ?> "> Mes commandes </a>
                    </div>
    
    
                   
            </div>
            </section>

        <?php

}
public static function user_message_inscription()
{
    ?>
            <section class="user_connecte">
                <div >
                    <p>inscription validée</p>
                    <button onclick="document.location.href = 'user_connexion.php';">se connecter</button>

         
                </div>
            </section>
            <?php

        }     


public static function user_message_connexion()
        {
            ?>
            <section class="user_connecte">
                <div >
                    <p>vous êtes connecté</p>
                    <button onclick="document.location.href = '../index.php';">retour à l'accueil</button>

         
                </div>
            </section>
            <?php

        }             


public static function user_message_deconnexion()
        {
            ?>
            <section class="user_connecte">
                <div >
                    <p>vous êtes déconnecté</p>
                    <button onclick="document.location.href = '../index.php';">retour à l'accueil</button>

         
                </div>
            </section>
            <?php

        }     




public static function afficher_resultat_recherche($recherche)
    {
        if ($recherche != NULL)
        {
        ?>

            <section id="recherche_user">
                 <div id="conteneur_resultat_recherche">
            
                <?php  
                $i = 0;
                while (@$recherche[$i]) {
                ?>
                    <div  id="vignette_resultat_recherche" >
                        <a target="_blank" href="article.php?id=<?= $recherche[$i]["id_articles"] ?>&idcat=<?= $recherche[$i]["id_categorie"] ?>&idsouscat=<?= $recherche[$i]["id_sous_cat_acc"];?>">
                        <img style="height:200px" src="../medias/img_articles/<?= $recherche[$i]['min(chemin)']?>" alt="">
                            <h3><?= $recherche[$i]['art_nom'] ?></h3>
                        </a>
                    </div>
            
                <?php $i++; 
                } ?>
                
                </div>
            </section>

        <?php
        }
        else
        {?>
         <section id="recherche_user">
                 <div id="conteneur_resultat_recherche">
                     <p>Votre recherche n'a donné aucun résultat</p>
                 </div>
            </section>

            <?php
        }
    }    













}