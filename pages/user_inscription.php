<?php
session_start();
if(isset($_SESSION['id_utilisateurs'])) {header('location:../index.php');}
require_once('../utils/autoload.php');
Controller_User::inscription();


View_Navigation::navigation_visiteur(@$repere_page_acceuil);

View_User::form_inscription($error_mail_pris,$error_mdp);

View_Footer::Footer(@$repere_page_acceuil);
?>

