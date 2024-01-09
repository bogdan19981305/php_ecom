<?php

namespace App\Kernel\Router;

use App\Kernel\Controller\Controller;
use App\Kernel\View\View;

class Router
{

    private array $routes
        = [
            'GET'  => [],
            'POST' => [],
        ];

    public function __construct(
        private View $view
    ) {
        $this->initRoutes();
    }

    private function initRoutes(): void
    {
        $routes = include_once APP_PATH.'/config/routes.php';

        foreach ($routes as $route) {
            $this->addRoute($route);
        }
    }

    private function addRoute(Route $route): void
    {
        $this->routes[$route->getMethod()][$route->getUri()] = $route;
    }

    public function dispatch(string $uri, string $method): void
    {
        $route = $this->findRoute($uri, $method);

        if (!$route) {
            $this->notFound();
        }

        if (is_array($route->getAction())) {
            [$controller, $action] = $route->getAction();

            /** @var Controller $controller */
            $controller = new $controller();

            call_user_func([$controller, 'setView'], $this->view);
            call_user_func([$controller, $action]);
        }
    }

    private function findRoute(string $uri, string $method): Route|false
    {
        $routes = $this->getRoutes();

        $parsed_uri = str_replace('/', '', $uri);

        if (!isset($routes[$method][$parsed_uri])) {
            return false;
        }

        return $routes[$method][$parsed_uri];
    }

    /**
     * @return Route[]
     */

    private function getRoutes(): array
    {
        return $this->routes;
    }

    private function notFound(): void
    {
        http_response_code(404);
        echo '<h1>404 | Not Found</h1>';
        exit();
    }

}