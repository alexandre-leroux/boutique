<?php
require_once('../models/Models_Admin.php');
require_once('../View/view_Admin.php');
require_once('../controllers/Controller_admin.php');

$admin = new Model_Admin();

$requete_one_user = $admin->SelectOne("utilisateurs","id_utilisateurs","{$_GET['id_utilisateur']}");

View_Admin_Update::affiche_details_et_form_update_user($requete_one_user);

Controller_Admin::update_user($admin);


