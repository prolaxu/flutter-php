<?php

namespace FlutterPHP\UIBuilder\Components;

use FlutterPHP\UIBuilder\Base\UIComponent;
use FlutterPHP\UIBuilder\Primitives\Padding as PaddingPrimitive;

class Column extends UIComponent
{
    public function __construct(
        public array $children = [],
        public string $mainAxisAlignment = 'start',
        public string $crossAxisAlignment = 'start',
        public ?PaddingPrimitive $padding = null,
    ) {}

    protected function type(): string
    {
        return 'Column';
    }

    protected function props(): array
    {
        return array_filter([
            'mainAxisAlignment' => $this->mainAxisAlignment,
            'crossAxisAlignment' => $this->crossAxisAlignment,
            'padding' => $this->padding?->toArray(),
        ]);
    }

    protected function children(): array
    {
        return $this->children;
    }
}
