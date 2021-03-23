<?php
session_start();
require_once('../utils/autoload.php');

$article = new Model_Article(); 
$display = new View_Article();
$controller_article = new Controller_Article();
$repere_page_acceuil = 0;


View_Navigation::affichage_navigation($repere_page_acceuil);

$controller_article->catProduits("sacs",2,$article,$display);
