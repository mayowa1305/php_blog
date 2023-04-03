<?php 
namespace php_blog\engine;


class Db extends \PDO{

    public function __construct()
    {
        $driverOptions[\PDO::MYSQL_ATTR_INIT_COMMAND] ='SET NAMES UTF8';
        parent::__construct('mysql:host='.config::DB_HOST.';dbname='.config::DB_NAME.';',config::DB_USER,config::DB_PASSWORD,$driverOptions);
        $this->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
        
    }

}

?>