<?php

namespace FlutterPHP\UIBuilder\Components;

use FlutterPHP\UIBuilder\Base\UIComponent;

class Modal extends UIComponent
{
    public function __construct(public UIComponent $content) {}

    protected function type(): string
    {
        return 'Modal';
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
