<?php
require_once('../models/Models_Admin.php');
require_once('../View/view_Admin.php');


$admin = new Admin();

$tous_les_articles = $admin->select_all_articles_updates();


Affichage_admin_update::affiche_all_articles($tous_les_articles);



