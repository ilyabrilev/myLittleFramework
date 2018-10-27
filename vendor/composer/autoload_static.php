<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc15fe8aa1f02dc66e13fb331030175a3
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Core\\Configuration' => __DIR__ . '/../..' . '/core/Configuration.php',
        'Core\\DBConnection' => __DIR__ . '/../..' . '/core/DBConnection.php',
        'Core\\Environment' => __DIR__ . '/../..' . '/core/Environment.php',
        'Core\\ErrorHandler' => __DIR__ . '/../..' . '/core/ErrorHandler.php',
        'Core\\Exceptions\\ConfigurationException' => __DIR__ . '/../..' . '/core/Exceptions/ConfigurationException.php',
        'Core\\Exceptions\\EnvIsEmptyException' => __DIR__ . '/../..' . '/core/Exceptions/EnvIsEmptyException.php',
        'Core\\Exceptions\\EnvParseException' => __DIR__ . '/../..' . '/core/Exceptions/EnvParseException.php',
        'Core\\Exceptions\\RouterException' => __DIR__ . '/../..' . '/core/Exceptions/RouterException.php',
        'Core\\QueryBuilder' => __DIR__ . '/../..' . '/core/QueryBuilder.php',
        'Core\\Request' => __DIR__ . '/../..' . '/core/Request.php',
        'Core\\Responses\\Json' => __DIR__ . '/../..' . '/core/Responses/Json.php',
        'Core\\Responses\\RenderableResponseInterface' => __DIR__ . '/../..' . '/core/Responses/RenderableResponseInterface.php',
        'Core\\Responses\\ResponseHandler' => __DIR__ . '/../..' . '/core/Responses/ResponseHandler.php',
        'Core\\Responses\\View' => __DIR__ . '/../..' . '/core/Responses/View.php',
        'Core\\Router' => __DIR__ . '/../..' . '/core/Router.php',
        'EnvException' => __DIR__ . '/../..' . '/core/Exceptions/EnvException.php',
        'ResponseException' => __DIR__ . '/../..' . '/core/Exceptions/ResponseException.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc15fe8aa1f02dc66e13fb331030175a3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc15fe8aa1f02dc66e13fb331030175a3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc15fe8aa1f02dc66e13fb331030175a3::$classMap;

        }, null, ClassLoader::class);
    }
}
