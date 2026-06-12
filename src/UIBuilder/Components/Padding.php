<?php

namespace FlutterPHP\UIBuilder\Components;

use FlutterPHP\UIBuilder\Base\UIComponent;
use FlutterPHP\UIBuilder\Primitives\Padding as PaddingPrimitive;

class Padding extends UIComponent
{
    public function __construct(
        public PaddingPrimitive $padding,
        public UIComponent $child,
    ) {}

    protected function type(): string
    {
        return 'Padding';
    }

    protected function props(): array
    {
        return ['padding' => $this->padding->toArray()];
    }

    protected function children(): array
    {
        return [$this->child];
    }
}
