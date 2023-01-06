<?php

namespace App\Controllers;

abstract class Controller
{
    private $templates;

    public function __construct(\League\Plates\Engine $templates)
    {
        $this->templates = $templates(VIEW);
    }

    public function getIndex(string $view, array $data)
    {
        echo $this->templates->render($view, $data);
    }
}