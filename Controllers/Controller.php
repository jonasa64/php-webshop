<?php 

namespace PHPSHOP\Controllers;

class Controller {
    public function __construct()
    {
        $classPath = get_class($this);
        $basePath = str_replace("PHPSHOP\\Controllers\\","", $classPath);
        $file = ROOT . "Models/" . str_replace("\\", "/", $basePath) . ".php"; 
        // Check that model file exist
        if(file_exists($file)){
            // requrire the file
            require($file);
            $model = "PHPSHOP\Models\\" . $basePath;
             $model = new $model();
             print_r($model);
        }
        
    }

    public function renderView($name, $data = []){
        
    }
}