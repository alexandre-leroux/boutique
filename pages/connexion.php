<?php
require_once('../models/Models_Admin.php');
require_once('../View/view_Admin.php');
require_once('../controllers/Controller_Admin.php');

$error = Controller_Admin::connexion();

View_Admin_Update::form_connexion(@$error);  





?>



