<?php
namespace php_blog\engine;

class Router{

    public static function run(array $aParams){
        $sNamespace = 'php_blog\controller\\';
        $sDefCtrl = $sNamespace.'blog';
        $sCtrlPath = ROOT_PATH.'controller/';
        $sCtrl = ucfirst($aParams['ctrl']) ;

        if (is_file(($sCtrlPath.$sCtrl.'.php'))){
          $sCtrl = $sNamespace.$sCtrl;
          $oCtrl = new $sCtrl;
          
          if ((new \ReflectionClass($oCtrl))->hasMethod($aParams['act']) && (new \ReflectionMethod($oCtrl, $aParams['act']))->isPublic()){
            call_user_func(array($oCtrl,$aParams['act']));
        } else{
            call_user_func(array($oCtrl,'notfound'));
        }


        }else{
        call_user_func(array($sDefCtrl,'notfound'));
        }
    
    }
}
//changed router file name
?>
