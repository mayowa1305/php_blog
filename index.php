<?php


namespace php_blog;

use php_blog\engine as E;

if (version_compare(PHP_VERSION,'5.5.0','<')){
    exit("your php version is: ". PHP_VERSION.". This script requires php version 5.5.0 and above.");
}
if (!extension_loaded('mbstring')){
    exit("This scripts need mbstring extension please install extension.");
}

//define protocol with if else statement
if (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on'){
    define('PROT','https://');
} else {
    define('PROT','http://');
}

// define ROOT_URL and ROOT_PATH 
define('ROOT_URL', PROT . $_SERVER['HTTP_HOST'].str_replace('\\','',dirname(htmlspecialchars($_SERVER['PHP_SELF'],ENT_QUOTES))).'/');
define('ROOT_PATH',__DIR__.'/');

try{
    require(ROOT_PATH.'engine/loader.php');
    E\loader::getInstance()->init();
    $aParams = array(
        'ctrl' => (!empty($_GET['p'] ? $_GET['p'] : 'blog')),
        'act' => (!empty($_GET['a'] ? $_GET['a'] : 'index'))
    );
    E\Router::run($aParams);

} catch (\Exception $oE){
    echo $oE->getMessage();
}
?>