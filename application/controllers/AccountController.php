<?php
namespace application\controllers;
use application\core\Controller;
use application\core\View;

class AccountController extends Controller
{


    public function loginAction(){
        if(isset($_SESSION['account'])) {
        $this->exitAction ();
        }
        if(!empty($_POST)){
        if(!empty($_POST['name']) and !empty($_POST['pass'])){
            if(strlen ($_POST['name'])<3 or strlen ($_POST['name']) >20 ){
                exit(json_encode(['error'=>'incorrect name']));
            }
            if(strlen ($_POST['pass'])<6){
                exit(json_encode(['error'=>'incorrect pass']));
            }
            if($this->model->ChekUser($_POST['name'],0,$_POST['pass'])){
                $_SESSION['account']=$this->model->getUser($_POST['name'])[0];
//                header('Location: /account/profile');
                exit(json_encode(['url'=>'account/profile']));
            }else{
                exit(json_encode(['error'=>'не верный логин или пароль']));

            }
        }else{
            if(!empty($_POST['name'])){
                exit(json_encode(['error'=>'plis enter pass']));
            }
            if(!empty($_POST['pass'])){
                exit(json_encode(['error'=>'plis enter name']));
            }
        }
        }
        $rout = $this->route;
        $rout['title'] = "Вход";
        $this->view->render ($rout);
    }
    public function registerAction(){
        if(!empty($_POST)){
            if(!empty($_POST['name']) and !empty($_POST['pass']) and !empty($_POST['email'])){
                if(strlen ($_POST['name'])<3 or strlen ($_POST['name']) >20 or strlen ($_POST['email']) <5){
                    exit(json_encode(['error'=>'incorrect name']));
                }
                if(strlen ($_POST['pass'])<6){
                    exit(json_encode(['error'=>'incorrect pass']));
                }
                if($this->model->ChekUser($_POST['name'],$_POST['email'],0)){
                    exit(json_encode(['error'=>'дaнный пользователь уже зареистрирован']));
                }
                $this->model->RegisterUser($_POST['name'],$_POST['email'],$_POST['pass']);
                $_SESSION['account']=$this->model->getUser($_POST['name'])[0];
//                header('Location: /account/profile');
                exit(json_encode(['url'=>'account/profile']));
//                    exit(password_verify ("123456",password_hash($_POST['pass'],PASSWORD_DEFAULT)));




            }else {
                if (empty($_POST['email'])) {
                    exit("email");
                }
                if (empty($_POST['name'])) {
                    exit("name");
                }
                if (empty($_POST['pass'])) {
                    exit("pass");
                }
            }

        }
        $rout = $this->route;
        $rout['title'] = "Регистрация";
        $this->view->render ($rout);
    }
    public function profileAction(){
        if(isset($_SESSION['account'])) {
            $rout = $this->route;
            $rout['news'] = $this->model->getNewsForPer($_SESSION['account']['id']);
            $rout['title'] = "My ac ";
            $this->view->render ($rout);
        }else{
            View::error (403);
        }
        }
    public function testAction(){
        echo "Main/testAction";
    }
    public function exitAction(){
        $_SESSION = [];
        session_destroy ();
        header('Location: /account/login');
    }
    public function addAction(){
       $leng=date('o-d-H');
       $this->model->RegisterPost($_POST['title'],$_POST['text'],$_SESSION['account']['id'],$_POST['category'],date("Y-m-d"));
       $this->model->addCats($_POST['category']);
       exit(json_encode(['url'=>'account/profile']));
    }
    public function dellAction(){
        $this->model->dellNews($_POST['id']);
        $this->profileAction();
    }
    public function editAction(){
        $this->model->updatenews($_POST['id'],$_POST['tatle'],$_POST['cat'],$_POST['text']);
        $this->profileAction();
    }
}