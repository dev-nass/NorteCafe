<?php

namespace Core\Middleware;

class Middleware
{

    public const MAP = [
        'guest' => Guest::class,
        'auth' => Authenticated::class
    ];

    public static function resolve($key)
    {

        if (! $key) {
            return;
        }

        // Will contain the Middleware Class
        $middleware = static::MAP[$key] ?? false;

        if (! $middleware) {
            throw new \Exception("No matching middleware found for key {$key}");
        }

        $instance = new $middleware;
        $instance->handle();
    }
}
