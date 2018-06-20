<?php
namespace application\controllers;
use application\core\Controller;
class MainController extends Controller
{

    public function indexAction(){
        $this->route["title"]="main";
        $this->route["user"]= $this->model->getUser();
        $this->view->render($this->route);
    }

    public function contactAction(){
        echo "Контакты";
    }
}