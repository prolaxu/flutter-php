<?php

namespace FlutterPHP\UIBuilder\Structure;

use FlutterPHP\UIBuilder\Base\UIComponent;
use FlutterPHP\UIBuilder\State\Store;

class Route
{
    /** @var Store[] */
    private array $stores = [];

    public function __construct(
        public string $path,
        public UIComponent $screen,
        public bool $requiresAuth = false,
    ) {}

    public function withStore(Store $store): static
    {
        $this->stores[] = $store;

        return $this;
    }

    public function requiresAuth(bool $requiresAuth = true): static
    {
        $this->requiresAuth = $requiresAuth;

        return $this;
    }

    public function toArray(): array
    {
        $stores = [];
        foreach ($this->stores as $store) {
            $stores[$store->name()] = $store->toArray();
        }

        return array_filter([
            'path' => $this->path,
            'requiresAuth' => $this->requiresAuth ?: null,
            'stores' => $stores ?: null,
            'screen' => $this->screen->toArray(),
        ]);
    }
}
