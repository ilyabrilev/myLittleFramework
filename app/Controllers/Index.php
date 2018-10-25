<?php
/**
 * Created by PhpStorm.
 * User: Ilya
 * Date: 24.10.2018
 * Time: 19:00
 */

namespace App\Controllers;

use Core\Request;

class Index {

    public function Get() {
        return view('main');
    }

    public function GetAnother(Request $request) {
        return view('second', ['p1' => 'Called from Index controller; Method GetAnother', 'p2' => json_encode($request->Parameters())]);
    }

}