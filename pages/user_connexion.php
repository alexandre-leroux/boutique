<?php
session_start();
require_once('../models/Model_User.php');
require_once('../View/view_User.php');
require_once('../controllers/Controller_User.php');
require_once('../view/View_Navigation.php');


View_Navigation::navigation_visiteur(@$repere_page_acceuil);

$error = Controller_User::connexion();

View_User::form_connexion(@$error);  


?>



