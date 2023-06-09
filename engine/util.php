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

    private function _getinc($sFileName, $sType, $aArray = array())
{
    $sFullPath = ROOT_PATH . $sType .'/'.'inc'.'/'. $sFileName .'.php';
    if (is_file($sFullPath)) {
        extract($aArray);
        require $sFullPath;
    } else {
        exit('The "' . $sFullPath . '" file doesn\'t exist');
    }
}

    public function getViews($sViewname,$aArray = array()){
        $this->_get($sViewname,'view',$aArray);
    }

    public function getincView($sViewName, $aArray = array())
    {
        $this->_getinc($sViewName, 'view', $aArray);
    }

    public function getModels($sModelname){
        $this->_get($sModelname,'model');
    }

    public function __set($skey , $value){
        $this->$skey = $value;
    }
}


?>