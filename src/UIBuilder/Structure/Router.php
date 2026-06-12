<?php

namespace FlutterPHP\UIBuilder\Structure;

class Router
{
    /** @var Route[] */
    private array $routes = [];

    public function __construct(
        public string $initialRoute,
    ) {}

    public function addRoute(Route $route): static
    {
        $this->routes[] = $route;

        return $this;
    }

    public function routes(): array
    {
        return $this->routes;
    }

    public function toArray(): array
    {
        return [
            'initialRoute' => $this->initialRoute,
            'routes' => array_map(fn (Route $r) => $r->toArray(), $this->routes),
        ];
    }
}
