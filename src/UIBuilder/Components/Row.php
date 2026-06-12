<?php

namespace FlutterPHP\UIBuilder\Components;

use FlutterPHP\UIBuilder\Base\UIComponent;

class Row extends UIComponent
{
    public function __construct(
        public array $children = [],
        public string $mainAxisAlignment = 'start',
        public string $crossAxisAlignment = 'center',
        public bool $scroll = false,
        public bool $expandChildren = false,
    ) {}

    protected function type(): string
    {
        return 'Row';
    }

    protected function props(): array
    {
        return array_filter([
            'mainAxisAlignment' => $this->mainAxisAlignment,
            'crossAxisAlignment' => $this->crossAxisAlignment,
            'scroll' => $this->scroll ?: null,
            'expandChildren' => $this->expandChildren ?: null,
        ], fn ($value) => $value !== null);
    }

    protected function children(): array
    {
        return $this->children;
    }
}
