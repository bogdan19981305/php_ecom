<?php

namespace App\Kernel\Controller;

use App\Kernel\Http\Request;
use App\Kernel\View\View;

abstract class Controller
{

    private View $view;
    private Request $request;

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }

    /**
     * @param  View  $view
     */
    public function setView(View $view): void
    {
        $this->view = $view;
    }

    public function view(string $name): void
    {
        $this->view->page($name);
    }

}