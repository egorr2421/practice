<?php

class Router
{
    protected $routes = [];
    protected $params ;

    public function __construct()
    {
        $routers = require 'application/config/routes.php';
        foreach ($routers as $key => $values){
            $this->routes[$key] = $values;
        }
        //var_dump($this->routes);

    }
    public function match(){
        $way = trim ($_SERVER['REQUEST_URI'],'/');
        foreach ($this->routes as $key => $values){
            if($way == $key){
                $this->params = $key;
                return true;
            }

        }
        return false;
    }
    public function run(){
        $this->match();
        $path = "application\controllers\\".ucfirst($this->routes[$this->params]['controller'])."Controller";
        if($this->match()){
            if(class_exists($path)){
                if(method_exists ($path,$this->routes[$this->params]['action'])."Action"){
                $test = new $path($this->routes[$this->params]);
                $action= $this->routes[$this->params]['action']."Action";
                $test->$action();
                }else{
                    \application\core\View::error (404);
                }
            }else{
                \application\core\View::error (404);
            }
        }else{
                \application\core\View::error (404);
        }
    }

}
