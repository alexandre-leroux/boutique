<?php

require_once("models/bapt_Model.php") ;
require_once("models/bapt_Admin.php");

class Controller extends Models {

    public function checkImage($result){
        
        if(isset($_FILES['image']) AND !empty($_FILES['image']['name'])){
            var_dump($_FILES['image']);
            for($i = 0 ; isset($_FILES['image']['size'][$i]) ; $i++)
            {   
                $tailleMax = 2097152; 
                $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
                if($_FILES['image']['size'][$i] <= $tailleMax)
                {
                     $extensionUpload = strtolower(substr(strrchr($_FILES['image']['name'][$i], '.'),1));
                     if(in_array($extensionUpload, $extensionsValides))
                     {
                         $chemin = "medias/img_articles/".$result['id_articles']."-".$i.".".$extensionUpload;
                         $mouvement = move_uploaded_file($_FILES['image']['tmp_name'][$i], $chemin ); 
                         if($mouvement)
                         {
                            insertImage($extensionUpload, $i);
                         }
                         else{
                            return "Erreur durant l'importation du fichier"; 
                        }
                     }
                     else{
                        return "Votre image doit etre au format jpg, jpeg, gif ou png" ;
                     }
                }
                else{
                    return "L'image ne dois pas dépasser 2mo" ; 
                }
    
            }
        }
    }
}