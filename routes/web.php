<?php
/**
 * Created by PhpStorm.
 * User: Ilya
 * Date: 24.10.2018
 * Time: 18:48
 */
/*
return [
    'GET' => [
        ''          => 'Index@Get',
        'another'   => 'Index@GetAnother',
        'second'    => 'Second@Get'
    ],
    'POST'  => [

    ]
];*/
$router->Get('', 'Index@Get');
$router->Get('another', 'Index@GetAnother');
$router->Get('second', 'Second@Get');
$router->Get('second/json', 'Second@GetJson');