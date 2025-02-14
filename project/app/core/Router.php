<?php

namespace App\core;

class Router {

    private static $routes;

    public  static function  add($method, $route, $action) {
        self::$routes[] = [
            'method' => strtoupper($method),
            'route' => trim($route, '/'),
            'action' => $action
        ];
    }

    
    public static function  dispatch() {
        $requestUri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        
       
        foreach (self::$routes as $route) {
            if ($route['route'] === $requestUri && $route['method'] === $requestMethod) {
                
                [$controller, $method] = explode('@', $route['action']);

                $namespace =  "App\\controllers\\";


                $controllerClass = $namespace . $controller;

                // var_dump($method);
                // exit;
                
                if (class_exists($controllerClass) && method_exists($controllerClass, $method)) {
                    $controllerInstance = new $controllerClass();
                    return $controllerInstance->$method();
                } else {
                    http_response_code(404);
                    echo $controllerClass."<br>".$method."<br>";
                    echo $route['route'] ."===".$requestUri;
                    echo "<br>"."404 - Page Not Found?";
                    return;
                }
            }
        }

        http_response_code(404);
        echo "404 - Page Not Found";
    }
}