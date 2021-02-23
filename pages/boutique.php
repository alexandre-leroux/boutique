<?php

require_once("../models/bapt_Article.php");

$article = new Article(); 

$result = $article->displayAllArticles(); 

//$result = $article-> displayImages(); 

var_dump($result);



