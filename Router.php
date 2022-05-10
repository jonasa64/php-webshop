<?php 
namespace PHPSHOP;
class Router {

    public static function parse($url, $request){
        $url = trim($url);

        if($url == "/phpShop/"){
            $request->controller = "home";
            $request->action = 'index';
            $request->params = [];
        } else {
            $explode_url = explode("/", $url);
            $explode_url = array_slice($explode_url, 2);
            $request->controller = $explode_url[0];
            $request->action = $explode_url[1];
            // Set action to index if it was not found in url
            if(empty($request->action))
                $request->action = "index";
            $request->params = array_slice($explode_url, 2);
        }
    }

}