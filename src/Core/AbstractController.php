<?php
/**
 * Copyright © 2022 - Oliver Kloecker
 */

namespace App\Core;

abstract class AbstractController
{
    protected function render($view, $params)
    {
        extract($params, EXTR_OVERWRITE);
        include __DIR__ . "/../../views/{$view}.php";
    }
}