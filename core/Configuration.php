<?php
/**
 * Created by PhpStorm.
 * User: Ilya
 * Date: 23.10.2018
 * Time: 15:58
 */

namespace Core;

class Configuration {

    private static $dbConf = null;

    public static function getDB() {
        if (!self::$dbConf) {
            self::$dbConf = require __DIR__ . '/../config/database.php';
        }
        return self::$dbConf;
    }

}