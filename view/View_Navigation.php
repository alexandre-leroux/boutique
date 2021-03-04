<?php

class  View_Navigation{


public static function head_doctype($repere_page_acceuil)
    {
        ?>

        <!DOCTYPE html>
        <html lang="fr">
        
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Boutique</title>


                <?php if($repere_page_acceuil) 
                        {echo'<link rel="stylesheet" href="style/dart-sass/style.css">';}    
                        else
                        {echo'<link rel="stylesheet" href="../style/dart-sass/style.css">';}
                ?>

                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            </head>
        
            <body>

        <?php

    }


public static function navigation_visiteur($repere_page_acceuil)
    {
        View_Navigation::head_doctype($repere_page_acceuil);

        ?>
        
        <header>

            <div class="logo">
        
                <?php if($repere_page_acceuil) 
                        {echo'<a href="index.php"><img src="medias/logo.svg" alt="logo"></a>';}    
                        else
                        {echo'<a href="../index.php"><img src="../medias/logo.svg" alt="logo"></a>';}
                ?>
            </div>

            <div class="accueil">
                <a href="<?php echo ($repere_page_acceuil) ? 'index.php' : '../index.php';?>">ACCUEIL</a>
                <p>|</p>
                <a href="<?php echo ($repere_page_acceuil) ? 'pages/user_inscription.php' : 'user_inscription.php';?>">INSCRIPTION</a>
                <p>|</p>
                <a href="<?php echo ($repere_page_acceuil) ? 'pages/user_connexion.php' : 'user_connexion.php';?>">CONNEXION</a>
            </div>

            <div class="search_bar">
                <div class="border">
                    <input type="search" aria-label="Search through site content" placeholder="Rechercher..." >
                    <button><i class="fa fa-search"></i></button>
                </div>
            </div>
<!-- https://www.w3schools.com/howto/howto_js_mobile_navbar.asp -->
            <div class="burger">
                <i class="fa fa-align-justify fa-3x"></i>
                <div class="accueil">
                    <a href="<?php echo ($repere_page_acceuil) ? 'index.php' : '../index.php';?>">ACCUEIL</a>
                    <p>|</p>
                    <a href="<?php echo ($repere_page_acceuil) ? 'pages/user_inscription.php' : 'user_inscription.php';?>">INSCRIPTION</a>
                    <p>|</p>
                    <a href="<?php echo ($repere_page_acceuil) ? 'pages/user_connexion.php' : 'user_connexion.php';?>">CONNEXION</a>
                </div>
            </div>

        </header>

        <nav class="nav">

            <ul class="liste_nav">
                
                <li><a href="">Raquettes</a></li>
                <li><a href="">Sacs</a></li>
                <li><a href="">Balles</a></li>
                <li><a href="">Accessoires</a></li>

            </ul>

        </nav>

        <?php



    }



public static function navigation_utilisateur_connecte($repere_page_acceuil)
    {
        View_Navigation::head_doctype($repere_page_acceuil);

        ?>
        
                        <header>

                        <div class="logo">
                        <?php if($repere_page_acceuil) 
                        {echo'<a href="index.php"><img src="medias/logo.svg" alt="logo"></a>';}    
                        else
                        {echo'<a href="../index.php"><img src="../medias/logo.svg" alt="logo"></a>';}
                ?>
                        </div>

                        <div class="accueil">
                            <a href="<?php echo ($repere_page_acceuil) ? 'index.php' : '../index.php';?>">ACCUEIL</a>
                            <p>|</p>
                            <a href="<?php echo ($repere_page_acceuil) ? 'pages/user_modification_profil.php' : 'user_modification_profil.php';?>">MON COMPTE</a>
                            <p>|</p>
                            <a href="<?php echo ($repere_page_acceuil) ? 'pages/messages_et_redirections/deconnexion.php' : 'messages_et_redirections/deconnexion.php';?>">DECONNEXION</a>
                            <p>|</p>
                            <a href="<?php echo ($repere_page_acceuil) ? 'pages/user_connexion.php' : '';?>">PANIER</a>
                        </div>

                        <div class="search_bar">
                            <div class="border">
                                <input type="search" aria-label="Search through site content" placeholder="Rechercher..." >
                                <button><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <!-- https://www.w3schools.com/howto/howto_js_mobile_navbar.asp -->
                        <a class="burger" >
                            <i class="fa fa-align-justify fa-3x"></i>
                        </a>
                        <div class="menu-burger" >
                            <a href="">ACCUEIL</a>

                            <a href="">MON COMPTE</a>

                            <a href="">PANIER</a>
                        </div>

                        </header>

                        <nav class="nav">

                        <ul class="liste_nav">
                            
                            <li><a href="">Raquettes</a></li>
                            <li><a href="">Sacs</a></li>
                            <li><a href="">Balles</a></li>
                            <li><a href="">Accessoires</a></li>

                        </ul>

                        </nav>

        <?php



    }





