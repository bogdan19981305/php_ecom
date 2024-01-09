<?php

namespace App\Kernel\Http;

class Request
{

    public string $uri;

    public function __construct(
        public readonly array $get,
        public readonly array $post,
        public readonly array $server,
        public readonly array $files,
        public readonly array $cookies,
    ) {
        $parsed_uri = str_replace('/', '', $server['REQUEST_URI']);
        $this->uri = $parsed_uri;
    }

    public static function createFromGlobals(): static
    {
        return new static($_GET, $_POST, $_SERVER, $_FILES, $_COOKIE);
    }

    public function uri(): string
    {
        return $this->uri;
    }

    public function method(): string
    {
        return $this->server['REQUEST_METHOD'];
    }
}