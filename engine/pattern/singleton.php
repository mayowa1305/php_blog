<?php
namespace php_blog\engine\pattern;

trait Singleton{
    use Base;

    protected static $classInstance = null;

    public static function getInstance(){
        if (static::$classInstance === null){
            static::$classInstance = new static;
        } else {
            return static::$classInstance;
        }

    }


}

?>