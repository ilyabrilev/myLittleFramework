<?php
/**
 * Created by PhpStorm.
 * User: Ilya
 * Date: 24.10.2018
 * Time: 20:01
 */

namespace Core;


class Request {

    private $uri;
    private $method;
    private $parameters;

    private function __construct($server, $pars) {
        //$_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']
        $this->uri = trim(explode('?', $server['REQUEST_URI'])[0], '/\\');
        $this->parameters = $pars;
        $this->method = $server['REQUEST_METHOD'];
    }

    public static function Get() {
        return new self($_SERVER, $_REQUEST);
    }

    public static function Mock($server, $pars) {
        return new self($server, $pars);
    }

    public function Uri() {
        return $this->uri;
    }

    public function Parameters() {
        return $this->parameters;
    }

    public function Method() {
        return $this->method;
    }
}