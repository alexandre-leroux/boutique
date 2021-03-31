<?php
session_start();
require_once('../utils/autoload.php');

View_Navigation::affichage_navigation(@$repere_page_acceuil);



View_User::user_message_connexion();

View_Footer::Footer(@$repere_page_acceuil);