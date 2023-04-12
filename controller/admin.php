<?php
namespace php_blog\controller;

class admin extends Blog{
    public function login(){
        if ($this->isLogged())
            header('location: '.ROOT_URL.'?p=blog&a=all');
        if (isset($_POST['email'],$_POST['password'])){
            $this->oUtil->getModels('Admin');
            $this->oModel = new \php_blog\model\Admin;

            $sHashpassword = $this->oModel->login($_POST['email']);
            if (password_verify($_POST['password'],$sHashpassword)){
                $_SESSION['is_logged'] = 1;
                header('location: '.ROOT_URL.'?p=blog&a=all');
                exit;
            } else{
                $this->oUtil->errMsg = 'incorrect login';
            }
        }
        $this->oUtil->getViews('login');
    
    }
    
    public function logout() {
        if (!$this->isLogged()) exit();

        if (!empty($_SESSION)){
            $_SESSION = array();
            session_unset();
            session_destroy();
        }

        header('location: '.ROOT_URL);
        exit();
    }
}
?>