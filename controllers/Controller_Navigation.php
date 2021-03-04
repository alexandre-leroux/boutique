<?php
// require_once('../view/View_Navigation.php');

class Controller_Navigation{


public static function affichage_navigation($repere_page_acceuil)
    {

        if(!isset($_SESSION['id_utilisateurs']))
            {
                View_Navigation::navigation_visiteur($repere_page_acceuil);
            }
        if(isset($_SESSION['id_utilisateurs']))
            {
                View_Navigation::navigation_utilisateur_connecte($repere_page_acceuil);
            }

    }


}