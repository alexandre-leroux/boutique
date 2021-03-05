<?php
session_start();
require_once("../models/Model_Article.php"); 
require_once("../view/View_Article.php"); 
require_once("../controllers/Controller_Article.php");
require_once('../view/View_Navigation.php');
require_once('../controllers/Controller_Navigation.php');

$article = new Article(); 
$display = new viewArticle();
$controller_article = new controllerArticle();
$repere_page_acceuil = 0;


Controller_Navigation::affichage_navigation($repere_page_acceuil);

$controller_article->catProduits("raquettes",1,$article,$display);


