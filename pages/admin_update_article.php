<?php
require_once('../models/alx-Admin.php');
require_once('../View/view_admin_update_article.php');


$admin = new Admin();

$tous_les_articles = $admin->select_all_articles_updates();


Affichage_admin_update::affiche_all_articles($tous_les_articles);



