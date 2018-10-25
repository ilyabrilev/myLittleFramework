<?php
/**
 * Created by PhpStorm.
 * User: Ilya
 * Date: 23.10.2018
 * Time: 19:18
 */

namespace Core\Exceptions;

class EnvIsEmptyException extends \Exception {
    private $msg = '.env file is empty';

    public function __construct() {
        parent::__construct($this->msg);
    }

}