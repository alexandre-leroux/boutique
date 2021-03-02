<?php
require_once('../models/Model_User.php');
require_once('../View/view_User.php');
require_once('../controllers/Controller_User.php');



Controller_User::inscription();


View_User::form_inscription($error_mail_pris,$error_mdp);

?>

