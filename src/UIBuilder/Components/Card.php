<?php

namespace FlutterPHP\UIBuilder\Components;

use FlutterPHP\UIBuilder\Base\UIComponent;

class Card extends UIComponent
{
    public function __construct(
        public UIComponent $child,
    ) {}

    protected function type(): string
    {
        return 'Card';
    }

    protected function props(): array
    {
        return [];
    }

    protected function children(): array
    {
        return [$this->child];
    }
}
