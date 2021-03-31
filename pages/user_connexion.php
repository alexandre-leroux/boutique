<?php
session_start();
if(isset($_SESSION['id_utilisateurs'])) {header('location:../index.php');}
require_once('../utils/autoload.php');
$error = Controller_User::connexion();

View_Navigation::navigation_visiteur(@$repere_page_acceuil);

View_User::form_connexion(@$error);  

View_Footer::Footer(@$repere_page_acceuil);




