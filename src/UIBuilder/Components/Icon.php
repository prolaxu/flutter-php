<?php

namespace FlutterPHP\UIBuilder\Components;

use FlutterPHP\UIBuilder\Base\UIComponent;
use FlutterPHP\UIBuilder\Primitives\IconName;

class Icon extends UIComponent
{
    public function __construct(
        public IconName $name,
        public float $size = 24,
    ) {}

    protected function type(): string
    {
        return 'Icon';
    }

    protected function props(): array
    {
        return [
            'name' => $this->name->name,
            'size' => $this->size,
        ];
    }

    protected function children(): array
    {
        return [];
    }
}
