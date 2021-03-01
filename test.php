<?php

 /**
     * Insertion d'une ou plusieurs images lors de l'ajout de l'article
     *
     * @param [type] $extensionUpload
     * @param [type] $i
     * @return void
     */
    public function insertImage($extensionUpload, $i): void {

        $result = getAllInfosArticle();
        $nom = ''.$result['id_articles'].'-'.$i.'.'.$extensionUpload.''; 
    
        $requete = $this->bdd->prepare('INSERT INTO images_articles (id_articles, chemin)
                                    VALUES (:id_articles, :chemin)'
        );
        
        $requete->bindParam(':id_articles', $result['id_articles']);
        $requete->bindParam(':chemin',$nom);
    
        $requete->execute();
    
    }

    
    public function checkImage($result,$admin){
        
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
                         $chemin = "../medias/img_articles/".$result['id_articles']."-".$i.".".$extensionUpload;
                         $mouvement = move_uploaded_file($_FILES['image']['tmp_name'][$i], $chemin ); 
                         if($mouvement)
                         {
                            $admin->insertImage($extensionUpload, $i);
                         }
                         else{
                            echo "Erreur durant l'importation du fichier"; 
                        }
                     }
                     else{
                        echo "Votre image doit etre au format jpg, jpeg, gif ou png" ;
                     }
                }
                else{
                    echo "L'image ne dois pas dépasser 2mo" ; 
                }
    
            }
        }
    }

?>

    <label for="image"> Image : </label>
    <input id="image" type="file" name="image[]" multiple>