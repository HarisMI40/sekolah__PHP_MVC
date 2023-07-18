<?php

namespace Rpl\Mvc\App;
// require_once __DIR__ . "/../../vendor/autoload.php";
class Router{
    private static array $routes = [];

    public static function add(String $method, string $path, string $controller, string $function){
        self::$routes[] = [
            "method" => $method,
            "path" => $path,
            "controller" => $controller,
            "function" => $function
        ];       
    }

    public static function run(){
        $path = "/";

        if(isset($_SERVER["PATH_INFO"])) $path = $_SERVER["PATH_INFO"];
        
        $method = $_SERVER["REQUEST_METHOD"];

        foreach(self::$routes as $route){
            if($path == $route['path'] && $method == $route['method']){
                $function = $route['function'];
                
                $controller = new $route['controller'];
                $controller->$function();
                
                return;
            }
        }

        http_response_code(404);
        echo "controller Not Found";
    }
}