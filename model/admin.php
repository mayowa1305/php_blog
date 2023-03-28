<?php 
namespace php_blog\model;

class Admin extends Blog{
    public function Login($sEmail) {
        $oStmt = $this->oDb->prepare('SELECT email,password WHERE email = :email LIMIT 1');
        $oStmt->bindvalue(':email',$sEmail,\PDO::PARAM_STR);
        $oStmt->execute();
        $oRow = $oStmt->fetch(\PDO::FETCH_OBJ);

        return @$oRow->password;
    }

}



?>