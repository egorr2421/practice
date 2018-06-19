<?php
namespace application\controllers;
use application\core\Controller;
class MainController extends Controller
{

    public function indexAction(){
        echo "Main/indexAction";
    }

    public function contactAction(){
        echo "Контакты";
    }
}