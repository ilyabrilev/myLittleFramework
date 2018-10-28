<?php

require '../vendor/autoload.php';
require '../HelperFunctions.php';

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

