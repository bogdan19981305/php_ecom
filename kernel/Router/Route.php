<?php

namespace App\Kernel\Router;

class Route
{

    public function __construct(
        private readonly string $uri,
        private readonly string $method,
        private $action,
    ) {
    }

    public static function get(string $uri, $action): static
    {
        return new self($uri, 'GET', $action);
    }

    public static function post(string $uri, $action): static
    {
        return new self($uri, 'POST', $action);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getAction()
    {
        return $this->action;
    }
}