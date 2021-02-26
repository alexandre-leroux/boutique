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

    

}