<?php
namespace application\core;

class View
{
        protected $route;
        protected $path;

        public function __construct($route)
        {
            $this->route=$route;
            $this->path="application/View/".$route['controller']."/".$route['action'].".php";
        }


        public function render($var=[]){
            extract($var);
            require $this->path;
        }

        public static function error($kod){
            http_response_code ($kod);
            require "application/View/error/Error.php";
            exit;
        }

        public function getRoute()
        {
            return $this->route;
        }
        public function setRoute($route): void
        {
            $this->route = $route;
        }
        public function getPath(): string
        {
            return $this->path;
        }
        public function setPath(string $path): void
        {
            $this->path = $path;
        }
}