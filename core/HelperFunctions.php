<?php
/**
 * Created by PhpStorm.
 * User: Ilya
 * Date: 24.10.2018
 * Time: 16:00
 */
function jdd($obj) {
    echo json_encode($obj);
    die;
}

function dd($obj) {
    var_dump($obj);
    die;
}

function env($key, $default = '', $isVital = false) {
    return \Core\Environment::Get($key, $default, $isVital);
}

function view(string $view, array $options = []) {
    extract($options, EXTR_OVERWRITE);
    return require "../public/views/$view.view.php";
}

