<?php

namespace FlutterPHP\UIBuilder\Components;

use FlutterPHP\UIBuilder\Base\UIComponent;

class BottomSheet extends UIComponent
{
    public function __construct(public UIComponent $content) {}

    protected function type(): string
    {
        return 'BottomSheet';
    }

    protected function props(): array
    {
        return [];
    }

    protected function children(): array
    {
        return [$this->content];
    }
}
