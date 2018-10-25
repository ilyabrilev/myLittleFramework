<?php
/**
 * Created by PhpStorm.
 * User: Ilya
 * Date: 24.10.2018
 * Time: 16:14
 */

namespace Models;

class User {

    public $id;
    public $login;

    public static function getAll() {
        return \Core\DBConnection::GetInstance()->RawFetchClass('SELECT * FROM users', self::class);
    }
}