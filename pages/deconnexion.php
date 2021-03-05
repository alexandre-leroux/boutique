<?php
session_start();
session_destroy();

require_once('../utils/autoload.php');



Controller_Navigation::affichage_navigation(@$repere_page_acceuil);

View_User::user_message_deconnexion();