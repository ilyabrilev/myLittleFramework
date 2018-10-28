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
    private $accept = [];

    private function __construct($server, $pars) {
        $this->uri = trim(parse_url($server['REQUEST_URI'])['path'], '/\\');
        $this->accept = array_map('trim', explode($server['HTTP_ACCEPT'], ','));
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

    public function IsAccepting($what) {
        return \in_array($what, $this->accept, true);
    }

    public static function GetMockServerArray() {
        return ['REQUEST_URI' => '', 'HTTP_ACCEPT' => 'test', 'REQUEST_METHOD' => 'GET'];
    }
}