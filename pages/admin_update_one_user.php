<?php
require_once('../models/Model_Admin_Update.php');
require_once('../View/view_Admin.php');
require_once('../controllers/Controller_admin_Update.php');

$admin = new Model_Admin_Update();

$requete_one_user = $admin->SelectOne("utilisateurs","id_utilisateurs","{$_GET['id_utilisateur']}");

View_Admin_Update::affiche_details_et_form_update_user($requete_one_user);

Controller_admin_Update::update_user($admin);


