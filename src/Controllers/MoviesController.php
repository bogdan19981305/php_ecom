<?php

namespace App\Controllers;

use App\Kernel\View\View;

class MoviesController
{

    public function index()
    {
        $view = new View();

        $view->page('movies');
    }
}