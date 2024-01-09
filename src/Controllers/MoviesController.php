<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;

class MoviesController extends Controller
{

    public function index(): void
    {
        $this->view('movies');
    }

    public function add(): void
    {
        $this->view('admin/movies/add');
    }

    public function store(): void
    {
        $validation = $this->getRequest()->validate([
            'name' => ['required', 'min:3', 'max:50']
        ]);

        if (!$validation) {
            dd('validation failed', $this->getRequest()->getErrors());
        }

        dd('valid');
    }
}