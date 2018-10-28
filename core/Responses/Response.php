<?php
/**
 * Created by PhpStorm.
 * User: Ilya
 * Date: 28.10.2018
 * Time: 18:36
 */

namespace Core\Responses;


abstract class Response {

    protected $statuscode = 200;

    abstract public function Render();

    public function GetStatusCode() {
        return $this->statuscode;
    }

}