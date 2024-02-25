<?php

namespace Lib;

class Route
{
    private static $routes = [];

    public static function get($uri, $callback)
    {

        $uri = trim($uri, '/');  // '/contact/prueba' => 'contact'
        self::$routes['GET'][$uri] = $callback;
    }

    public static function post($uri, $callback)
    {

        $uri = trim($uri, '/');  // '/contact/prueba' => 'contact'
        self::$routes['POST'][$uri] = $callback;
    }

    public static function dispatch()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uri = trim($uri, '/');

        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes[$method] as $route => $callback) {

            if (strpos($route, ':') !== false) {
                $route = preg_replace('#:[a-zA-Z]+#', '([a-zA-Z0-9]+)', $route);
            }


            if (preg_match("#^$route$#", $uri, $matches)) {


                $params = array_slice($matches, 1);

                // $response = $callback(...$params);

                if (is_callable($callback)) {
                    $response = $callback(...$params);
                }

                if (is_array($callback)) {
                    $controller = new $callback[0];
                    $response = $controller->{$callback[1]}(...$params);
                }

                if (is_array($response) || is_object($response)) {

                    header('Content-Type: application/json'); // Indicamos que la respuesta es en formato JSON para que el navegador lo interprete correctamente utilizando la extensión JSON Formatter
                    echo json_encode($response);
                } else {
                    echo $response;
                }
                return;
            }


            // if ($route == $uri) {
            //     $callback();
            //     return;
            // }
        }
        echo '404 Not Found';
        return;
    }
}
