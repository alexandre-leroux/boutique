<?php

spl_autoload_register(function($className)  {

    $dossiers = array('controllers/','view/');


    foreach($dossiers as $dossier)
        {
            //see if the file exsists
            if(file_exists($dossier.$className . '.php'))
                {
                    require_once($dossier.$className . '.php');
                    //only require the class once, so quit after to save effort (if you got more, then name them something else
                    return;
                }           
        }


});
  