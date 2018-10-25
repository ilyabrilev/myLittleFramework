<?php

require '../vendor/autoload.php';
require '../HelperFunctions.php';

/*
require '../core/HelperFunctions.php';
require '../core/Router.php';
require '../core/Request.php';
require '../core/Configuration.php';
require '../core/DBConnection.php';
require '../core/Environment.php';
require '../app/Models/User.php';
*/

$router = new \Core\Router();
return $router->Proceed(\Core\Request::Get());

//echo \Utilities\Environment::Get('CONNECTION_HOST_TYPE');

//jdd(\Models\User::getAll());
//jdd(\Utilities\DBConnection::GetInstance()->RawFetch('SELECT * FROM users'));

//var_dump(\Utilities\Configuration::getDB());
