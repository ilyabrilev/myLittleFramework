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
    private static $instance;

    public function __construct(array $_routesMock = null) {
        if ($_routesMock) {
            $this->routes = $_routesMock;
        }
        else {
            $router = $this;
            require '../routes/web.php';
            /*
            $this->routes = array_map(function ($item) {
                return array_map([$this, 'UriTrim'], $item);
            }, $routes);
            */
        }
    }

    public function GetInstance(array $_routesMock = null) {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
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
        if (!method_exists($controller, $controllerMethod)) {
            throw new Exceptions\RouterException("Method $controllerMethod is not found in $controllerStr");
        }
        $result = $controller->$controllerMethod($request);
        return $result;
    }

    private function UriTrim($uri) {
        return trim($uri, '/\\');
    }

    public function Get($route, $action) {
        $this->routes['GET'][$this->UriTrim($route)] = $action;
    }

    public function Post($route, $action) {
        $this->routes['POST'][$this->UriTrim($route)] = $action;
    }


}