<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'Core\\Configuration' => $baseDir . '/core/Configuration.php',
    'Core\\DBConnection' => $baseDir . '/core/DBConnection.php',
    'Core\\Environment' => $baseDir . '/core/Environment.php',
    'Core\\ErrorHandler' => $baseDir . '/core/ErrorHandler.php',
    'Core\\Exceptions\\ConfigurationException' => $baseDir . '/core/Exceptions/ConfigurationException.php',
    'Core\\Exceptions\\EnvIsEmptyException' => $baseDir . '/core/Exceptions/EnvIsEmptyException.php',
    'Core\\Exceptions\\EnvParseException' => $baseDir . '/core/Exceptions/EnvParseException.php',
    'Core\\Exceptions\\RouterException' => $baseDir . '/core/Exceptions/RouterException.php',
    'Core\\QueryBuilder' => $baseDir . '/core/QueryBuilder.php',
    'Core\\Request' => $baseDir . '/core/Request.php',
    'Core\\Responses\\Json' => $baseDir . '/core/Responses/Json.php',
    'Core\\Responses\\RenderableResponseInterface' => $baseDir . '/core/Responses/RenderableResponseInterface.php',
    'Core\\Responses\\ResponseHandler' => $baseDir . '/core/Responses/ResponseHandler.php',
    'Core\\Responses\\View' => $baseDir . '/core/Responses/View.php',
    'Core\\Router' => $baseDir . '/core/Router.php',
    'EnvException' => $baseDir . '/core/Exceptions/EnvException.php',
    'ResponseException' => $baseDir . '/core/Exceptions/ResponseException.php',
);
