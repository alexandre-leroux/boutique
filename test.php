<?php

require_once('models/Model.php');

$test = new Model();

$req = $test->SelectAll('marques');

echo '<pre>';
var_dump($req);
echo '</pre>';

$req2 = $test->SelectOne('articles', 'id_articles', 2);

echo '<pre>';
var_dump($req2);
echo '</pre>';

$req3 = $test->DeleteOne('articles', 'id_articles', 7);
var_dump($req3);