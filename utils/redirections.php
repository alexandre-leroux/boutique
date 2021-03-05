<?php



class Redirection{


    public static function redirection_admin()
        {

            if(isset($_POST['redirection_article_modifie']))
                {
                    header('Location: messages_et_redirections/article_modifie.php');
                }


        }







}