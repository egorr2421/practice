<?php
/**
 * Created by PhpStorm.
 * User: Egor
 * Date: 16.06.2018
 * Time: 17:58
 */

namespace application\controllers;

use application\core\Controller;

class TestController extends Controller
{

    public function testAction(){
     $this->route["title"]="test";
     $this->route["user"] = $this->model->getUser();
     $this->view->render($this->route);
    }
}