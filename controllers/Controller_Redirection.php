<?php



class Controller_Redirection{


    public static function redirection_admin()
        {

            if(isset($_GET['admin_message_update_article']))
                {
                    header('Location: messages_et_redirections.php?admin_message_update_article=');
                }


        }







}