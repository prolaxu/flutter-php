<?php

namespace FlutterPHP\UIBuilder\Components;

use FlutterPHP\UIBuilder\Base\UIComponent;

class GridView extends UIComponent
{
    public function __construct(public array $children = [], public int $crossAxisCount = 2) {}

    protected function type(): string
    {
        return 'GridView';
    }

    protected function props(): array
    {
        return ['crossAxisCount' => $this->crossAxisCount];
    }

    protected function children(): array
    {
        return $this->children;
    }
}
