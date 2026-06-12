<?php

namespace FlutterPHP\UIBuilder\Components;

use FlutterPHP\UIBuilder\Base\UIComponent;
use FlutterPHP\UIBuilder\Primitives\Text;

class Badge extends UIComponent
{
    public function __construct(
        public Text $label,
        public string $variant = 'primary',
    ) {}

    protected function type(): string
    {
        return 'Badge';
    }

    protected function props(): array
    {
        return [
            'label' => $this->label->toArray(),
            'variant' => $this->variant,
        ];
    }

    protected function children(): array
    {
        return [];
    }
}
