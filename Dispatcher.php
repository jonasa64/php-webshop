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

        // Check that if controller is in sub dir 
        if(!file_exists($file))
        $file = ROOT . 'Controllers/' . $name . "/" . substr($name, 0,-1) . ".php";

        require($file);

        $controller = "PHPSHOP\Controllers\\";

        $controller .= $name;
        // Check if controller class was found
        if(class_exists($controller)){
            $controller = new $controller();

            return $controller;
        } 
        // Check if controller was found in sub dir
        $controller .= "\\" . substr($name, 0,-1);
        if(class_exists($controller)){
            $controller = new $controller();
            return $controller;
        }
        // Could not find controller
        return "404";
       
           

    }
}