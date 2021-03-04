<?php
session_start();

require_once('../view/View_Navigation.php');
require_once('../controllers/Controller_Navigation.php');

require_once('../View/View_Admin_Update.php');
include('../models/Model.php');

Controller_Navigation::affichage_navigation(@$repere_page_acceuil);
$admin = new Model();
$req_all_users = $admin->SelectAll('utilisateurs');

View_Admin_Update::affiche_all_user($req_all_users);


