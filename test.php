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
Faut pas oublier d'hériter du construct du parent !