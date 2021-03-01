<?php

class View_User
{

    public static function form_inscription($error_mail_pris,$error_mdp)    
    {
        ?>
        <a href="../index.php">RETOUR</a>
        <form action="user_inscription.php" method="POST" >
        <div class="form-group">
            <label for="user_nom">Votre nom :</label>
            <input type="text" id="user_nom" name="nom" >
        </div>

        <div class="form-group">
            <label for="prenom">prenom : </label> 
            <input type="text" id="prenom" name="prenom" >
        </div>

        <div class="form-group">
            <label for="mail">mail : </label>
            <input type="email"  id="mail" name="mail" >
            <?php if(@$error_mail_pris){echo $error_mail_pris;}?>

        </div>

        <div class="form-group">
            <label for="telephone">telephone : </label>
            <input  type="tel" id="telephone" name="telephone">
        </div>

        <div class="form-group">
            <label for="mdp"> Mot de passe : </label>
            <input type="password"  id="mdp" name="mdp" >
            <?php if(@$error_mdp){echo $error_mdp;}?>
        </div>


        <div class="form-group">
            <label for="confirm_mdp">Confirmation de mot de passe : </label>
            <input type="password"  id="confirm_mdp" name="confirm_pass" >
        </div>

        <div class="form-group">
            <label for="rue">rue : </label>
            <input type="text"  id="rue" name="rue" >
        </div>


        <div class="form-group">
            <label for="code_postal">code_postal : </label>
            <input  type="number" id="code_postal" name="code_postal">
        </div>

        <div class="form-group">
            <label for="ville">ville : </label>
            <input type="text"  id="ville" name="ville" >
        </div>

        <div>
            <input  type="submit" value="Envoyer" name="valider">
        </div>    

        </form>
    <?php
    }


    public static function form_connexion($error)    
    {
        ?>
        <a href="../index.php">RETOUR</a>
        <form action="connexion.php" method="POST">
            <div class="form-group">
                <label for="mail">Email</label>
                <input type="mail" name="mail">
            </div>

            <div class="form-group">
                <label for="mdp"> Mot de passe </label>
                <input type="password" name="pass">
            </div>
            <?php if (isset($error)) {echo $error; } ?>
            <div>
                <input type="submit" value="Se connecter" name="valider">
            </div>

        </form>
    <?php
    }

    public static function form_update_profil($erreur)
        {
            ?>
            <a href="../index.php">RETOUR</a>
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
                        <?php if(@$_POST['submit'] AND !empty($erreur)){echo @$erreur;}?>
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
                        <input type="submit" value="enregistrer les modifications" name="submit">
                   

                </form>

                <form action="user_modification_profil.php" method="POST">
                    <div class="form-group">
                        <label for="mdp"> Modifier le mot de passe : </label>
                        <input type="password"  id="mdp" name="mdp" >
                        <?php if(@$_POST['submit_update_mdp'] AND !empty($erreur)){echo @$erreur;}?>
                    </div>


                    <div class="form-group">
                        <label for="confirm_mdp">Confirmer le nouveau mot de passe : </label>
                        <input type="password"  id="confirm_mdp" name="confirm_pass" >
                    </div>
                    <input type="submit" value="modifier le mot de passe" name="submit_update_mdp">
                </form>

                <?=$erreur?>

        <?php

        }

}