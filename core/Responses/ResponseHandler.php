<?php
/**
 * Created by PhpStorm.
 * User: Ilya
 * Date: 27.10.2018
 * Time: 20:26
 */

namespace Core\Responses;


use Core\Request;

class ResponseHandler {

    public static function Render($result) {
        if ($result instanceof Response) {
            $result->Render();
        }
        else {
            (new Json($result))->Render();
        }
    }

    public static function Page404($text, Request $request) {
        if ($request->IsAccepting('application/json')) {
            return new Json(['err' => 'Page not found', 'text' => $text], 404);
        }
        return new View('404', ['text' => $text], 404);
    }

    public static function Page500($ex, Request $request) {
        if ($request->IsAccepting('application/json')) {
            return new Json(['err' => 'Page not found', 'ex' => $ex], 500);
        }
        return new View('500', ['ex' => $ex], 500);
    }
}