<?php
require_once('../utils/autoload.php');

Controller_User::inscription();



View_Navigation::navigation_visiteur(@$repere_page_acceuil);



View_User::form_inscription($error_mail_pris,$error_mdp);

?>