    public static function navigation_admin($repere_page_acceuil)
    {
        View_Navigation::head_doctype($repere_page_acceuil);

        ?>
        <header>

            <div class="logo">
                <?php if($repere_page_acceuil) 
                        {echo'<a href="index.php"><img src="medias/logo.svg" alt="logo"></a>';}    
                        else
                        {echo'<a href="../index.php"><img src="../medias/logo.svg" alt="logo"></a>';}
                ?>
            </div>

            <div class="accueil">
               <a href="<?php echo ($repere_page_acceuil) ? 'index.php' : '../index.php';?>">ACCUEIL</a>
               <p>|</p>
               <a href="<?php echo ($repere_page_acceuil) ? 'pages/admin_accueil_gestion_site.php' : 'admin_accueil_gestion_site.php';?>">GESTION DU SITE</a>
               <p>|</p>
               <a href="<?php echo ($repere_page_acceuil) ? 'pages/admin_affiche_all_user.php' : 'admin_affiche_all_user.php';?>">GESTION DES UTILISATEURS</a>
               <p>|</p>
               <a href="<?php echo ($repere_page_acceuil) ? 'pages/messages_et_redirections/deconnexion.php' : 'messages_et_redirections/deconnexion.php';?>">DECONNEXION</a>
            </div>

            <div class="search_bar">
                <div class="border">
                    <input type="search" aria-label="Search through site content" placeholder="Rechercher..." >
                    <button><i class="fa fa-search"></i></button>
                </div>
            </div>
            <!-- https://www.w3schools.com/howto/howto_js_mobile_navbar.asp -->
            <a class="burger" >
                <i class="fa fa-align-justify fa-3x"></i>
            </a>
            <div class="menu-burger" >
                <a href="<?php echo ($repere_page_acceuil) ? 'index.php' : '../index.php';?>">ACCUEIL</a>
                <p>|</p>
                <a href="<?php echo ($repere_page_acceuil) ? 'pages/admin_update_article.php' : 'admin_update_article.php';?>">GESTION DU SITE</a>
                <p>|</p>
                <a href="<?php echo ($repere_page_acceuil) ? 'pages/admin_affiche_all_user.php' : 'admin_affiche_all_user.php';?>">GESTION DES UTILISATEURS</a>
                <p>|</p>
                <a href="<?php echo ($repere_page_acceuil) ? 'pages/messages_et_redirections/deconnexion.php' : 'messages_et_redirections/deconnexion.php';?>">DECONNEXION</a>
            </div>

            </header>

            <nav class="nav">

            <ul class="liste_nav">
                
                <li><a href="">Raquettes</a></li>
                <li><a href="">Sacs</a></li>
                <li><a href="">Balles</a></li>
                <li><a href="">Accessoires</a></li>

            </ul>

        </nav>

        <?php



    }




















}