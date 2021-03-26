<?php
require_once('../Models/Model_user.php');


class Controller_User{

    public $bdd;

public static function inscription()
            {  
                global $error_mdp;
                global $error_mail_pris;

                if(@$_POST['valider'])
                {
                
                    $admin = new Model_User();
                    $result = $admin->recherche_mail_existant();

                    if ($result == null)
                        {

                            if(($_POST['mdp'] == $_POST['confirm_pass']) ){
                    
                                $admin->inscription_user();
                                header('Location:inscription_reussie.php');
                                exit();
                                }
                    
                            else{ return  $error_mdp = 'Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un caractère spécial et un chiffre';}
                    
                        
                        }
                    else
                    { return  $error_mail_pris = 'email déjà utilisé';}

                }
            }


 public static function connexion()
            {
                $admin = new Model_User();
    
                if(isset($_POST['valider']))
                {
                    $mail = htmlspecialchars($_POST['mail']) ;
                    $pass = htmlspecialchars($_POST['pass']);
    
                    if(!empty($mail) && !empty($pass))
                    {
                        $result = $admin->select_mail_connexion($mail);
                        
                        if($result AND  password_verify($pass, $result['uti_motdepasse'] ))
                        {
                            $_SESSION['id_utilisateurs'] = $result['id_utilisateurs'];
                            $_SESSION['uti_droits'] = $result['uti_droits'];
                            $_SESSION['uti_nom'] = $result['uti_nom'];
                            $_SESSION['uti_prenom'] = $result['uti_prenom'];
                            $_SESSION['uti_mail'] = $result['uti_mail'];
                            $_SESSION['uti_tel'] = $result['uti_tel'];
                            $_SESSION['uti_rue'] = $result['uti_rue'];
                            $_SESSION['uti_code_postal'] = $result['uti_code_postal'];
                            $_SESSION['uti_ville'] = $result['uti_ville'];
                            header('location:connexion_reussie.php');
                            }
    
    
                        else{
                            return 'Login ou mot de passe incorrect' ;
                        }
                    }
                    else{
                        return 'Veuillez remplir tous les champs'; 
                    }
                }
            }


public static function update_profil()
    {
        $user = new Model_User();

        if(@$_POST ['submit'])
            { 

                if($_POST ['mail']!=$_SESSION ['uti_mail'])
                    {
                       $user = new Model_User();
                       $result_mail_existant = $user->recherche_mail_existant($_POST['mail']);
                        var_dump($result_mail_existant);
                        
                        if($result_mail_existant == null)
                        {
                            $nom = htmlspecialchars($_POST['nom']) ;
                            $prenom = htmlspecialchars($_POST['prenom']) ;
                            $mail = htmlspecialchars($_POST['mail']) ;
                            $telephone = htmlspecialchars($_POST['tel']) ;
                            $rue = htmlspecialchars($_POST['rue']) ;
                            $code_postal = htmlspecialchars($_POST['code_postal']) ;
                            $ville = htmlspecialchars($_POST['ville']) ;
                            $user->update_profile_user($nom,$prenom,$mail,$telephone,$rue,$code_postal,$ville);
  
                            $_SESSION['uti_nom'] = $nom;
                            $_SESSION['uti_mail'] = $mail;
                            $_SESSION['uti_prenom'] = $prenom;
                            $_SESSION['uti_tel'] = $telephone;
                            $_SESSION['uti_rue'] = $rue;
                            $_SESSION['uti_code_postal'] = $code_postal;
                            $_SESSION['uti_ville'] = $ville;
                           

                        }
                        else{
                            return 'email deja pris';
                            
                        }
                    }
                else
                {
                    $nom = htmlspecialchars($_POST['nom']) ;
                    $prenom = htmlspecialchars($_POST['prenom']) ;
                    $mail = htmlspecialchars($_POST['mail']) ;
                    $telephone = htmlspecialchars($_POST['tel']) ;
                    $rue = htmlspecialchars($_POST['rue']) ;
                    $code_postal = htmlspecialchars($_POST['code_postal']) ;
                    $ville = htmlspecialchars($_POST['ville']) ;

                    $user->update_profile_user($nom,$prenom,$mail,$telephone,$rue,$code_postal,$ville);

                    $_SESSION['uti_nom'] = $nom;
                    $_SESSION['uti_mail'] = $mail;
                    $_SESSION['uti_prenom'] = $prenom;
                    $_SESSION['uti_tel'] = $telephone;
                    $_SESSION['uti_rue'] = $rue;
                    $_SESSION['uti_code_postal'] = $code_postal;
                    $_SESSION['uti_ville'] = $ville;
                }



            }



            if(@$_POST['submit_update_mdp'])

                {  
                    $user = new Model_User();
                    $new_mdp = htmlspecialchars($_POST['mdp']) ;
                    $confirm_new_mpd = htmlspecialchars($_POST['confirm_pass']) ;

                    if($new_mdp == $confirm_new_mpd)

                        {

                          if( preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$#',$new_mdp))
                            {
                                  $user->update_mot_de_passe($new_mdp);
                                  header('Location: messages_et_redirections/profil_modifie.php');
                                  exit();
                            }
                          else
                            {
                              
                              return  'Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un caractère spécial et un chiffre';
                              
                            }    
                                
                        }
                            
                    else
                        {
                            return  'Les deux mots de passe doivent être idnetiques';
                        }
                
                    
                    
     
                }
            
            
            }
























}