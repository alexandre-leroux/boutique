<?php
abstract class Controllers
{

    protected $modelName;
    protected $pdo;

    public function __construct() 
    {
        $this->model = new $this->modelName();
        $this->pdo = \Database::getPdo();
    }

}
 class Customers extends Controllers
{
    protected $modelName = \Models\Customers::class;
    protected $pdo;
    private $customer_id;

    public function __construct()
    {
        parent::__construct();
// Faut pas oublier d'hériter du construct du parent !





spl_autoload_register(
    function ($className) {
        // var_dump($className);
        $className = str_replace("\\", "/", $className);
            include_once __DIR__ . "/" . $className . ".php";
    }
);




&&  preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$#',$_POST['mdp']) 