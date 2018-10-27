<?php
/**
 * Created by PhpStorm.
 * User: Ilya
 * Date: 27.10.2018
 * Time: 22:28
 */

namespace Core;


use Core\Responses\ResponseHandler;

class ErrorHandler {

    public function Handle(\Exception $ex, Request $request) {
        $this->Report($ex);
        $this->Render($ex, $request);
    }

    private function Report(\Exception $ex) {
        //ToDo: log, tg, slack, etc.
    }

    private function Render(\Exception $ex, Request $request) {
        $response = ResponseHandler::Page500($ex, $request);
        $response->Render();
    }

}