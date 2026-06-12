<?php

namespace FlutterPHP\UIBuilder\Components;

use FlutterPHP\UIBuilder\Base\UIComponent;
use FlutterPHP\UIBuilder\Primitives\Text as TextPrimitive;

class Text extends UIComponent
{
    public function __construct(
        public TextPrimitive $text,
    ) {}

    protected function type(): string
    {
        return 'Text';
    }

    protected function props(): array
    {
        return array_filter([
            'text' => $this->text->value,
            'style' => $this->text->style?->toArray(),
        ], fn ($value) => $value !== null);
    }

    protected function children(): array
    {
        return [];
    }
}
