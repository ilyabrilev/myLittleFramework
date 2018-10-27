<?php
/**
 * Created by PhpStorm.
 * User: Ilya
 * Date: 27.10.2018
 * Time: 20:53
 */

namespace Core\Responses;


class Json implements RenderableResponseInterface {

    private $statuscode = 200;
    private $data;

    public function __construct($data, int $statuscode = 200) {
        $this->statuscode = $statuscode;
        $this->data = $data;
    }

    public function Render() {
        header('content-type: application/json');
        http_response_code($this->statuscode);
        echo json_encode($this->data);
    }


}