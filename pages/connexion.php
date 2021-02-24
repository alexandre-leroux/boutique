<?php
require_once('../models/Model_User.php');
require_once('../View/view_User.php');
require_once('../controllers/Controller_User.php');

$error = Controller_User::connexion();

View_User::form_connexion(@$error);  





?>



