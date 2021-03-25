<?php
session_start();
// require_once("../models/Model_Article.php"); 
// require_once("../view/View_Article.php"); 
// require_once("../controllers/Controller_Article.php");
// require_once('../view/View_Navigation.php');
// require_once('../controllers/Controller_Navigation.php');


require_once('../utils/autoload.php');
$article = new Model_Article(); 
$display = new view_Article();
$controller_article = new controller_Article();
$repere_page_acceuil = 0;


View_Navigation::affichage_navigation(@$repere_page_acceuil);

$controller_article->catProduits("raquettes",1,$article,$display);

View_Footer::Footer($repere_page_acceuil);