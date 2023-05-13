<?php

namespace src\Http;

use src\Helper;

class Route
{
    protected static array $routes = [
        "GET" => [],
        "POST" => []
    ];

    public static function get($route, $action) 
    {
        self::$routes["GET"][$route] = $action;
    }
    
    public static function post($route, $action) 
    {
        self::$routes["POST"][$route] = $action;
    }

    public static function resolve()
    {
        // checks if there is a route defined for the current HTTP request method and URL path. If not?
        if(! isset(self::$routes[Request::getMethod()][Request::path()]))
        {
            // Creates a new instance of the "Helper" class and returns a "404" view
            $routerHelper = new Helper();

            // 404 handling
            return $routerHelper -> view('404', [
                'helper' => $routerHelper
            ]);
        }
        
        // Array which contains the class name as the first element and the the method name as thesecond element  
        $action = self::$routes[Request::getMethod()][Request::path()];

        call_user_func_array([new $action[0], $action[1]], []);   
    }
}