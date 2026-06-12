<?php

namespace FlutterPHP\UIBuilder\Primitives;

class Padding
{
    public function __construct(
        public int $top = 0,
        public int $right = 0,
        public int $bottom = 0,
        public int $left = 0,
    ) {}

    public static function all(int $value): self
    {
        return new self($value, $value, $value, $value);
    }

    public static function horizontal(int $value): self
    {
        return new self(top: 0, right: $value, bottom: 0, left: $value);
    }

    public static function vertical(int $value): self
    {
        return new self(top: $value, right: 0, bottom: $value, left: 0);
    }

    public function toArray(): array
    {
        return [
            'top' => $this->top,
            'right' => $this->right,
            'bottom' => $this->bottom,
            'left' => $this->left,
        ];
    }
}
