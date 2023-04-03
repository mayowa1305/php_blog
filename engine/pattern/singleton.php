<?php
namespace php_blog\engine\pattern;

trait Singleton{
    use Base;

    protected static $_oInstance = null;

    public static function getInstance()
    {
        return (null === static::$_oInstance) ? static::$_oInstance = new static : static::$_oInstance;
    }
    /*
    public static function getInstance(){
        if (static::$classInstance === null){
            static::$classInstance = new static;
        } else {
            return static::$classInstance;
        }

    }*/



	/**
	 * @return mixed
	 */
	public static function get_oInstance() {
		return self::$_oInstance;
	}
	
	/**
	 * @param mixed $_oInstance 
	 */
	public static function set_oInstance($_oInstance) {
		self::$_oInstance = $_oInstance;
		return;
	}
}

?>