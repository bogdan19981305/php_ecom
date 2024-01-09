<?php

namespace App\Kernel\Container;

use App\Kernel\Http\Request;
use App\Kernel\Router\Router;
use App\Kernel\Validator\Validator;
use App\Kernel\View\View;

class Container
{
    public readonly Request $request;
    public readonly Router $router;

    public readonly View $view;
    public readonly Validator $validator;

    public function __construct()
    {
        $this->registerServices();
    }

    private function registerServices(): void
    {
        $request = Request::createFromGlobals();
        $this->request = $request;
        $this->validator = new Validator();
        $this->view = new View();
        $this->router = new Router($this->view, $request);
        $this->request->setValidator($this->validator);
    }
}