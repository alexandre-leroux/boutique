<?php
require_once('../models/Models_Admin.php');
require_once('../View/view_Admin.php');
require_once('../controllers/Controller_Admin.php');



Controller_Admin::inscription();


View_Admin_Update::form_inscription($error_mail_pris,$error_mdp);
?>

