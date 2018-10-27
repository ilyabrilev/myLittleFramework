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
$request = \Core\Request::Get();
$errorHandler = new \Core\ErrorHandler();
try {
    $result = $router->Proceed(\Core\Request::Get());
    \Core\Responses\ResponseHandler::Render($result);
}
catch (\Exception $ex) {
    $errorHandler->Handle($ex, $request);
}


//return $result;

//echo \Utilities\Environment::Get('CONNECTION_HOST_TYPE');

//jdd(\Models\User::getAll());
//jdd(\Utilities\DBConnection::GetInstance()->RawFetch('SELECT * FROM users'));

//var_dump(\Utilities\Configuration::getDB());
