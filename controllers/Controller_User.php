<?php
require_once('Controller.php');
require_once('../Models/Model_user.php');


class Controller_User extends Controller{

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

                            if(($_POST['mdp'] == $_POST['confirm_pass']) &&  preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$#',$_POST['mdp'])  ){
                    
                                $admin->inscription_user();
                                header('Location: messages_et_redirections/inscription_reussie.php');
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
                            echo 'connecté';
                            $_SESSION['id_utilisateurs'] = $result['id_utilisateurs'];
                            $_SESSION['uti_droits'] = $result['uti_droits'];
                            $_SESSION['uti_nom'] = $result['uti_nom'];
                            $_SESSION['uti_prenom'] = $result['uti_prenom'];
                            $_SESSION['uti_mail'] = $result['uti_mail'];
                            $_SESSION['uti_tel'] = $result['uti_tel'];
                            $_SESSION['uti_rue'] = $result['uti_rue'];
                            $_SESSION['uti_code_postal'] = $result['uti_code_postal'];
                            $_SESSION['uti_ville'] = $result['uti_ville'];
                            echo '<pre>';
                            var_dump($_SESSION);
                            echo '</pre>';
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
    {$user = new Model_User();

        if($_POST ['submit'])
            {

                if($_POST ['mail']!=$_SESSION ['uti_mail'])
                    {
                       $user = new Model_User();
                       $result_mail_existant = $user->recherche_mail_existant($_POST['mail']);
                     
                        
                        if($result_mail_existant != null)
                        {
                            $user->update_profile_user();
                            return 'trouvé';
                        }
                        else{
                            return 'rien trouvé';
                        }
                    }
                else
                {
                    $user->update_profile_user();

                }



            }




    }

}