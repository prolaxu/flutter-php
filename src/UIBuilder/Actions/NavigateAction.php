<?php

namespace FlutterPHP\UIBuilder\Actions;

class NavigateAction implements Action
{
    public function __construct(
        public string $route,
        public ?array $query = null,
        public ?string $store = null,
    ) {}

    public function toArray(): array
    {
        return array_filter([
            'type' => 'navigate',
            'route' => $this->route,
            'query' => $this->query,
            'store' => $this->store,
        ], fn ($value) => $value !== null);
    }
}
