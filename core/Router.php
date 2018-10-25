<?php
/**
 * Created by PhpStorm.
 * User: Ilya
 * Date: 24.10.2018
 * Time: 18:51
 */

namespace Core;

require __DIR__ . '/Exceptions/RouterException.php';
use Core\Exceptions\RouterException;

class Router {

    private $routes;

    public function __construct() {
        $routes = require '../routes/web.php';
        $this->routes = array_map(function ($item) {
            return array_map([$this, 'UriTrim'], $item);
        }, $routes);
    }

    public function Proceed(Request $request) {
        $uri = $this->UriTrim($request->Uri());
        $method = $request->Method();
        if (!array_key_exists($method, $this->routes)) {
            throw new Exceptions\RouterException("Section $method is not found");
        }

        if (!array_key_exists($uri, $this->routes[$method])) {
            throw new Exceptions\RouterException("Route $uri is not found in $method section");
        }

        $action = $this->routes[$method][$uri];
        $actionArr = explode('@', $action);
        if (\count($actionArr) !== 2) {
            throw new Exceptions\RouterException("Error in route $action");
        }
        $controllerStr = $actionArr[0];
        $controllerClassname = "app\\Controllers\\$controllerStr";
        $controllerMethod = $actionArr[1];

        require "../app/Controllers/$controllerStr.php";

        $controller = new $controllerClassname();
        return $controller->$controllerMethod($request);
    }

    private function UriTrim($uri) {
        return trim($uri, '/\\');
    }

}