<?php
session_start();
if($_SESSION['uti_droits'] == 0) {header('location:../index.php');}

require_once('../utils/autoload.php');

$admin = new Model();
$req_all_users = $admin->SelectAll('utilisateurs');

View_Navigation::affichage_navigation(@$repere_page_acceuil);

View_Admin_Update::affiche_all_user($req_all_users);

View_Footer::Footer(@$repere_page_acceuil);
