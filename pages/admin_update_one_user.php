<?php
session_start();
require_once('../utils/autoload.php');

$admin = new Model_Admin_Update();
$requete_one_user = $admin->SelectOne("utilisateurs","id_utilisateurs","{$_GET['id_utilisateur']}");
Controller_admin_Update::update_user($admin);
$requete_one_user = $admin->SelectOne("utilisateurs","id_utilisateurs","{$_GET['id_utilisateur']}");


View_Navigation::affichage_navigation(@$repere_page_acceuil);

View_Admin_Update::affiche_details_et_form_update_user($requete_one_user);

View_Footer::Footer(@$repere_page_acceuil);