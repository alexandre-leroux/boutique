<?php
require_once('Controller.php');
require_once('../Models/alx-Admin.php');


class Controller_Admin extends Controller{


    public static function supp_image()
    {
        foreach($_POST as $value)
             {
                 if ($value == 'supprimer')
                    {
                        break;
                    }
                 else
                    {

                        $admin = new Admin();
                        unlink($value);
                        $img_bdd  = $value;
                        $nom_img_bdd = explode("../medias/img_articles/", $img_bdd); 
                        $admin->delete_image($nom_img_bdd);

                    }
            }

    }








}