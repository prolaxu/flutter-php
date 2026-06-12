<?php

namespace FlutterPHP\UIBuilder\Primitives;

class Text
{
    public function __construct(
        public string $value,
        public ?TextStyle $style = null,
    ) {}

    public function __toString(): string
    {
        return $this->value;
    }

    public function toArray(): array
    {
        return array_filter([
            'text' => $this->value,
            'style' => $this->style?->toArray(),
        ], fn ($value) => $value !== null);
    }
}
