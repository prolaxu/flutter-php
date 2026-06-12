<?php

namespace FlutterPHP\UIBuilder\Components;

use FlutterPHP\UIBuilder\Base\UIComponent;
use FlutterPHP\UIBuilder\State\StateRef;
use FlutterPHP\UIBuilder\State\StoreRef;

class SearchBar extends UIComponent
{
    public function __construct(
        public StateRef|StoreRef|null $stateRef = null,
        public ?string $placeholder = 'Search products...',
        public bool $filled = true,
        public ?string $submitRoute = null,
    ) {}

    protected function type(): string
    {
        return 'SearchBar';
    }

    protected function props(): array
    {
        return array_filter([
            'stateKey' => (string) $this->stateRef,
            'placeholder' => $this->placeholder,
            'filled' => $this->filled ?: null,
            'submitRoute' => $this->submitRoute,
        ], fn ($value) => $value !== null);
    }

    protected function children(): array
    {
        return [];
    }
}
