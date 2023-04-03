<?php
namespace php_blog\engine;

class util{
    private function _get($sFilename, $sType, $aArray = array()){
        $sFullpath = ROOT_PATH.$sType.'/'.$sFilename.'.php';
        if (is_file($sFullpath)){
            extract($aArray);
            require($sFullpath);
        }else{
            exit('The "'.$sFullpath.'" file doesnt exist.');
        }

    }

    public function getViews($sViewname,$aArray = array()){
        $this->_get($sViewname,'view',$aArray);
    }

    public function getModels($sModelname){
        $this->_get($sModelname,'model');
    }

    public function __set($skey , $value){
        $this->$skey = $value;
    }
}


?>