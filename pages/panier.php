<?php
session_start();

$id_produit_panier = array_keys($_SESSION['panier']) ; // renvoie un tableau qui recup tous les id_articles de la sessions
var_dump($ids);
var_dump($_SESSION); 