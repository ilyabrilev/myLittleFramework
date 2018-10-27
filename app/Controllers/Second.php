<?php
/**
 * Created by PhpStorm.
 * User: Ilya
 * Date: 24.10.2018
 * Time: 19:00
 */

namespace App\Controllers;

use Core\Responses\Json;
use Core\Responses\View;

class Second {

    public function Get() {
        return new View('second', ['p1' => 'Called from Second controller', 'p2' => 'Method Get']);
    }

    public function GetJson() {
        return new Json(['p1' => 'Called from Second controller', 'p2' => 'Method Get']);
    }
}