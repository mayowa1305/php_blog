<?php
namespace php_blog\controller;

class Blog{
    const MAX_POSTS = 5;

    protected $oUtil,$oModel;

    private $_iId;

    public function __construct(){
        if (empty($_SESSION)){
            session_start();
        }

        $this->oUtil = new \php_blog\engine\util;

        $this->oUtil->getModels('Blog');
        $this->oModel = new \php_blog\model\Blog;

        $this->_iId = (int) (!empty($_GET['id']) ? $_GET['id'] : 0);
    } 
//functions for front end user
    public function index() {
        $posts = $this->oModel->get(0, self::MAX_POSTS);
        $this->oUtil->oPosts = $posts;
        $this->oUtil->getViews('index',['posts' => $posts]);
    }
    
    public function post() {
        if (!empty($_POST['submit_comment'])){
            if (isset($_POST['name'],$_POST['comment'])){
                $aArray = array('post_id' => $this->_iId, 'name' => $_POST['name'], 'comment' =>$_POST['comment']);
                if ($this->oModel->comment($aArray)){
                    $this->oUtil->succMssg = 'Hurray post has being added.';
                } else{
                    $this->oUtil->errMssg = 'An error has occured please try again later';
                }
            } else{
                $this->oUtil->errMssg = 'The post title should be less than 50 characters';
            }    

         
        }
        $comment = $this->oModel->commentbyId($this->_iId);
        $this->oUtil->oComment = $comment;
        $post = $this->oModel->getbyId($this->_iId);
        $this->oUtil->oPost = $post;
        $this->oUtil->getViews('post',['post' => $post,'comment' => $comment]);
    }

    public function notfound() {
        $this->oUtil->getViews('not_found');

    }

    public function about() {
        $this->oUtil->getViews('aboutUs');

    }

    public function contact() {
        $this->oUtil->getViews('contact');
    }
//functions for the admin/backend


    protected function isLogged(){
        return !empty($_SESSION['is_logged']);
    }

    public function all() {
        if (!$this->isLogged())  exit();

        $posts = $this->oModel->getAll();
        $this->oUtil->oPosts = $posts;
        $this->oUtil->getViews('index',['posts' => $posts]);
    }

    public function add() {
        if (!$this->isLogged()) exit();

        if (!empty($_POST['add_submit'])){
            if (isset($_POST['title'],$_POST['body']) && mb_strlen($_POST['title'])<=50){
                $aArray = array('title' => $_POST['title'],'body'=>$_POST['body'],'image' => $_POST['image'],'author' => $_POST['author'],'created_date'=>date('Y-m-d H:i:s'));

                if ($this->oModel->add($aArray)){
                    $this->oUtil->succMssg = 'Hurray post has being added.';
                } else{
                    $this->oUtil->errMssg = 'An error has occured please try again later';
                }
            } else{
                $this->oUtil->errMssg = 'The post title should be less than 50 characters';
            }

        }
        $this->oUtil->getViews('add_post');
    }

    
    
    public function edit(){
        if (!$this->isLogged()) exit();

        if (!empty($_POST['edit_submit'])){
            if (isset($_POST['title'],$_POST['body'])){
                $aArray = array('post_id' => $this->_iId,'title' => $_POST['title'],'body' => $_POST['body']);

                if ($this->oModel->update($aArray)){
                    $succMssg = "Hurray post has being updated.";
                    $this->oUtil->succMssg = $succMssg;
                } else{
                   $errMssg = "An error has occured please try again later";
                   $this->oUtil->errMssg = $errMssg;
                }
            } else{
                $this->oUtil->errMssg = 'The post title should be less than 50 characters';
            }
        }

        $post = $this->oModel->getbyId($this->_iId);
        $this->oUtil->oPost = $post;
        $this->oUtil->getViews('edit_post',['post' => $post]);

    }
/*
    public function comment() {
        if (!empty($_POST['submit_comment'])){
            if (isset($_POST['name'],$_POST['comment'])){
                $aArray = array('post_id' => $this->_iId, 'name' => $_POST['name'], 'comment' =>$_POST['comment']);
                if ($this->oModel->comment($aArray)){
                    $this->oUtil->succMssg = 'Hurray post has being added.';
                } else{
                    $this->oUtil->errMssg = 'An error has occured please try again later';
                }
            } else{
                $this->oUtil->errMssg = 'The post title should be less than 50 characters';
            }    

         
        }
    
        
        $this->oUtil->getViews('post');
    }
*/
    public function delete() {
        if (!$this->isLogged()) exit;

        if (!empty($_POST['delete']) && $this->oModel->delete($this->_iId)){
            header('location: ' .ROOT_URL);
        } else{
            exit('oops! post cannot be deleted.');
        }
    }

    public function addNewsletter() {
        if (!empty($_POST['submit_email'])){
            if (isset($_POST['email'])){
                $aArray = array('email' => $_POST['email']);

                if ($this->oModel->registerNewsletter($aArray)){
                    $this->oUtil->succMssg = 'you have registered for newsletter.';
                } else{
                    $this->oUtil->errMssg = 'an error has occured please try again.';
                }
            } else{
                $this->oUtil->errMssg = 'an error has occured please try again';
            }

            
        }

        $this->oUtil->getViews('index');
    }
}
?>