<?php
namespace php_blog\engine;
use php_blog\engine\pattern\Singleton;

require_once(__DIR__.'/pattern/base.trait.php');
require_once(__DIR__.'/pattern/singleton.php');

class loader{
    use Singleton;

    public function init(){
        spl_autoload_register(array(__CLASS__,'_loadClasses'));


    }

    private function _loadClasses($sclass){
        $sclass = str_replace(array(__NAMESPACE__,'php_blog','\\'),'/',$sclass);

        if (is_file(__DIR__.'/'.$sclass.'.php')){
            require_once __DIR__.'/'.$sclass.'.php';
        }

        if (is_file(ROOT_PATH.$sclass.'.php')){
            require_once(ROOT_PATH.$sclass.'.php');
    }

}
}
?>