<?php

namespace App\Kernel\View;

use App\Kernel\Exceptions\ViewNotFoundException;
use App\Kernel\Http\Request;

class View
{

    public function page(string $name): void
    {
        $viewPath = APP_PATH."/views/pages/$name.php";


        if (!file_exists($viewPath)) {
            throw new ViewNotFoundException("View page not found $viewPath");
        }


        extract([
            'view' => $this
        ]);
        include $viewPath;
    }

    public function getHeader(): void
    {
        $this->component('header');
    }

    public function component(string $name): void
    {
        $request = Request::createFromGlobals();
        $viewPath = APP_PATH."/views/components/$name.php";

        if (!file_exists($viewPath)) {
            throw new ViewNotFoundException("View component not found $viewPath");
        }

        extract([
            'uri' => $request->uri()
        ]);


        include_once $viewPath;
    }

    public function getFooter(): void
    {
        $this->component('footer');
    }

}