<?php
/**
 * Created by PhpStorm.
 * User: Ilya
 * Date: 24.10.2018
 * Time: 19:00
 */

namespace App\Controllers;

class Second {

    public function Get() {
        return view('second', ['p1' => 'Called from Second controller', 'p2' => 'Method Get']);
    }

}