<?php
session_start();
require_once('../utils/autoload.php');
View_Navigation::affichage_navigation(@$repere_page_acceuil);
?>
<a href="admin_insert.php">AJOUTER UN NOUVEL ARTICLE</a></br>
<a href="admin_update_article.php">MODIFIER UN ARTICLE EXISTANT</a></br>

