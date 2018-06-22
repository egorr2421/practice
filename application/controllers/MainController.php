<?php
namespace application\controllers;
use application\core\Controller;
class MainController extends Controller
{

    public function indexAction(){
        $this->route["title"]="Новости";
        $this->route["news"]= $this->model->getLastNews();
        $this->view->render($this->route);
    }

    public function contactAction(){
        echo "Контакты";
    }
}