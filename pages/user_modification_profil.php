<?php
require_once('../models/Model_User.php');
require_once('../View/view_User.php');
require_once('../controllers/Controller_User.php');
$user = new Model();

//modifier le tout avec recupe de l'id en $_SESSION
$result = $user->SelectOne('utilisateurs','id_utilisateurs',1);



$_SESSION['id_utilisateurs'] = $result['id_utilisateurs'];
$_SESSION['uti_nom'] = $result['uti_nom'];
$_SESSION['uti_mail'] = $result['uti_mail'];
$_SESSION['uti_prenom'] = $result['uti_prenom'];
$_SESSION['uti_tel'] = $result['uti_tel'];
$_SESSION['uti_rue'] = $result['uti_rue'];
$_SESSION['uti_code_postal'] = $result['uti_code_postal'];
$_SESSION['uti_ville'] = $result['uti_ville'];
$_SESSION['uti_motdepasse'] = $result['uti_motdepasse'];

var_dump($_SESSION);
View_user::form_update_profil();
echo '<pre>';
var_dump($_POST);
echo '</pre>';
$a = Controller_user::update_profil();
echo $a;