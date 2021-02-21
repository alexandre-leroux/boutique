<?php
include('../models/Database.php');
?>

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
</div>

<div class="form-group">
    <label for="telephone">telephone : </label>
    <input  type="tel" id="telephone" name="telephone">
</div>

<div class="form-group">
    <label for="mdp"> Mot de passe : </label>
    <input type="password"  id="mdp" name="mdp" >
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

echo '<pre>';
var_dump($_POST);
echo '</pre>';

if($_POST['valider']){
    if(($_POST['mdp'] == $_POST['confirm_pass']) &&  preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$#',$_POST['mdp'])  ){
$bdd = new Database();
$sql = $bdd->connection_bdd();

$nom = htmlspecialchars($_POST['nom']) ;
$prenom = htmlspecialchars($_POST['prenom']) ;
$mail = htmlspecialchars($_POST['mail']) ;
$telephone = htmlspecialchars($_POST['telephone']) ;
$mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT) ; 
$rue = htmlspecialchars($_POST['rue']) ;
$code_postal = htmlspecialchars($_POST['code_postal']) ;
$ville = htmlspecialchars($_POST['ville']) ;

$requete = $sql->prepare("INSERT INTO utilisateurs(uti_nom,uti_prenom,uti_mail,uti_tel,uti_motdepasse,uti_rue,uti_code_postal,uti_ville) 
VALUES (:nom,:prenom,:mail,:telephone,:mdp,:rue,:code_postal,:ville)"); 

$requete->bindParam(':nom', $nom);
$requete->bindParam(':prenom', $prenom);
$requete->bindParam(':mail', $mail);
$requete->bindParam(':telephone', $telephone);
$requete->bindParam(':mdp', $mdp);
$requete->bindParam(':rue', $rue);
$requete->bindValue(':code_postal', $code_postal);
$requete->bindValue(':ville', $ville);

$requete->execute();
}

else{ echo 'error';}

}