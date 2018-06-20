<?php
namespace application\core;
use application\core\View;
abstract class Controller
{
    protected $route;
    protected $view;
    protected $model;
    public function __construct($route)
    {
        $this->route=$route;
        $this->view=new View($route);
        $this->model = $this->loadModel($this->route['controller']);
    }

    public function loadModel($name){
        $path = "application\model\\".ucfirst ($name);
        if(class_exists ($path)){
            $model = new $path();
            return $model;
        }
    }
}