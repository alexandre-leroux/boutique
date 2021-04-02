<?php
session_start();
if($_SESSION['uti_droits'] == 0) {header('location:../index.php');}

require_once('../utils/autoload.php');
View_Navigation::affichage_navigation(@$repere_page_acceuil);
View_Admin_Update::Page_choix_update_ou_insert();
View_Footer::Footer(@$repere_page_acceuil);