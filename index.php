<?php
session_start();
require_once('view/View_Navigation.php');
$repere_page_acceuil = 1;

View_Navigation::navigation_visiteur($repere_page_acceuil);


?>
</br>
<a href="pages/admin_update_article.php">lien vers page générale update</a></br>
<a href="pages/user_inscription.php">lien vers page d'inscription</a></br>
<a href="pages/connexion.php">lien vers page de connexion</a></br>
<a href="pages/admin_affiche_all_user.php">lien vers page admin modif users</a></br>
<a href="pages/user_modification_profil.php">lien vers page user modif profil</a></br></br>
<a href="pages/admin_insert.php">lien vers page admin insert article</a></br></br>
<a href="pages/boutique.php">lien vers page boutique</a></br>
<a href="pages/article.php">lien vers page article</a></br>

<?php

