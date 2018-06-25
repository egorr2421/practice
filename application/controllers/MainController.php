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
    public function topAction(){
        $this->route["title"]="Топ новостей";
        $this->route["news"]= $this->model->getTopNews();
        $this->view->render($this->route);
    }
    public function categoryAction()
    {
        if(!empty($_POST['id'])){
           $ans = $this->model->getNewsForCat($_POST['id']);
            exit(json_encode($ans));
        }
        $this->route["title"] = "Категории";
        $this->route["cats"] = $this->model->getCategory ();
        $this->view->render ($this->route);
     }
     public function getnewAction(){
        if(!empty($_POST['id'])){
            $ans = $this->model->addView($_POST['id']);
            $ans = $this->model->getNews($_POST['id']);

            exit(json_encode($ans));
        }
     }
}