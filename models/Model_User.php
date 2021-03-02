<?php
require_once('Model.php');

class Model_User extends Model{



    
    public function recherche_mail_existant()
        {
            $resultat_users = $this->bdd->prepare('SELECT uti_mail from utilisateurs WHERE uti_mail = :uti_mail');
            $resultat_users->execute(array('uti_mail'=> @$_POST['mail']));
            return $resultat_users->fetchall();
        }

    public function inscription_user()
        {

 

            $uti_droits = 0;
            $nom = htmlspecialchars($_POST['nom']) ;
            $prenom = htmlspecialchars($_POST['prenom']) ;
            $mail = htmlspecialchars($_POST['mail']) ;
            $telephone = htmlspecialchars($_POST['telephone']) ;
            $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT) ; 
            $rue = htmlspecialchars($_POST['rue']) ;
            $code_postal = htmlspecialchars($_POST['code_postal']) ;
            $ville = htmlspecialchars($_POST['ville']) ;

            $requete = $this->bdd->prepare("INSERT INTO utilisateurs(uti_droits,uti_nom,uti_prenom,uti_mail,uti_tel,uti_motdepasse,uti_rue,uti_code_postal,uti_ville) 
            VALUES (:uti_droits,:nom,:prenom,:mail,:telephone,:mdp,:rue,:code_postal,:ville)"); 

            $requete->bindParam(':uti_droits', $uti_droits);
            $requete->bindParam(':nom', $nom);
            $requete->bindParam(':prenom', $prenom);
            $requete->bindParam(':mail', $mail);
            $requete->bindParam(':telephone', $telephone);
            $requete->bindParam(':mdp', $mdp);
            $requete->bindParam(':rue', $rue);
            $requete->bindValue(':code_postal', $code_postal);
            $requete->bindValue(':ville', $ville);

            $requete->execute();
        }

        public function select_mail_connexion($mail)
        {
            $resultat_users = $this->bdd->prepare('SELECT * from utilisateurs WHERE uti_mail = :mail');
            $resultat_users->execute(array('mail' => $mail));
            return $resultat_users->fetch();
        }

        public function update_profile_user($nom,$prenom,$mail,$telephone,$rue,$code_postal,$ville)
            {
              
                $req_update = $this->bdd->prepare('UPDATE utilisateurs SET
                uti_nom = :uti_nom,
                uti_prenom = :uti_prenom,
                uti_mail = :uti_mail,
                uti_tel = :uti_tel,
                uti_rue = :uti_rue,
                uti_code_postal = :uti_code_postal,
                uti_ville = :uti_ville                     
                                            
                WHERE id_utilisateurs = :id');

                $req_update->execute(array(
                'uti_nom' => $nom,
                'uti_prenom' => $prenom,
                'uti_mail' => $mail,
                'uti_tel' => $telephone,
                'uti_rue' => $rue,
                'uti_code_postal' => $code_postal,
                'uti_ville' => $ville,
                'id' => $_SESSION['id_utilisateurs']
                                        ));
            }

    public function update_mot_de_passe($new_mdp)
            {
                $mdp_hash = password_hash($new_mdp, PASSWORD_DEFAULT) ;

                $req_update = $this->bdd->prepare('UPDATE utilisateurs SET
                uti_motdepasse = :uti_motdepasse
                                  
                WHERE id_utilisateurs = :id');

                $req_update->execute(array(
                'uti_motdepasse' => $mdp_hash,

                'id' => $_SESSION['id_utilisateurs']
                                            ));
            }

        
}