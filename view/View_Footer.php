<?php


class View_Footer{

    public static function Footer($repere_page_acceuil)
        {

            ?>
            <section id="footer">

            <!-- <img src="medias/bandeau_accueil.png" alt=""> -->

                <div id="conteneur_footer">
    
                        <div id="conteneur_logos">

                            <div class="logo_et_mini_slogan"><img src='<?php echo ($repere_page_acceuil) ? 'medias/126091-ecommerce-set/png/shop1.png' : '../medias/126091-ecommerce-set/png/shop1.png';?>' alt="logo_magasin"><p>Retrait gratuit en magasin</p> </div>
                            <div class="logo_et_mini_slogan"><img src="<?php echo ($repere_page_acceuil) ? 'medias/126091-ecommerce-set/png/headphones1.png' : '../medias/126091-ecommerce-set/png/headphones1.png';?>" alt="logo_service_client"><p>Service client 04.43.02.45.71</p> </div>
                            <div class="logo_et_mini_slogan">   <img src="<?php echo ($repere_page_acceuil) ? 'medias/126091-ecommerce-set/png/like1.png' : '../medias/126091-ecommerce-set/png/like1.png';?>" alt="logo_satisait_ou_remboursé"><p>Satisfait ou remboursé</p> </div>
                            <div class="logo_et_mini_slogan">   <img src="<?php echo ($repere_page_acceuil) ? 'medias/126091-ecommerce-set/png/settings1.png' : '../medias/126091-ecommerce-set/png/settings1.png';?>" alt="logo paiement securisé"><p>Paiement sécurisé</p> </div>
                            <div class="logo_et_mini_slogan"> <img id="trucks" src=" <?php echo ($repere_page_acceuil) ? 'medias/126091-ecommerce-set/png/truck-1.png' : '../medias/126091-ecommerce-set/png/truck-1.png';?>" alt="logo"><p>Frais de port gratuits > 75€ en France métropolitaine</p> </div>

                        </div>

                        <div id="accueil_newletter"> 
                        
                            <p>NEWLETTER TENNISWORLD</br> Recevez toutes les nouveautés en avant première</p>
                            <div id="input_newletter">
                                <input type="text" placeholder="Saisissez votre adresse e-mail">
                                <button  onclick="document.location.href='';"><i class="fa fa-arrow-right"></i></i></button>
                            </div>
                        </div>
    
                        <div id="conteneur_footer_infos">

                            <div class="footer_infos">
                                <h2>NOS BOUTIQUES</h2></br>
                                <p>Le Raincy - 80 avenue de la résistance
                                    93340 Le Raincy - 01.43.02.83.83</p></br>
                                <p>Paris - 155 rue de Bagnolet (habillement)
                                    75020 Paris - 01.40.30.31.28</p></br>
                                <p>Paris - 151 rue de Bagnolet (matériel)
                                    75020 Paris - 01.40.31.00.13</p></br>
                                <p>Gentilly - 24 avenue Paul Vaillant Couturier
                                    94250 Gentilly - 01.46.64.65.11</p></br>
                                <p>Boulogne - 39 avenue Edouard Vaillant
                                    92100 Boulogne - 01.46.21.50.40</p></br>
                                <p>Paris 16eme - 35 boulevard Murat
                                    75016 Paris - 01.45.20.54.29</p></br>
                            </div>

                            <div class="footer_infos">
                                <h2>SERVICES</h2></br>
                                <a href="">Choisir sa raquette</a>
                                <a href="">Choisir son cordage</a>
                                <a href="">Guide des tailles</a>
                                <a href="">Vidéos tutos et conseils</a>
                        
                            </div>

                            <div class="footer_infos">
                                <h2>INFORMATIONS</h2></br>
                                <a href="">Nos magasins</a>
                                <a href="">Mentions légales</a>
                                <a href="">C.G.V</a>
                                <a href="">Données personnelles</a>
                                <a href="">Paiement sécurisé</a>
                                <a href="">Plan du site</a>
                                <a href="">Contactez-nous</a>
                            </div>
                     
                        </div>
    
                </div>

                <div id="cache_espace_blanc"></div>

      

            </section>


            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script>


                $(".burger .fa").click(function(){

                    $(".menu_depliant").slideToggle();
                    console.log('click')
                    })


 
         
            </script>
            <?php






        }












}