<?php

function getPdo(){
    $bdd = new PDO('mysql:host=localhost;dbname=boutique', "root", "");
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;

    return $bdd; 
}

function displayCat(){

    $bdd = getPdo();
    $requete = $bdd->prepare("SELECT * FROM categorie"); 
    $requete->execute();

    return $requete->fetchAll(); 
}

function displayMarques(){

    $bdd = getPdo();
    $requete = $bdd->prepare("SELECT * FROM marques") ;
    $requete->execute();

    return $requete->fetchAll(); 
}

// function selectCat(){
//     $bdd = getPdo();

//     if($_POST)
// }