<?php 
namespace PHPSHOP;

class Dispatcher{

    private $request;

    public function dispatch(){
        $this->request = new Request();
        Router::parse($this->request->url, $this->request);

        $controller = $this->loadController();

        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }

    private function loadController(){
        $name = ucfirst($this->request->controller);

        $file = ROOT . 'Controllers/' . $name . ".php";

        require($file);

        $controller = "PHPSHOP\Controllers\\";

        $controller .= $name;

        if(class_exists($controller)){
            $controller = new $controller();

            return $controller;
        } 
        return "404";
           

    }
}