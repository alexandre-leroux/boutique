<?php
session_start();

require_once('../view/View_Navigation.php');
require_once('../controllers/Controller_Navigation.php');
Controller_Navigation::affichage_navigation(@$repere_page_acceuil);
?>
<a href="admin_insert.php">AJOUTER UN NOUVEL ARTICLE</a></br>
<a href="admin_update_article.php">MODIFIER UN ARTICLE EXISTANT</a></br>