<?php

namespace FlutterPHP\UIBuilder\Components;

use FlutterPHP\UIBuilder\Base\UIComponent;

class Spacer extends UIComponent
{
    public function __construct(
        public int $height = 8,
        public ?int $width = null,
    ) {}

    protected function type(): string
    {
        return 'Spacer';
    }

    protected function props(): array
    {
        if ($this->width !== null) {
            return ['width' => $this->width];
        }

        return ['height' => $this->height];
    }

    protected function children(): array
    {
        return [];
    }
}
