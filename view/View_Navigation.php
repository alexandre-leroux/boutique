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
                        {echo'<a href="index.php"><img src="medias/logo.png" alt="logo"></a>';}    
                        else
                        {echo'<a href="../index.php"><img src="../medias/logo.png" alt="logo"></a>';}
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
                    <form class="form_recherche" action="<?php echo ($repere_page_acceuil) ? 'pages/recherche.php' : '../pages/recherche.php';?>" method="post">
                        <input name="rechercher" minlength="3" type="search" aria-label="Search through site content" placeholder="Rechercher..." >
                        <button  type="submit"><i class="fa fa-search"></i></button>
                        <!-- <input class="fa fa-search" value="" type="submit"> -->
                    </form>
                </div>
            </div>

            <div class="burger">
                <i class="fa fa-align-justify fa-3x"></i>

            </div>

        </header>

                <div class="menu_depliant">
                    <div>
                        <a href="<?php echo ($repere_page_acceuil) ? 'index.php' : '../index.php';?>">ACCUEIL</a>
                    </div>
                  <div>
                      <a href="<?php echo ($repere_page_acceuil) ? 'pages/user_inscription.php' : 'user_inscription.php';?>">INSCRIPTION</a>
                  </div>
                  <div>
                      <a href="<?php echo ($repere_page_acceuil) ? 'pages/user_connexion.php' : 'user_connexion.php';?>">CONNEXION</a>         
                  </div>
                </div>

        <nav class="nav">

            <ul class="liste_nav">
                
                <li><a href="<?= ($repere_page_acceuil) ? 'pages/raquettes.php' : 'raquettes.php';?>">Raquettes</a></li>
                <li><a href="<?= ($repere_page_acceuil) ? 'pages/sacs.php' : 'sacs.php';?>">Sacs</a></li>
                <li><a href="<?= ($repere_page_acceuil) ? 'pages/cordages.php' : 'cordages.php';?>">Cordages</a></li>
                <li><a href="<?= ($repere_page_acceuil) ? 'pages/balles.php' : 'balles.php';?>">Balles</a></li>
                <li><a href="<?= ($repere_page_acceuil) ? 'pages/accessoires.php' : 'accessoires.php';?>">Accessoires</a></li>
                <li><a href="<?= ($repere_page_acceuil) ? 'pages/panier.php' : 'panier.php' ;?>"><i class="fa fa-shopping-cart fa-lg"></i></a><span class="compteur_panier"><?php if(isset($_SESSION['panier'])) { echo count($_SESSION['panier']) ;} ?></span></li>
        

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
                        {echo'<a href="index.php"><img src="medias/logo.png" alt="logo"></a>';}    
                        else
                        {echo'<a href="../index.php"><img src="../medias/logo.png" alt="logo"></a>';}
                ?>
                        </div>

                        <div class="accueil">
                            <a href="<?php echo ($repere_page_acceuil) ? 'index.php' : '../index.php';?>">ACCUEIL</a>
                            <p>|</p>
                            <a href="<?php echo ($repere_page_acceuil) ? 'pages/user_modification_profil.php' : 'user_modification_profil.php';?>">MON COMPTE</a>
                            <p>|</p>
                            <a href="<?php echo ($repere_page_acceuil) ? 'pages/deconnexion.php' : 'deconnexion.php';?>">DECONNEXION</a>
    
                        </div>

                        <div class="search_bar">
                                <div class="border">
                                    <form class="form_recherche" action="<?php echo ($repere_page_acceuil) ? 'pages/recherche.php' : '../pages/recherche.php';?>" method="post">
                                        <input name="rechercher" minlength="3" type="search" aria-label="Search through site content" placeholder="Rechercher..." >
                                        <button  type="submit"><i class="fa fa-search"></i></button>
                                        <!-- <input class="fa fa-search" value="" type="submit"> -->
                                    </form>
                                </div>
                            </div>
                        <!-- https://www.w3schools.com/howto/howto_js_mobile_navbar.asp -->
                        <a class="burger" >
                            <i class="fa fa-align-justify fa-3x"></i>
                        </a>

                        </header>

                        <div class="menu_depliant">
                                <div>
                                    <a href="<?php echo ($repere_page_acceuil) ? 'index.php' : '../index.php';?>">ACCUEIL</a>
                                </div>
                                <div>
                                    <a href="<?php echo ($repere_page_acceuil) ? 'pages/user_modification_profil.php' : 'user_modification_profil.php';?>">MON COMPTE</a>
                                </div>
                                <div>
                                    <a href="<?php echo ($repere_page_acceuil) ? 'pages/deconnexion.php' : 'deconnexion.php';?>">DECONNEXION</a>        
                                </div>
                        </div>

                        <nav class="nav">

                        <ul class="liste_nav">
                            
                            <li><a href="<?= ($repere_page_acceuil) ? 'pages/raquettes.php' : 'raquettes.php';?>">Raquettes</a></li>
                            <li><a href="<?= ($repere_page_acceuil) ? 'pages/sacs.php' : 'sacs.php';?>">Sacs</a></li>
                            <li><a href="<?= ($repere_page_acceuil) ? 'pages/cordages.php' : 'cordages.php';?>">Cordages</a></li>
                            <li><a href="<?= ($repere_page_acceuil) ? 'pages/balles.php' : 'balles.php';?>">Balles</a></li>
                            <li><a href="<?= ($repere_page_acceuil) ? 'pages/accessoires.php' : 'accessoires.php';?>">Accessoires</a></li>
                            <li><a href="<?= ($repere_page_acceuil) ? 'pages/panier.php' : 'panier.php' ;?>"><i class="fa fa-shopping-cart fa-lg"></i></a><span class="compteur_panier"><?php if(isset($_SESSION['panier'])) { echo count($_SESSION['panier']) ;} ?></span></li>

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
                        {echo'<a href="index.php"><img src="medias/logo.png" alt="logo"></a>';}    
                        else
                        {echo'<a href="../index.php"><img src="../medias/logo.png" alt="logo"></a>';}
                ?>
            </div>

            <div class="accueil">
               <a href="<?php echo ($repere_page_acceuil) ? 'index.php' : '../index.php';?>">ACCUEIL</a>
               <p>|</p>
               <a href="<?php echo ($repere_page_acceuil) ? 'pages/admin_accueil_gestion_site.php' : 'admin_accueil_gestion_site.php';?>">GESTION DU SITE</a>
               <p>|</p>
               <a href="<?php echo ($repere_page_acceuil) ? 'pages/admin_affiche_all_user.php' : 'admin_affiche_all_user.php';?>">GESTION DES UTILISATEURS</a>
               <p>|</p>
               <a href="<?php echo ($repere_page_acceuil) ? 'pages/deconnexion.php' : 'deconnexion.php';?>">DECONNEXION</a>
            </div>

            <div class="search_bar">
                <div class="border">
                    <form class="form_recherche" action="<?php echo ($repere_page_acceuil) ? 'pages/recherche.php' : '../pages/recherche.php';?>" method="post">
                        <input name="rechercher" minlength="3" type="search" aria-label="Search through site content" placeholder="Rechercher..." >
                        <button  type="submit"><i class="fa fa-search"></i></button>
                        <!-- <input class="fa fa-search" value="" type="submit"> -->
                    </form>
                </div>
            </div>
            <!-- https://www.w3schools.com/howto/howto_js_mobile_navbar.asp -->
            <a class="burger" >
                <i class="fa fa-align-justify fa-3x"></i>
            </a>

            </header>
            <div class="menu_depliant">
                    <div>
                        <a href="<?php echo ($repere_page_acceuil) ? 'index.php' : '../index.php';?>">ACCUEIL</a>
                    </div>
                  <div>
                        <a href="<?php echo ($repere_page_acceuil) ? 'pages/admin_update_article.php' : 'admin_update_article.php';?>">GESTION DU SITE</a>
                  </div>
                  <div>
                    <a href="<?php echo ($repere_page_acceuil) ? 'pages/admin_affiche_all_user.php' : 'admin_affiche_all_user.php';?>">GESTION DES UTILISATEURS</a> 
                  </div>
                  <div>
                  <a href="<?php echo ($repere_page_acceuil) ? 'pages/deconnexion.php' : 'deconnexion.php';?>">DECONNEXION</a>
                  </div>
            </div>
            <nav class="nav">

            <ul class="liste_nav">
                
                <li><a href="<?= ($repere_page_acceuil) ? 'pages/raquettes.php' : 'raquettes.php';?>">Raquettes</a></li>
                <li><a href="<?= ($repere_page_acceuil) ? 'pages/sacs.php' : 'sacs.php';?>">Sacs</a></li>
                <li><a href="<?= ($repere_page_acceuil) ? 'pages/cordages.php' : 'cordages.php';?>">Cordages</a></li>
                <li><a href="<?= ($repere_page_acceuil) ? 'pages/balles.php' : 'balles.php';?>">Balles</a></li>
                <li><a href="<?= ($repere_page_acceuil) ? 'pages/accessoires.php' : 'accessoires.php';?>">Accessoires</a></li>
                <li><a href="<?= ($repere_page_acceuil) ? 'pages/panier.php' : 'panier.php' ;?>"><i class="fa fa-shopping-cart fa-lg"></i></a><span class="compteur_panier"><?php if(isset($_SESSION['panier'])) { echo count($_SESSION['panier']) ;} ?></span></li>


            </ul>

        </nav>

        <?php





    }


    public static function affichage_navigation($repere_page_acceuil)
    {

        if(!isset($_SESSION['id_utilisateurs']))
            {
                View_Navigation::navigation_visiteur($repere_page_acceuil);
            }
        if(isset($_SESSION['id_utilisateurs']) AND $_SESSION['uti_droits'] == 0)
            {
                View_Navigation::navigation_utilisateur_connecte($repere_page_acceuil);
            }
        if(isset($_SESSION['id_utilisateurs']) AND $_SESSION['uti_droits'] == 1 )
            {
                View_Navigation::navigation_admin($repere_page_acceuil);
            }

    }

















}