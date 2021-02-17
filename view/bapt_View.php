<?php

class View {

    public function formRaquette(){
        echo '<form action="index.php" method="post">

        <div>
            <label for="poids"> Poids : </label>
            <input type="number" name="raq_poids" id="poids">
        </div>
    
        <div>
            <label for="tamis"> Tamis : </label>
            <input type="number" name="raq_tamis" id="tamis">
        </div>
    
        <div>
            <label for="equilibre"> Equilibre : </label>
            <input type="number" name="raq_equilibre" id="equilibre">
        </div>
    
        <div>
            <label for="taille_manche"> Taille manche : </label>
            <input type="number" name="raq_taille_manche" id="taille_manche">
        </div>
    
    </form>' ;

    }

    public function formSac(){
        echo '<form action="index.php" method="post">

        <div>
            <input type="radio" id="choix_3" name="choix_thermo" value="choix_3" checked>             
            <label for="choix_3">3</label>
        </div>
    
        <div>
            <input type="radio" id="choix_6" name="choix_thermo" value="choix_6" checked>             
            <label for="choix_3">6</label>
        </div>
    
        <div>
            <input type="radio" id="choix_9" name="choix_thermo" value="choix_9" checked>             
            <label for="choix_9">9</label>
        </div>
    
        <div>
            <input type="radio" id="choix_12" name="choix_thermo" value="choix_12" checked>             
            <label for="choix_12">12</label>
        </div>
    
        <div>
            <input type="radio" id="choix_15" name="choix_thermo" value="choix_15" checked>             
            <label for="choix_15">15</label>
        </div>
    </form>' ;
    }

    public function formCordage(){
        echo '<form action="index.php" method="post">
        <label for="jauge"> Jauge : </label>
        <input type="number" name="cor_jauge" id="jauge">
    </form>' ;
    }
}