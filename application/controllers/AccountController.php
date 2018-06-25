<?php
namespace application\controllers;
use application\core\Controller;
use application\core\View;

class AccountController extends Controller
{


    public function loginAction(){
        if(!empty($_POST)){
        if(!empty($_POST['name']) and !empty($_POST['pass'])){
            if(strlen ($_POST['name'])<3 or strlen ($_POST['name']) >20 ){
                exit("Eror name");
            }
            if(strlen ($_POST['pass'])<6){
                exit("Eror pass");
            }
            if($this->model->ChekUser($_POST['name'],0,$_POST['pass'])){
                $_SESSION['account']=$this->model->getUser($_POST['name'])[0];
//                header('Location: /account/profile');
                exit(json_encode(['url'=>'account/profile']));
            }else{
                exit("dont find");
            }
        }else{
            if(!empty($_POST['name'])){
            exit("name");
            }
            if(!empty($_POST['pass'])){
                exit("pass");
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
                    exit("Eror name");
                }
                if(strlen ($_POST['pass'])<6){
                    exit("Eror pass");
                }
                if($this->model->ChekUser($_POST['name'],$_POST['email'],0)){
                    exit("i can not register");
                }
                $this->model->RegisterUser($_POST['name'],$_POST['email'],$_POST['pass']);
                exit("i can register");
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
            $rout['news'] = $this->model->getNewsForPer ($_SESSION['account']['id']);
            $rout['title'] = "My ac ";
            $this->view->render ($rout);
        }else{
            View::error (404);
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
}