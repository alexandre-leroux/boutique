<?php
session_start();

require_once('../utils/autoload.php');

View_Navigation::affichage_navigation(@$repere_page_acceuil);
$admin = new Model();
$req_all_users = $admin->SelectAll('utilisateurs');

View_Admin_Update::affiche_all_user($req_all_users);

View_Footer::Footer($repere_page_acceuil);
