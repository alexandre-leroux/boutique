<?php
include('../models/Database.php');

$bdd = new Database();
$sql = $bdd->connection_bdd();

if(isset($_POST['valider']))
{
    $mail = htmlspecialchars($_POST['mail']) ;
    $pass = htmlspecialchars($_POST['pass']);

    if(!empty($mail) && !empty($pass))
    {
        $resultat_users = $sql->prepare('SELECT * from utilisateurs WHERE uti_mail = :mail');
        $resultat_users->execute(array('mail' => $mail));
        $result = $resultat_users->fetch();
        
        if($result AND  password_verify($pass, $result['uti_motdepasse'] ))
        {
            echo 'connecté';
            $_SESSION['id_utilisateurs'] = $result['id_utilisateurs'];
            $_SESSION['uti_droits'] = $result['uti_droits'];
            $_SESSION['uti_nom'] = $result['uti_nom'];
            $_SESSION['uti_prenom'] = $result['uti_prenom'];
            $_SESSION['uti_mail'] = $result['uti_mail'];
            $_SESSION['uti_tel'] = $result['uti_tel'];
            $_SESSION['uti_rue'] = $result['uti_rue'];
            $_SESSION['uti_code_postal'] = $result['uti_code_postal'];
            $_SESSION['uti_ville'] = $result['uti_ville'];
            echo '<pre>';
            var_dump($_SESSION);
            echo '</pre>';
            }


        else{
            echo '<p class="error"> Login ou mot de passe incorrect </p>' ;
        }
    }
    else{
        echo'<p class="error"> Veuillez remplir tous les champs </p>'; 
    }
}







?>



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