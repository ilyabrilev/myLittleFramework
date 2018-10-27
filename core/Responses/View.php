<?php
/**
 * Created by PhpStorm.
 * User: Ilya
 * Date: 27.10.2018
 * Time: 20:28
 */

namespace Core\Responses;


class View implements RenderableResponseInterface {

    private $viewFile = '';
    private $pars = [];
    private $statuscode = 200;

    /**
     * View constructor.
     * @param string $viewFile
     * @param array $pars
     * @param int $statuscode
     */
    public function __construct(string $viewFile, array $pars = [], int $statuscode = 200) {
        $this->viewFile = $viewFile;
        $this->pars = $pars;
        $this->statuscode = $statuscode;
    }

    public function Render() {
        http_response_code($this->statuscode);
        extract($this->pars, EXTR_OVERWRITE);
        require "../public/views/{$this->viewFile}.view.php";
    }
}