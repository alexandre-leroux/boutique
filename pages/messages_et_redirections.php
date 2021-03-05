<?php

session_start();

require_once('../utils/autoload.php');



Controller_Navigation::affichage_navigation(@$repere_page_acceuil);



if(isset($_GET['admin_message_update_article']))
{
   View_Admin_Update::admin_message_update();
}






?>
