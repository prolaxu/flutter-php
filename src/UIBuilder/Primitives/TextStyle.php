<?php

namespace FlutterPHP\UIBuilder\Primitives;

class TextStyle
{
    public function __construct(
        public ?int $size = null,
        public ?Color $color = null,
        public ?FontWeight $weight = null,
        public ?string $letterSpacing = null,
    ) {}

    public function toArray(): array
    {
        return array_filter([
            'size' => $this->size,
            'color' => $this->color?->hex,
            'weight' => $this->weight?->value,
            'letterSpacing' => $this->letterSpacing,
        ], fn ($value) => $value !== null);
    }
}
