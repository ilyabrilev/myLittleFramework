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
use Core\Responses\ResponseHandler;
use Core\Responses\View;

class Router {

    private $routes;
    private static $instance;

    public function __construct(array $_routesMock = null) {
        if (\is_array($_routesMock)) {
            $this->routes = $_routesMock;
        }
        else {
            $router = $this;
            require '../routes/web.php';
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
            //ToDo: change to 405 page
            return ResponseHandler::Page404("Section $method is not found", $request);
        }

        if (!array_key_exists($uri, $this->routes[$method])) {
            return ResponseHandler::Page404("Route $uri is not found in $method section", $request);
        }

        $action = $this->routes[$method][$uri];

        $actionArr = explode('@', $action);
        if (\count($actionArr) !== 2) {
            return ResponseHandler::Page404("Error in route $action", $request);
        }
        $controllerStr = $actionArr[0];
        $controllerClassname = "App\\Controllers\\$controllerStr";
        $controllerMethod = $actionArr[1];

        $controller = new $controllerClassname();
        if (!method_exists($controller, $controllerMethod)) {
            return ResponseHandler::Page404("Method $controllerMethod is not found in $controllerStr", $request);
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