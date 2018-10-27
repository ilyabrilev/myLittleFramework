<?php
/**
 * Created by PhpStorm.
 * User: Ilya
 * Date: 27.10.2018
 * Time: 20:26
 */

namespace Core\Responses;


class ResponseHandler {

    public static function Render($result) {
        if ($result instanceof RenderableResponseInterface) {
            return $result->Render();
        }

    }
}